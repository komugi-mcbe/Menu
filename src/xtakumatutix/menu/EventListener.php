<?php

namespace xtakumatutix\menu;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\Player;
use pocketmine\utils\Config;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\plugin\Plugin;
use pocketmine\scheduler\ClosureTask;
use pocketmine\Server;
use xtakumatutix\menu\Form\MainForm;
use pocketmine\item\Item;

class EventListener implements Listener 
{
    private $Main;

    public function __construct(Main $Main)
    {
        $this->Main = $Main;
    }

    public function onJoin(PlayerJoinEvent $event)
    {
        $player = $event->getPlayer();
        $config = $this->Main->config;
        if(!$config->exists($player->getName())) {
            if (!$player->getInventory()->contains(Item::get(341,0))){
                if ($player->getInventory()->canAddItem(Item::get(341,0,1))){
                    $config->set($player->getName());
                    $config->save();
                    $player->sendMessage("§a >> §fようこそ！！ここではスマホというもので簡単に移動などできます！！。\n §c>> §cなくしたら、shopで買えます(20000KG)");
                    $player->getInventory()->addItem(Item::get(341,0,1));
                }else{
                    $player->sendMessage("アイテムが入りません");
                }
            }
        }
    }

    public function onTap(PlayerInteractEvent $event)
    {
        $player = $event->getPlayer();
        $item = $player->getInventory()->getItemInHand();
        $itemid = $item->getID();
        if ($itemid===341) {
            if ($this->Main->menu[$player->getName()] = true){
                $player->sendForm(new MainForm($this->Main));
                $this->Main->menu[$player->getName()] = false;
                $task = new ClosureTask(function (int $currentTick) use ($player): void {
                    $this->Main->menu[$player->getName()] = true;
                });
                $plugin = Server::getInstance()->getPluginManager()->getPlugin("Menu");
                $plugin->getScheduler()->scheduleDelayedTask($task, 20 * 2);
            }
        }
    }
}
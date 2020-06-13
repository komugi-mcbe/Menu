<?php

namespace xtakumatutix\menu;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\Player;
use pocketmine\utils\Config;
use pocketmine\event\player\PlayerInteractEvent;
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
        if ($itemid == 341) {
            $player->sendForm(new MainForm($this->Main));
        }
    }
}
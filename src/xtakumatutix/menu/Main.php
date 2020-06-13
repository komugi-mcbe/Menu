<?php

namespace xtakumatutix\menu;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use xtakumatutix\menu\Form\MainForm;
use onebone\economyapi\EconomyAPI;
use pocketmine\utils\Config;

Class Main extends PluginBase
{
    public function onEnable()
    {
        $this->getLogger()->notice("読み込み完了 - ver." . $this->getDescription()->getVersion());
        $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
        $this->config = new Config($this->getDataFolder() . "gotphone.yml", Config::YAML);
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
    {
        if(!($sender instanceof Player)){
            $mymoney = EconomyAPI::getInstance()->myMoney($sender->getName());
            if($mymoney < 10){
                $sender->sendMessage("お金が足りません");
            }else{
                $sender->sendForm(new MainForm($this));
            }
        }
    }
}
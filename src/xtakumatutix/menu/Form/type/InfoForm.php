<?php

namespace xtakumatutix\menu\Form\type;

use pocketmine\form\Form;
use pocketmine\Player;
use xtakumatutix\menu\Form\MainForm;
use RuinPray\PlayerAPI;

class InfoForm implements Form
{
    public function __construct($player)
    {
        $this->player = $player;
    }

    public function handleResponse(Player $player, $data): void
    {
        if ($data === null) {
            return;
        }
    }

    public function jsonSerialize()
    {
        return [
            'type' => 'form',
            'title' => 'Info',
            'content' => '名前 / ' . $this->player->getName() . "\nIP / " . $this->player->getAddress() . "\n現在使用しているデバイス / " . PlayerAPI::getInstance()->getOSType($this->player) . "\nPing / " . $this->player->getPing(),
            'buttons' => [
                [
                    'text' => '§c閉じる'
                ]
            ],
        ];
    }
}
<?php

namespace xtakumatutix\menu\Form\type;

use pocketmine\form\Form;
use pocketmine\Player;
use xtakumatutix\menu\Main;

class SettingForm implements Form
{
    public function __construct(Main $Main, $name)
    {
        $this->Main = $Main;
        $this->name = $name;
    }

    public function handleResponse(Player $player, $data): void
    {
        if ($data === null) {
            return;
        }
        switch ($data){
            case 2:
                $this->Main->getServer()->dispatchCommand($player, 'passwd');
        }
    }

    public function jsonSerialize()
    {
        return [
            'type' => 'form',
            'title' => '設定',
            'content' => "\n\n",
            'buttons' => [
                [
                    'text' => $this->name."\nユーザー項目, 詳細およびその他"
                ],
                [
                    'text' => '通知'
                ],
                [
                    'text' => 'パスワード'
                ],
                [
                    'text' => '位置情報サービス'
                ]
            ],
        ];
    }
}
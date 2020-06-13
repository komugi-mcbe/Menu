<?php

namespace xtakumatutix\menu\Form\wallet;

use pocketmine\form\Form;
use pocketmine\Player;
use xtakumatutix\menu\Main;

Class PayForm implements Form
{
    public function __construct(Main $Main)
    {
        $this->Main = $Main;
    }

    public function handleResponse(Player $player, $data): void
    {
        if ($data === null) {
            return;
        }
        $this->Main->getServer()->dispatchCommand($player, 'pay '.$data[0].' '.$data[1]);
    }

    public function jsonSerialize()
    {
        return [
            'type' => 'custom_form',
            'title' => '相手にお金をあげる',
            'content' => [
                [
                    'type' => 'input',
                    'text' => 'プレイヤー名',
                    'placeholder' => '例:Steve'
                ],
                [
                    'type' => 'input',
                    'text' => '料金',
                    'placeholder' => '例:1000'
                ]
            ],
        ];
    }
}
<?php

namespace xtakumatutix\menu\Form\Walet;

use pocketmine\form\Form;
use pocketmine\Player;
use xtakumatutix\menu\Main;

Class SeeForm implements Form
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
        $this->Main->getServer()->dispatchCommand($player, 'seemoney '.$data[0]);
    }

    public function jsonSerialize()
    {
        return [
            'type' => 'custom_form',
            'title' => '相手の所持金を見る',
            'content' => [
                [
                    'type' => 'input',
                    'text' => 'プレイヤー名',
                    'placeholder' => '例:Steve'
                ]
            ],
        ];
    }
}
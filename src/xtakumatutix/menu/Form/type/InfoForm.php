<?php

namespace xtakumatutix\shopui\Form\type;

use pocketmine\form\Form;
use pocketmine\Player;
use xtakumatutix\shopui\Form\buysellForm;
use xtakumatutix\shopui\Form\MainForm;

Class StoneForm implements Form
{
    public function handleResponse(Player $player, $data): void
    {
        if ($data === null) {
            return;
        }

        switch ($data) {
            case 0:
            $player->sendForm(new MainForm());
            break;

            case 1:
            $id = 4;
            $damage = 0;
            $buy = 10;
            $sell = 8;
            $player->sendForm(new buysellForm($id, $damage, $buy, $sell));
            break;

            case 2:
            $id = 1;
            $damage = 0;
            $buy = 15;
            $sell = 10;
            $player->sendForm(new buysellForm($id, $damage, $buy, $sell));
            break;

            case 3:
            $id = 48;
            $damage = 0;
            $buy = 17;
            $sell = 12;
            $player->sendForm(new buysellForm($id, $damage, $buy, $sell));
            break;
        }
    }

    public function jsonSerialize()
    {
        return [
            'type' => 'form',
            'title' => '②石類',
            'content' => '選択してください (購入値段/売却値段)',
            'buttons' => [
                [
                    'text' => '§c戻る'
                ],
                [
                    'text' => '丸石 (10/8)'
                ],
                [
                    'text' => '石 (15/10)' 
                ],
                [
                    'text' => '苔の生えた石 (17/12)'
                ]
            ],
        ];
    }
}
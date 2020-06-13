<?php

namespace xtakumatutix\shopui\Form\type;

use pocketmine\form\Form;
use pocketmine\Player;
use xtakumatutix\shopui\Form\buysellForm;
use xtakumatutix\shopui\Form\MainForm;

Class BrickForm implements Form
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
            $id = 45;
            $damage = 0;
            $buy = 25;
            $sell = 15;
            $player->sendForm(new buysellForm($id, $damage, $buy, $sell));
            break;

            case 2:
            $id = 98;
            $damage = 0;
            $buy = 25;
            $sell = 15;
            $player->sendForm(new buysellForm($id, $damage, $buy, $sell));
            break;

            case 3:
            $id = 98;
            $damage = 1;
            $buy = 25;
            $sell = 15;
            $player->sendForm(new buysellForm($id, $damage, $buy, $sell));
            break;

            case 4:
            $id = 98;
            $damage = 2;
            $buy = 25;
            $sell = 15;
            $player->sendForm(new buysellForm($id, $damage, $buy, $sell));
            break;

            case 5:
            $id = 98;
            $damage = 3;
            $buy = 17;
            $sell = 12;
            $player->sendForm(new buysellForm($id, $damage, $buy, $sell));
            break;

            case 6:
            $id = 206;
            $damage = 0;
            $buy = 55;
            $sell = 38;
            $player->sendForm(new buysellForm($id, $damage, $buy, $sell));
            break;

            case 7:
            $id = 168;
            $damage = 2;
            $buy = 34;
            $sell = 24;
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
                    'text' => 'レンガ (25/15)'
                ],
                [
                    'text' => '石レンガ (25/15)' 
                ],
                [
                    'text' => '苔の生えた石レンガ (25/15)'
                ],
                [
                    'text' => 'ひび割れた石レンガ (25/15)'
                ],
                [
                    'text' => '模様入り石レンガ (25/15)'
                ],
                [
                    'text' => 'エンドストーンレンガ (55/38)'
                ],
                [
                    'text' => '海晶レンガ (34/24)'
                ]
            ],
        ];
    }
}
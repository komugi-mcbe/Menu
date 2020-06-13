<?php

namespace xtakumatutix\shopui\Form\type;

use pocketmine\form\Form;
use pocketmine\Player;
use xtakumatutix\shopui\Form\buysellForm;
use xtakumatutix\shopui\Form\MainForm;

Class InfoForm implements Form
{
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
<?php

namespace xtakumatutix\menu\Form\type;

use pocketmine\form\Form;
use pocketmine\Player;
use xtakumatutix\shopui\Form\MainForm;

class NewsForm implements Form
{
    public function handleResponse(Player $player, $data): void
    {
        if ($data === null) {
            return;
        }

        $player->sendForm(new MainForm());
    }

    public function jsonSerialize()
    {
        return [
            'type' => 'form',
            'title' => 'News',
            'content' => 'Hello World(ようこそ)',
            'buttons' => [
                [
                    'text' => '§c戻る'
                ]
            ],
        ];
    }
}
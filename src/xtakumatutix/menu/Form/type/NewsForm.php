<?php

namespace xtakumatutix\menu\Form\type;

use pocketmine\form\Form;
use pocketmine\Player;
use xtakumatutix\menu\Main;
use xtakumatutix\menu\Form\MenuForm;

class NewsForm implements Form
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

        $player->sendForm(new MenuForm($this->Main));
    }

    public function jsonSerialize()
    {
        return [
            'type' => 'form',
            'title' => 'News',
            'content' => "§cHello §fWorld\n現在、βテスト中です",
            'buttons' => [
                [
                    'text' => '§c戻る'
                ]
            ],
        ];
    }
}
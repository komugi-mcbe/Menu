<?php

namespace xtakumatutix\menu\Form\type;

use pocketmine\form\Form;
use pocketmine\Player;
use xtakumatutix\menu\Main;

Class ServersForm implements Form
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

        switch ($data) {
            case 0:
            $player->transfer("play-nkserver.com", 19132);
            break;

            case 1:
            $player->transfer("spaceserver.tokyo", 19132);
            break;

            case 2:
            $player->transfer("mcbereef.ddo.jp", 19132);
            break;
        }

        $player->sendForm(new MainForm());
    }

    public function jsonSerialize()
    {
        return [
            'type' => 'form',
            'title' => 'News',
            'content' => "Cactusのサーバーです\n行きたいサーバーを押すとサーバーへいけます",
            'buttons' => [
                [
                    'text' => 'ナマケモノサーバー / 生活'
                ],
                [
                    'text' => '宇宙サーバー / 生活'
                ],
                [
                    'text' => 'Reefサーバー / 整地'
                ]
            ],
        ];
    }
}
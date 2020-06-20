<?php

namespace xtakumatutix\menu\Form\type;

use pocketmine\form\Form;
use pocketmine\Player;
use xtakumatutix\menu\Main;
use onebone\economyapi\EconomyAPI;

class WarpForm implements Form
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

        if (EconomyAPI::getInstance()->myMoney($player) < 10) {
            $player->sendMessage(' §c>> §fお金が足りません');
            return;
        }

        EconomyAPI::getInstance()->reduceMoney($player, 10);
        $player->sendMessage(' §a>> §f目的地に到着しました');
        switch ($data) {
            case 0:
                $player->teleport($this->Main->getServer()->getLevelByName('lobby')->getSafeSpawn());
                break;

            case 1:
                $player->teleport($this->Main->getServer()->getLevelByName('komugi')->getSafeSpawn());
                break;

            case 2:
                $player->teleport($this->Main->getServer()->getLevelByName('resource')->getSafeSpawn());
                break;

            case 3:
                $player->teleport($this->Main->getServer()->getLevelByName('earth')->getSafeSpawn());
        }
    }

    public function jsonSerialize()
    {
        return [
            'type' => 'form',
            'title' => 'komu Map!',
            'content' => "手数料として10円頂きます\n行きたいところを押して下さい",
            'buttons' => [
                [
                    'text' => 'Lobby \ ロビー'
                ],
                [
                    'text' => 'Komugi \ 小麦市'
                ],
                [
                    'text' => 'Resource \ 人工資源'
                ],
                [
                    'text' => 'Earth \ 地球'
                ]
            ],
        ];
    }
}
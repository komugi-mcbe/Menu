<?php

namespace xtakumatutix\menu\Form\type;

use pocketmine\form\Form;
use pocketmine\Player;
use xtakumatutix\menu\Main;
use pocketmine\utils\Config;

class SearchSettingForm implements Form
{
    public function __construct(Main $Main)
    {
        $this->Main = $Main;
    }

    public function handleResponse(Player $player, $data): void
    {
        $config = $this->Main->search;
        if ($data === null) {
            return;
        }
        switch ($data) {
            case 0:
                $config->set($player->getName(), "true");
                $config->save();
                $player->sendMessage(' §c>> §f位置情報サービスを有効にしました');
                break;
            case 1:
                $config->set($player->getName(), "false");
                $config->save();
                $player->sendMessage(' §c>> §f位置情報サービスを無効にしました');
                break;

        }
    }

    public function jsonSerialize()
    {
        return [
            'type' => 'form',
            'title' => '設定',
            'content' => "位置情報サービスとは\nチャットしたときにみんなに今いるワールドがわかります\nどこにいるか把握してほしい時に使ってみてはいかがでしょう\n\n",
            'buttons' => [
                [
                    'text' => 'ONにする'
                ],
                [
                    'text' => 'OFFにする'
                ]
            ],
        ];
    }
}
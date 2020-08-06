<?php

namespace xtakumatutix\menu\Form;

use pocketmine\form\Form;
use pocketmine\Player;
use RuinPray\PlayerAPI;
use xtakumatutix\menu\Main;
use xtakumatutix\menu\Form\type\NewsForm;
use xtakumatutix\menu\Form\type\InfoForm;
use xtakumatutix\menu\Form\wallet\WalletForm;
use xtakumatutix\menu\Form\type\ServersForm;
use xtakumatutix\menu\Form\type\WarpForm;
use xtakumatutix\menu\Form\type\SettingForm;

class MenuForm implements Form
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
            case 1:
                $player->sendForm(new NewsForm($this->Main));
                break;

            case 2:
                $player->sendForm(new InfoForm($player));
                break;

            case 3:
                $this->Main->getServer()->dispatchCommand($player, 'shop');
                break;

            case 4:
                $player->sendForm(new WalletForm($this->Main));
                break;

            case 5:
                $player->sendForm(new WarpForm($this->Main));
                break;

            case 6:
                $player->sendForm(new ServersForm($this->Main));
                break;

            case 7:
                $name = $player->getName();
                $player->sendForm(new SettingForm($this->Main, $name));
                break;
        }
    }

    public function jsonSerialize()
    {
        return [
            'type' => 'form',
            'title' => 'メニュー[Komuroid v.10]',
            'content' => '操作したいアプリをタップしてください',
            'buttons' => [
                [
                    'text' => '§cスリープモード',
                    'image' => [
                        'type' => 'path',
                        'data' => 'textures/menu/power',
                    ],
                ],
                [
                    'text' => 'News',
                    'image' => [
                        'type' => 'path',
                        'data' => 'textures/menu/news',
                    ],
                ],
                [
                    'text' => 'Info',
                    'image' => [
                        'type' => 'path',
                        'data' => 'textures/menu/info',
                    ],
                ],
                [
                    'text' => 'KomuZon :)',
                    'image' => [
                        'type' => 'path',
                        'data' => 'textures/menu/shop',
                    ],
                ],
                [
                    'text' => 'KomuWallet $',
                    'image' => [
                        'type' => 'path',
                        'data' => 'textures/menu/wallet',
                    ],
                ],
                [
                    'text' => 'KomuMap !',
                    'image' => [
                        'type' => 'path',
                        'data' => 'textures/menu/warp',
                    ],
                ],
                [
                    'text' => '同盟サーバー',
                    'image' => [
                        'type' => 'path',
                        'data' => 'textures/menu/server',
                    ],
                ],
                [
                    'text' => '設定',
                    'image' => [
                        'type' => 'path',
                        'data' => 'textures/menu/setting',
                    ],
                ],
            ],
        ];
    }
}
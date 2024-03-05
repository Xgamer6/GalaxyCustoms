<?php

declare(strict_types=1);

namespace fluffy\JoinTitle;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener{

    /** @var Config */
    private $config;

    public function onEnable(): void{
        $this->getServer()->getPluginManager()->registerEvents($this, $this);

        $this->saveDefaultConfig();
        $this->config = $this->getConfig();
    }

    public function onPlayerJoin(PlayerJoinEvent $event): void{
        $player = $event->getPlayer();

        $welcomeMessage = $this->config->get("welcomeMessage", "");
        $subtitle = $this->config->get("subtitle", "");

        $player->sendTitle($welcomeMessage, $subtitle);
    }
}

<?php

declare(strict_types=1);

namespace fluffy\FluffyPlugin;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
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
        $playerName = $player->getName();

        $welcomeMessage = $this->config->get("welcomeMessage", "");
        $subtitle = $this->config->get("subtitle", "");

        $player->sendTitle($welcomeMessage, $subtitle);

        // Setze die individuelle Join-Nachricht für den Spieler
        $joinMessage = "§8[§a+§8] §7{$playerName}";
        $event->setJoinMessage($joinMessage);
    }

    // Optional: Du kannst auch die Leave-Nachricht ändern
    public function onPlayerQuit(PlayerQuitEvent $event): void{
        $player = $event->getPlayer();
        $playerName = $player->getName();

        // Setze die individuelle Leave-Nachricht für den Spieler
        $leaveMessage = "§8[§c-§8] §7{$playerName}";
        $event->setQuitMessage($leaveMessage);
    }
}

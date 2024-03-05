<?php

declare(strict_types=1);

namespace fluffy\FluffyPlugin;

use pocketmine\plugin\PluginBase;

use pocketmine\event\Listener;

use pocketmine\event\player\PlayerJoinEvent;

class Main extends PluginBase implements Listener{

    public function onEnable(): void{

        $this->getServer()->getPluginManager()->registerEvents($this, $this);

    }

    public function onPlayerJoin(PlayerJoinEvent $event): void{

        $player = $event->getPlayer();

        $player->sendTitle("§l§5Welcome to", "Galaxy Games");

    }

}

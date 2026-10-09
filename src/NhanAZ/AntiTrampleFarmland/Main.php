<?php

declare(strict_types=1);

namespace NhanAZ\AntiTrampleFarmland;

use pocketmine\event\entity\EntityTrampleFarmlandEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener {

	protected function onEnable(): void {
		$this->saveDefaultConfig();
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	public function onEntityTrampleFarmland(EntityTrampleFarmlandEvent $event): void {
		$worldName = $event->getEntity()->getWorld()->getDisplayName();
		if (ProtectionPolicy::shouldProtect(
			$worldName,
			$this->getConfig()->get("mode"),
			$this->getConfig()->get("worlds")
		)) {
			$event->cancel();
		}
	}
}

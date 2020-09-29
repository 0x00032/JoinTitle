<?php

namespace diverse\JoinTitle;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;
use pocketmine\network\mcpe\protocol\PlaySoundPacket;

use diverse\JoinTitle\SendTask;

class Main extends PluginBase implements Listener{

	public function onEnable() {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getServer()->getLogger()->info(TextFormat::BLUE . "[JoinTitle]" . TextFormat::YELLOW . " Enabled Created By diverse!");
		$this->saveDefaultConfig();
  }

	public function onDisable() {
		$this->getServer()->getLogger()->info(TextFormat::RED . "[JoinTitle]" . TextFormat::YELLOW . " Disabled Created By diverse!");
	}

	public function onJoin(PlayerJoinEvent $event){
		$joinTask = new SendTask($this, $event->getPlayer());
		$this->getScheduler()->scheduleDelayedTask($joinTask, 20);
	}
}

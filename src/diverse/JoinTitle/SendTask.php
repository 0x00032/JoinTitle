<?php

namespace diverse\JoinTitle;

use pocketmine\{Player, Server};
use pocketmine\scheduler\Task;
use pocketmine\event\Listener;

use diverse\JoinTitle\Main;

class SendTask extends Task implements Listener{

	public function __construct(Main $main, Player $player){
		$this->main = $main;
		$this->player = $player;
	}

	public function onRun($currentTick){
		$this->player->addTitle($this->main->getConfig()->get("main_title"), $this->main->getConfig()->get("down_title"), 20, $this->main->getConfig()->get("time_title"), 40);
	}
}

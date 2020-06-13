<?php

namespace Message;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\utils\Config;

class main extends PluginBase implements Listener{

	public function onEnable(){
			$this->getServer()->getPluginManager()->registerEvents($this, $this);
					if(!file_exists($this->getDataFolder())){
			mkdir($this->getDataFolder(), 0744, true);
			}
		$this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML,array(
			"BlockID"=>"41",
			"meta"=>"0",
			"message"=>"Hello!"));


	}

	public function onTap(PlayerInteractEvent $event){
		$player = $event->getPlayer();
		$block = $event->getBlock();
		$blockId = $block->getID();
		$meta = $block->getDamage();
		$id = $this->config->get("BlockID");
		$damege = $this->config->get("meta");
			if($blockId == $id and $meta == $damege){
				$message = $this->config->get("message");
				$player->sendMessage($message);
			}
		}
}

<?php

namespace Menu;

use pocketmine\plugin\PluginBase;

use pocketmine\event\Listener;

use pocketmine\Player;
use pocketmine\Server;

use pocketmine\command\CommandSender;
use pocketmine\command\Command;

use pocketmine\utils\TextFormat as C;

use Menu\Main;

class Main extends PluginBase implements Listener {

	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->eco = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
	}
	
	public function onCommand(CommandSender $player, Command $command, string $label, array $args) : bool {
		switch($command->getName()){
			case "menu":
			if($player instanceof Player){
			    $this->OpenMenu($player);
			} else {
				$player->sendMessage("§a vous avez ouvert le menu avec succès !");
					return true;
			}
			break;
		}
	    return true;
	}

	public function OpenMenu(Player $sender){
		$formapi = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
		$form = $formapi->createSimpleForm(function (Player $sender, ?int $data = null){
		$result = $data;
		if($result === null){
			return;
		    }
			switch($result){
				case 0:
				$cmd = "warp craft on";
				$this->getServer()->getCommandMap()->dispatch($sender, $cmd);
				break;
				case 1:
				$cmd = "warp Arene on";
				$this->getServer()->getCommandMap()->dispatch($sender, $cmd);
				break;
				case 2:
				$cmd = "warp faction on";
				$this->getServer()->getCommandMap()->dispatch($sender, $cmd);
				break;
				case 3:
				$cmd = "warp minage on";
				$this->getServer()->getCommandMap()->dispatch($sender, $cmd);
				break;
				case 4:
				$cmd = "sort on";
				$this->getServer()->getCommandMap()->dispatch($sender, $cmd);
				break;
				case 5:
				$cmd = "job on";
				$this->getServer()->getCommandMap()->dispatch($sender, $cmd);
				break;
				case 6:
				$cmd = "bank on";
				$this->getServer()->getCommandMap()->dispatch($sender, $cmd);
				break;
				
			}
		});
		$form->setTitle("§l§6➤Menu");
		$form->setContent("§l§a bienvenue au menu !");
		$form->addButton("§l§e➤craft");
		$form->addButton("§l§a➤Arène");
   		$form->addButton("§l§c➤faction");
$form->addButton("§lb➤minage");
$form->addButton("§l§3➤sort");
$form->addButton("§l§9➤job");
$form->addButton("§l§1➤bank");
		$form->sendToPlayer($sender);
			return $form;
	}
}

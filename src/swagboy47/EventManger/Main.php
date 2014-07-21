<?php

 namespace swagboy47\EventManger;

use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\math\Vector3;
use pocketmine\Server;
use pocketmine\utils\Config;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntitySpawnEvent;
use pocketmine\event\entity\EntityLevelChangeEvent;
use pocketmine\event\entity\EntityMoveEvent;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\event\entity\EntityRegainHealthEvent;
use pocketmine\event\entity\EntityTeleportEvent;
use pocketmine\event\entity\EntityExplodeEvent;
use pocketmine\event\inventory\InventoryPickupItemEvent;
use pocketmine\event\level\LevelLoadEvent;
use pocketmine\event\level\LevelInitEvent;
use pocketmine\event\level\LevelUnloadEvent;
use pocketmine\event\level\LevelSaveEvent;
use pocketmine\event\player\PlayerAchievementAwardedEvent;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerCommandPreprocessEvent;
use pocketmine\event\player\PlayerDropItemEvent;
use pocketmine\event\player\PlayerGameModeChangeEvent;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\entity\EntityDespawnEvent;
use pocketmine\event\player\PlayerItemConsumeEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerKickEvent;
use pocketmine\event\player\PlayerLoginEvent;
use pocketmine\event\player\PlayerPreLoginEvent;
use pocketmine\event\plugin\PluginDisableEvent;
use pocketmine\event\plugin\PluginEnableEvent;
use pocketmine\event\server\DataPacketReceiveEvent;
use pocketmine\event\server\DataPacketSendEvent;
use pocketmine\event\server\ServerCommandEvent;

class Main extends PluginBase implements Listener{
public function onEnable(){
	 @mkdir($this->getDataFolder());
$this->BlockBreakEvent = [Blocks = []Items = []Players => []Levels => []Enable = [true]];
$this->BlockPlaceEvent = [levels = []Blocks = []Players = []Enable = [true]];
$this->EntityDamageByEntityEvent = [Players = []DPlayers = []Damage = []levels = []Enable = [true]];
$this->EntityDamageEvent = [Causes = []Damages = []players = []levels = []Enable = [true]]	;
$this->EntityLevelChangeEvent = [Orgins = []targets = []players = []Enable = [true]];
$this->EntityRegainHealthEvent = [players = []levels = []Enable = [true]];
$this->EntityTeleportEvent = [levels = []players = []Enable = [true]];
$this->InventoryPickupItemEvent = [items = []levels = []Enable = [true]];
$this->LevelLoadEvent = [levels = []Enable = [true]];
$this->LevelUnLoadEvent = [levels = []Enable = [true]];
$this->LevelSaveEvent = [levels = []Enable = [true]];
$this->LevelInitEvent = [levels = []Enable = [true]];
$this->PlayerAchievementAwardedEvent = [Players = []AchivementIDs = []levels = []Enable = [true]];
$this->PlayerChatEvent = [Massage = []Players = []Levels = []Enable = [true]];
$this->PlayerCommandPreprocessEvent = [Players = []Commands = []Levels = []Enable = [true]];
$this->PlayerDropItemEvent = [Items = []Players = []Levels = []Enable = [true]];
$this->PlayerGameModeChangeEvent = [NewGMs = []Players = []Levels = []OldGMs = []Enable = [true]];
$this->PlayerInteractEvent = [Items = []Players = []Levels = []Blocks = []Faces = []Enable = [true]];
$this->PlayerItemConsumeEvent = [Items = []Players = []Levels = []Enable = [true]];
$this->PlayerKickEvent = [Levels = []Players = []Enable = [true]];
$this->PlayerLoginEvent = [Players = []Enable = [true]];
$this->PlayerPreLoginEvent = [Players = []Enable = [true]];
$this->DataPacketReceiveEvent = [Packets = []Enable = [true]];
$this->DataPacketSendEvent = [Packets = []Enable = [true]];
$this->ServerCommandEvent = [Commands = []Enable = [true]];
$this->EntityMoveEvent = [Players = []Levels = []Enable = [true]];
$this->EntityExplodeEvent = [Levels = []Enable = [true]];
$this->PlayerItemHeldEvent = [Items = []Players = []Level = []Enable = [true]];
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		}

		public function onCommand(CommandSender $sender, Command $command, $label, array $args){
		if(strtolower($command->getName()) == "eventmanger") {
				if($args[0] == "bbe"){
					 if(isset($this->BlockBreakEvent[Enable[false]])){
					$sender->sendMessage("[EventMannger] BlockBreakEvent is now Enabled!");
					$this->BlockBreakEvent[Enable[true]];
				}else{
					unset($this->BreakBlockEvent[$Enable[true]]);
					 $this->BreakBlockEvent[Enable[false]];
					$sender->sendMessage("[EventMannger] BlockBreakEvent is now Disabled!");
					}
				if($args[1] == "block"){
					if(isset($args[2])){
		                $block = $args[2]
		                if(!is_numeric($block){
		                $sender->sendMessage("[EventMannger]this is not an ID of a block");
		                }
		              if(is_numeric($block) and !isset($this->BlockBreakEvent[Blocks[$block]])){
		              	$this->BlockBreakEvent[Blocks[$block]];
				$sender->sendMessage("[EventMannger]Nobody is now allowed to break that block");
		              }
		              if(isset($this->BlockBreakEvent[Blocks[$block]])){
					unset($this->BreakBlockEvent[Blocks[$block]]);
					$sender->sendMessage("[EventMannger]Everybody is now allowed to break that block");
		              }
					}
				}
		               if($args[1] == "player"){
		               	if(isset($args[2])){
		               $player = $this->getServer()->getPlayer($args[2]);
		               $name = $player->getName()
		              if($player === null){
		              	$sender->sendMessage("Can't find player " . $name);
		              }
		              	 if(!$player === null and !isset($this->BlockBreakEvent[Player[$name]])){
		              	$this->BreakBlockEvent[Player[$name]];
				$sender->sendMessage("[EventMannger]player" . $player->getName() . "can't break any Blocks!");
		              }
		              if(isset($this->BlockBreakEvent[Player[$name]])){
					unset($this->BlockBreakEvent[Player[$name]);
						$sender->sendMessage("[EventMannger]player" . $player->getName() . "can now break Blocks!");
		              }
					}
				}

		               	if($args[1] == "item"){
					if(isset($args[2])){
				     $item = $args[2]
		                if(!is_numeric($item)){
		                $sender->sendMessage("[EventMannger]this is not an ID of a block");
		                }
		              if(is_numeric($item) and !isset($this->BlockBreakEvent[Item[$item]])){
		              	$this->BlockBreakEvent[Item[$item]];
				$sender->sendMessage("[EventMannger]Nobody is now allowed to break blocks with that item");
		              }
		              if(isset($this->BlockBreakEvent[Blocks[$block]])){
					unset($this->BreakBlockEvent[Item[$item]]);
					$sender->sendMessage("[EventMannger]Everybody is now allowed to break blocks with that item");
		              }
					}
				}
					if($args[1] == "world"){
					if(isset($args[2])){
				$world = $args[2];
		               if(!$this->getServer()->isLevelLoaded($world)){
				$sender->sendMessage("[EventMannger]world" . $world . "is not found!");
		               }
			if($this->getServer()->isLevelLoaded($world) and !isset($this->BlockBreakEvent[Level[$world]])){
                  $this->BlockBreakEvent[Level[$world]]
				$sender->sendMessage("[EventMannger]players can't break blocks at " . $world);
		              }
		              if(isset($this->BlockBreakEvent[Level[$world]])){
					unset($this->BlockBreakEvent[Level[$world]]);
						$sender->sendMessage("[EventMannger]players now can break blocks at " . $world);
		              }
					}
				}
				}
				if($args[0] == "bpe"){
				 if(isset($this->BlockBreakEvent[Enable[false]])){
					$sender->sendMessage("[EventMannger] BlockBreakEvent is now Enabled!");
					$this->BlockBreakEvent[Enable[true]];
				}else{
					unset($this->BreakBlockEvent[$Enable[true]]);
					 $this->BreakBlockEvent[Enable[false]];
					$sender->sendMessage("[EventMannger] BlockBreakEvent is now Disabled!");
					}

				if($args[1] == "block"){
					if(isset($args[2])){
		                $block = $args[2]
		                if(!is_numeric($block){
		                $sender->sendMessage("[EventMannger]this is not an ID of a block");
		                }
		              if(is_numeric($block) and !isset($this->BlockPlaceEvent[Blocks[$block]])){
		              	$this->BlockPlaceEvent[Blocks[$block]];
				$sender->sendMessage("[EventMannger]Nobody is now allowed to break that block");
		              }
		              if(isset($this->BlockBreakEvent[Blocks[$block]])){
					unset($this->BreakBlockEvent[Blocks[$block]]);
					$sender->sendMessage("[EventMannger]Everybody is now allowed to break that block");
		              }
					}
				}
				if($args[1] == "player"){
		               	if(isset($args[2])){
		               $player = $this->getServer()->getPlayer($args[2]);
		              if($player === null){
		              	$sender->sendMessage("[EventManger]Can't find player " . $player->getName());
		              }
		              	 if(!$player === null){
		              	$array = $this->BlockPlaceEvent->get("players");
				array_push($array, $player->getName);
				$this->BlockPlaceEvent->set("players", $array);
				$sender->sendMessage("[EventMannger]player" . $player->getName() . "can't place any Blocks!");
		              }
		              if(($PLayerE = array_search($player->getName(), $array)) !== false){
					unset($array[$PlayerE]);
					$this->BreakPlaceEvent->set("players", $array);
						$sender->sendMessage("[EventMannger]player" . $player->getName() . "can now place Blocks!");
		              }
					}
				}
				if($args[1] == "Blocka"){
					if(isset($args[2])){
		                $block = $args[2]
		                if(!is_numeric($block)){
		                $sender->sendMessage("[EventMannger]this is not an ID of a block");
		                }
		              if(is_numeric($block)){
		              	$array = $this->BlockPlaceEvent->get("blocksAgainst");
				array_push($array, $block);
				$this->BlockBreakEvent->set("blocksAgainst", $array);
				$sender->sendMessage("[EventMannger]Nobody is now allowed to place that block");
		              }
		              if(($BlockE = array_search($block, $array)) !== false){
					unset($array[$BlockE]);
	      			$this->BreakPlaceEvent->set("blocks", $array);
		              }
					}
				}
				if($args[1] == "world"){
					if(isset($args[2])){
				$world = $args[2];
		               if(!$this->getServer()->isLevelLoaded($world)){
				$sender->sendMessage("[EventMannger]world" . $world . "is not found!");
		               }
			if($this->getServer()->isLevelLoaded($world)){
			$array = $this->BlockPlaceEvent->get("levels");
				array_push($array, $world);
				$this->BlockPlaceEvent->set("levels", $array);
				$sender->sendMessage("[EventMannger]players can't Place blocks at " . $world);
		              }
		              if(($WolrdE = array_search($world, $array)) !== false){
					unset($array[$WolrdE]);
					$this->BreakBlockEvent->set("levels", $array);
						$sender->sendMessage("[EventMannger]players now can break blocks at " . $world);
		              }
					}
				}
				if($args[0] == "edbe"){
				$this->EntityDamageByEntityEvent1 = false;
				if($this->EntityDamageByEntityEvent1 = false){
				$this->EntityDamageByEntityEvent1 = true;
				}
					if($args[1] == "eplayer"){
		               	if(isset($args[2])){
		               $player = $this->getServer()->getPlayer($args[2]);
		              if($player === null){
		              	$sender->sendMessage("[EventManger]Can't find player " . $player->getName());
		              }
		              	 if(!$player === null){
		              	$array = $this->EntityDamageByEntityEvent->get("EPlayer");
				array_push($array, $player->getName);
				$this->EntityDamageByEntityEvent->set("EPlayer", $array);
				$sender->sendMessage("[EventMannger]player" . $player->getName() . "can't get damaged by any Entity!");
		              }
		              if(($PLayerE = array_search($player->getName(), $array)) !== false){
					unset($array[$PlayerE]);
					$this->EntityDamageByEntityEvent->set("EPlayer", $array);
						$sender->sendMessage("[EventMannger]player" . $player->getName() . "can now get damaged by any entity!");
		              }
					}
				}
				if($args[1] == "dplayer"){
		               	if(isset($args[2])){
		               $player = $this->getServer()->getPlayer($args[2]);
		              if($player === null){
		              	$sender->sendMessage("[EventManger]Can't find player " . $player->getName());
		              }
		              	 if(!$player === null){
		              	$array = $this->EntityDamageByEntityEvent->get("DPlayer");
				array_push($array, $player->getName);
				$this->EntityDamageByEntityEvent->set("DPlayer", $array);
				$sender->sendMessage("[EventMannger]player" . $player->getName() . "can't damage any Entity!");
		              }
		              if(($PLayerE = array_search($player->getName(), $array)) !== false){
					unset($array[$PlayerE]);
					$this->EntityDamageByEntityEvent->set("DPlayer", $array);
						$sender->sendMessage("[EventMannger]player" . $player->getName() . "can now damage any entity!");
		              }
					}
				}
				if($args[1] == "damage"){
					if(isset($args[2])){
		                $damage = $args[2]
		                if(!is_numeric($block)){
		                $sender->sendMessage("[EventMannger]this is not an amount of a damage");
		                }
		              if(is_numeric($damage)){
		              	$array = $this->EntityDamageByEntityEvent->get("damage");
				array_push($array, $damage);
				$this->EntityDamageByEntityEvent->set("damage", $array);
				$sender->sendMessage("[EventMannger]No entity is now able to coause that amount of damage");
		              }
		              if(($BlockE = array_search($damage, $array)) !== false){
					unset($array[$BlockE]);
	      			$this->EntityDamageByEntityEvent->set("blocks", $array);
		              }
					}
				}
				if($args[1] == "eiscreature"){
	$v = $this->EntityDamageByEntityEvent->get("EisCreature");
					if($v !== false){
		               	$this->EntityDamageByEntityEvent->set("EisCreature", false);

		              	 if($v =){
		              	$array = $this->EntityDamageByEntityEvent->get("EPlayer");
				array_push($array, $player->getName);
				$this->EntityDamageByEntityEvent->set("EPlayer", $array);
				$sender->sendMessage("[EventMannger]player" . $player->getName() . "can't get damaged by any Entity!");
		              }
		              if(($PLayerE = array_search($player->getName(), $array)) !== false){
					unset($array[$PlayerE]);
					$this->EntityDamageByEntityEvent->set("EPlayer", $array);
						$sender->sendMessage("[EventMannger]player" . $player->getName() . "can now get damaged by any entity!");
		              }
					}
				}
				        if($args[0] == "ede" and $args[1] == "on"){
					$this->EntityDamageEvent1 = true;
				}
					if($args[0] == "ede" and $args[1] == "off"){
					$this->EntityDamageEvent1 = false;
				}
					        if($args[0] == "edee" and $args[1] == "on"){
					$this->EntityDeathEvent1 = true;
				}
					if($args[0] == "edee" and $args[1] == "off"){
					$this->EntityDeathEvent1 = false;
				}
						        if($args[0] == "elce" and $args[1] == "on"){
					$this->EntityLevelChangeEvent1 = true;
				}
					if($args[0] == "elce" and $args[1] == "off"){
					$this->EntityLevelChangeEvent1 = false;
				}
						        if($args[0] == "eme" and $args[1] == "on"){
					$this->EntityMoveEvent1 = true;
				}
					if($args[0] == "eme" and $args[1] == "off"){
					$this->EntityMoveEvent1 = false;
				}
							        if($args[0] == "erhe" and $args[1] == "on"){
					$this->EntityRegainHealthEvent1 = true;
				}
					if($args[0] == "erhe" and $args[1] == "off"){
					$this->EntityRegainHealthEvent1 = false;
				}
							        if($args[0] == "ete" and $args[1] == "on"){
					$this->EntityTeleportEvent1 = true;
				}
					if($args[0] == "ete" and $args[1] == "off"){
				$this->EntityTeleportEvent1 = false;
				}
							        if($args[0] == "ice" and $args[1] == "on"){
					$this->InventoryCloseEvent1 = true;
				}
					if($args[0] == "ice" and $args[1] == "off"){
				$this->InventoryCloseEvent1 = false;
				}			        if($args[0] == "ioe" and $args[1] == "on"){
				$this->InventoryOpenEvent1 = true;
				}
					if($args[0] == "ioe" and $args[1] == "off"){
				$this->InventoryOpenEvent1 = false;
				}
							        if($args[0] == "ipie" and $args[1] == "on"){
					$this->InventoryPickupItemEvent1 = true;
				}
					if($args[0] == "ipie" and $args[1] == "off"){
				$this->InventoryPickupItemEvent1 = false;
				}
							        if($args[0] == "sce" and $args[1] == "on"){
					$this->SpawnChangeEvent1 = true;
				}
					if($args[0] == "sce" and $args[1] == "off"){
				$this->SpawnChangeEvent1 = false;
				}
								        if($args[0] == "lle" and $args[1] == "on"){
					$this->LevelLoadEvent1 = true;
				}
					if($args[0] == "lle" and $args[1] == "off"){
				$this->LevelLoadEvent1 = false;
				}
								        if($args[0] == "lue" and $args[1] == "on"){
					$this->LevelUnloadEvent1 = true;
				}
					if($args[0] == "lue" and $args[1] == "off"){
				$this->LevelUnloadEvent1 = false;
				}
								        if($args[0] == "lse" and $args[1] == "on"){
					$this->LevelSaveEvent1 = true;
				}
					if($args[0] == "lse" and $args[1] == "off"){
				$this->LevelSaveEvent1 = false;
				}
								        if($args[0] == "lie" and $args[1] == "on"){
					$this->LevelInitEvent1 = true;
				}
					if($args[0] == "lie" and $args[1] == "off"){
				$this->LevelInitEvent1 = false;
				}
								        if($args[0] == "paae" and $args[1] == "on"){
					$this->PlayerAchievementAwardedEvent1 = true;
				}
					if($args[0] == "paae" and $args[1] == "off"){
				$this->PlayerAchievementAwardedEvent1 = false;
				}
								        if($args[0] == "pae" and $args[1] == "on"){
					$this->PlayerAnimationEvent1 = true;
				}
					if($args[0] == "pae" and $args[1] == "off"){
				$this->PlayerAnimationEvent1 = false;
				}
								        if($args[0] == "pce" and $args[1] == "on"){
					$this->PlayerChatEvent1 = true;
				}
					if($args[0] == "pce" and $args[1] == "off"){
				$this->PlayerChatEvent1 = false;
				}
								        if($args[0] == "pcpe" and $args[1] == "on"){
					$this->PlayerCommandPreprocessEvent1 = true;
				}
					if($args[0] == "pcpe" and $args[1] == "off"){
			$this->PlayerCommandPreprocessEvent1 = false;
				}
								        if($args[0] == "pde" and $args[1] == "on"){
					$this->PlayerDeathEvent1 = true;
				}
					if($args[0] == "pde" and $args[1] == "off"){
				$this->PlayerDeathEvent1 = false;
				}
								        if($args[0] == "pdie" and $args[1] == "on"){
				$this->PlayerDropItemEvent1 = true;
				}
					if($args[0] == "pdie" and $args[1] == "off"){
				$this->PlayerDropItemEvent1 = false;
				}
									        if($args[0] == "pgce" and $args[1] == "on"){
			$this->PlayerGameModeChangeEvent1 = true;
				}
					if($args[0] == "pgce" and $args[1] == "off"){
				$this->PlayerGameModeChangeEvent1 = false;
				}
									        if($args[0] == "pie" and $args[1] == "on"){
				$this->PlayerInteractEvent1 = true;
				}
					if($args[0] == "pie" and $args[1] == "off"){
				$this->PlayerInteractEvent1 = false;
				}
									        if($args[0] == "pice" and $args[1] == "on"){
				$this->PlayerItemConsumeEvent1 = true;
				}
					if($args[0] == "pice" and $args[1] == "off"){
				$this->PlayerItemConsumeEvent1 = false;
				}
									        if($args[0] == "pje" and $args[1] == "on"){
				$this->PlayerJoinEvent1 = true;
				}
					if($args[0] == "pje" and $args[1] == "off"){
				$this->PlayerJoinEvent1 = false;
				}
									        if($args[0] == "pke" and $args[1] == "on"){
				$this->PlayerKickEvent1 = true;
				}
					if($args[0] == "pke" and $args[1] == "off"){
				$this->PlayerKickEvent1 = false;
				}
									        if($args[0] == "ple" and $args[1] == "on"){
				$this->PlayerLoginEvent1 = true;
				}
					if($args[0] == "ple" and $args[1] == "off"){
				$this->PlayerLoginEvent1 = false;
				}
									        if($args[0] == "pple" and $args[1] == "on"){
				$this->PlayerPreLoginEvent1 = true;
				}
					if($args[0] == "pple" and $args[1] == "off"){
				$this->PlayerPreLoginEvent1 = false;
				}
									        if($args[0] == "pdie" and $args[1] == "on"){
				$this->PlayerDropItemEvent1 = true;
				}
					if($args[0] == "pple" and $args[1] == "off"){
				$this->PlayerPreLoginEvent1 = false;
				}
									        if($args[0] == "pqe" and $args[1] == "on"){
				$this->PlayerQuitEvent1 = true;
				}
					if($args[0] == "pqe" and $args[1] == "off"){
				$this->PlayerQuitEvent1 = false;
				}
									        if($args[0] == "pre" and $args[1] == "on"){
				$this->PlayerRespawnEvent1 = true;
				}
					if($args[0] == "pre" and $args[1] == "off"){
				$this->PlayerRespawnEvent1 = false;
				}
									        if($args[0] == "pde" and $args[1] == "on"){
				$this->PluginDisableEvent1 = true;
				}
					if($args[0] == "pde" and $args[1] == "off"){
				$this->PluginDisableEvent1 = false;
				}
									        if($args[0] == "pee" and $args[1] == "on"){
				$this->PluginEnableEvent1 = true;
				}
					if($args[0] == "pee" and $args[1] == "off"){
				$this->PluginEnableEvent1 = false;
				}
									        if($args[0] == "dpre" and $args[1] == "on"){
				$this->DataPacketReceiveEvent1 = true;
				}
					if($args[0] == "dpre" and $args[1] == "off"){
				$this->DataPacketReceiveEvent1 = false;
				}
									        if($args[0] == "dpse" and $args[1] == "on"){
				$this->DataPacketSendEvent1 = true;
				}
					if($args[0] == "dpse" and $args[1] == "off"){
				$this->DataPacketSendEvent1 = false;
				}
									        if($args[0] == "sce" and $args[1] == "on"){
				$this->ServerCommandEvent1 = true;
				}
					if($args[0] == "sce" and $args[1] == "off"){
				$this->ServerCommandEvent1 = false;
				}
									        if($args[0] == "eace" and $args[1] == "on"){
				$this->EntityArmorChangeEvent1 = true;
				}
					if($args[0] == "eace" and $args[1] == "off"){
				$this->EntityArmorChangeEvent1 = false;
				}
									        if($args[0] == "edse" and $args[1] == "on"){
				$this->EntityDespawnEvent1 = true;
				}
					if($args[0] == "edse" and $args[1] == "off"){
				$this->EntityDespawnEvent1 = false;
				}
									        if($args[0] == "eee" and $args[1] == "on"){
				$this->EntityExplodeEvent1 = true;
				}
					if($args[0] == "eee" and $args[1] == "off"){
				$this->EntityExplodeEvent1 = false;
				}
									        if($args[0] == "emoe" and $args[1] == "on"){
				$this->EntityMotionEvent1 = true;
				}
					if($args[0] == "emoe" and $args[1] == "off"){
				$this->EntityMotionEvent1 = false;
				}
									        if($args[0] == "ese" and $args[1] == "on"){
				$this->EntitySpawnEvent1 = true;
				}
					if($args[0] == "ese" and $args[1] == "off"){
				$this->EntitySpawnEvent1 = false;
				}
									        if($args[0] == "cie" and $args[1] == "on"){
				$this->CraftItemEvent1 = true;
				}
					if($args[0] == "cie" and $args[1] == "off"){
				$this->CraftItemEvent1 = false;
				}
				if($args[0] == "p"){
					if($this->getServer()->getOfflinePlayer($args[1])->hasPlayedBefore() == true){

					}
				}










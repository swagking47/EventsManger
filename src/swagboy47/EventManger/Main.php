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
use pocketmine\event\entity\EntityMotionEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntitySpawnEvent;
use pocketmine\event\entity\EntityDeathEvent;
use pocketmine\event\entity\EntityLevelChangeEvent;
use pocketmine\event\entity\EntityMoveEvent;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\event\entity\EntityRegainHealthEvent;
use pocketmine\event\entity\EntityTeleportEvent;
use pocketmine\event\entity\EntityExplodeEvent;
use pocketmine\event\inventory\InventoryCloseEvent;
use pocketmine\event\inventory\InventoryOpenEvent;
use pocketmine\event\inventory\CraftItemEvent;
use pocketmine\event\inventory\InventoryPickupItemEvent;
use pocketmine\event\entity\EntityArmorChangeEvent;
use pocketmine\event\level\SpawnChangeEvent;
use pocketmine\event\level\LevelLoadEvent;
use pocketmine\event\level\LevelInitEvent;
use pocketmine\event\level\LevelUnloadEvent;
use pocketmine\event\level\LevelSaveEvent;
use pocketmine\event\player\PlayerAchievementAwardedEvent;
use pocketmine\event\player\PlayerAnimationEvent;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerCommandPreprocessEvent;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\player\PlayerDropItemEvent;
use pocketmine\event\player\PlayerGameModeChangeEvent;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\entity\EntityDespawnEvent;
use pocketmine\event\player\PlayerItemConsumeEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerKickEvent;
use pocketmine\event\player\PlayerLoginEvent;
use pocketmine\event\player\PlayerPreLoginEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\event\plugin\PluginDisableEvent;
use pocketmine\event\plugin\PluginEnableEvent;
use pocketmine\event\server\DataPacketReceiveEvent;
use pocketmine\event\server\DataPacketSendEvent;
use pocketmine\event\server\ServerCommandEvent;

class Main extends PluginBase implements Listener{
public function onEnable(){
	 @mkdir($this->getDataFolder());
$this->BlockBreakEvent = new Config($this->getDataFolder()."BlockBreakEvent.yml", Config::YAML, array(
        "blocks" => []
	"items" => []
	"player" => []
	"level" => []
	));
$this->BlockPlaceEvent = new Config($this->getDataFolder()."BlockPlaceEvent.yml", Config::YAML, array(
		"player" => []
		"blocks" => []
		"item" => []
		"BlockReplaced" => []
		"BlockAgainst" => []
	        "level" => []
		));
$this->EntityDamageByEntityEvent = new Config($this->getDataFolder()."EntityDamageByEntityEvent.yml", Config::YAML, array(
	"damegedentity" => []
	"damger" => []
	"damage" => []
	"player" => []
	"level" => []
	));		
$this->EntityDamageEvent = new Config($this->getDataFolder()."EntityDamageEvent.yml", Config::YAML, array(
	"Cause" => []
	"Odamge" => []
	"Damage" => []
	"Fdamge" =>[]
	"player" => []
	"level" => []
	));				
$this->EntityLevelChangeEvent = new Config($this->getDataFolder()."EntityLevelChangeEvent.yml", Config::YAML, array(
        "Orgin" => []
        "target" => []
        "player" => []
        "Entity" => []
        "level" => []
        ));	
$this->EntityMoveEvent = new Config($this->getDataFolder()."EntityMoveEvent.yml", Config::YAML, array(
	"X" => []
	"Y" => []
	"Z" => []
	"Entity" => []
	"player" => []
	"level" => []
	));	
$this->EntityRegainHealthEvent = new Config($this->getDataFolder()."EntityRegainHealthEvent.yml", Config::YAML, array(
	"Amount" => []
	"Entity" => []
	"player" => []
	"level" => []
	));	
$this->EntityTeleportEvent = new Config($this->getDataFolder()."EntityTeleportEvent.yml", Config::YAML, array(
	"From" => [
		"x" => []
		"y" => []
		"z" => []
		]
		"To" => [
	        "x" => []
		"y" => []
		"z" => []
		]
	"level" => []
		"entity" => []
"player" => []
		));
$this->InventoryCloseEvent = new Config($this->getDataFolder()."InventoryCloseEvent.yml", Config::YAML, array(
	"player" => []
	"inventory" => []
	"level" => []
	));
$this->InventoryOpenEvent = new Config($this->getDataFolder()."InventoryOpenEvent.yml", Config::YAML, array(
	"player" => []
	"inventory" => []
	"level" => []
	));
$this->InventoryPickupItemEvent = new Config($this->getDataFolder()."InventoryPickupItemEvent.yml", Config::YAML, array(
	"item" => []
	"level" => []
	));
$this->SpawnChangeEvent = new Config($this->getDataFolder()."SpawnChangeEvent.yml", Config::YAML, array(
	"preSpawn" => [
		"x" => []
		"y" => []
		"z" => []
		]
	"level" => []
	));
$this->LevelLoadEvent = new Config($this->getDataFolder()."LevelLoadEvent.yml", Config::YAML, array(
	"level" => []	));
$this->LevelUnLoadEvent = new Config($this->getDataFolder()."LevelUnLoadEvent.yml", Config::YAML, array(
		"level" => []
		));
$this->LevelSaveEvent = new Config($this->getDataFolder()."LevelSaveEvent.yml", Config::YAML, array(
		"level" => []));
$this->LevelInitEvent = new Config($this->getDataFolder()."LevelInitEvent.yml", Config::YAML, array(
		"level" => []
		));
$this->PlayerAchievementAwardedEvent = new Config($this->getDataFolder()."PlayerAchievementAwardedEvent.yml", Config::YAML, array(
		"player" => []
			"achievementID" => []
			"level" => []));
$this->PlayerAnimationEvent = new Config($this->getDataFolder()."PlayerAnimationEvent.yml", Config::YAML, array(
		"Animationtype" => []
			"player" => []
			"level" => []
	));
$this->PlayerChatEvent = new Config($this->getDataFolder()."PlayerChatEvent.yml", Config::YAML, array(
		"massage" => []
			"player" => []
			"level" => []
	));	
$this->PlayerCommandPreprocessEvent = new Config($this->getDataFolder()."PlayerCommandPreprocessEvent.yml", Config::YAML, array(
		"player" => []
		"command" => []
		"level" => []
	));
$this->PlayerDeathEvent = new Config($this->getDataFolder()."PlayerDeathEvent.yml", Config::YAML, array(
	"player" => []
	"level" => []));
$this->PlayerDropItemEvent = new Config($this->getDataFolder()."PlayerDropItemEvent.yml", Config::YAML, array(
	"items" => []
	"player" => []
	"level" => []));
$this->PlayerGameModeChangeEvent = new Config($this->getDataFolder()."PlayerGameModeChangeEvent.yml", Config::YAML, array(
	"newGM" => []
	"player" => []
	"level" => []
	"oldGM" => []
	));
$this->PlayerInteractEvent = new Config($this->getDataFolder()."PlayerInteractEvent.yml", Config::YAML, array(
	"items" => []
	"player" => []
	"level" => []
	"blocks" => []
	"faces" => []));
$this->PlayerItemConsumeEvent = new Config($this->getDataFolder()."PlayerItemConsumeEvent.yml", Config::YAML, array(
	"items" => []
	"player" => []
	"level" => []));
$this->PlayerJoinEvent = new Config($this->getDataFolder()."PlayerJoinEvent.yml", Config::YAML, array(
	"player" => []
	));
$this->PlayerKickEvent = new Config($this->getDataFolder()."PlayerKickEvent.yml", Config::YAML, array(
	"level" => []
	"player" => []));
$this->PlayerLoginEvent = new Config($this->getDataFolder()."PlayerLoginEvent.yml", Config::YAML, array(
	"player" => []
	));
$this->PlayerPreLoginEvent = new Config($this->getDataFolder()."PlayerPreLoginEvent.yml", Config::YAML, array(
	"player" => []));
$this->PlayerQuitEvent = new Config($this->getDataFolder()."PlayerQuitEvent.yml", Config::YAML, array(
	"player" => []));
$this->PlayerRespawnEvent = new Config($this->getDataFolder()."PlayerRespawnEvent.yml", Config::YAML, array());
$this->PluginDisableEvent = new Config($this->getDataFolder()."PluginDisableEvent.yml", Config::YAML, array());
$this->PluginEnableEvent = new Config($this->getDataFolder()."PluginEnableEvent.yml", Config::YAML, array());
$this->DataPacketReceiveEvent = new Config($this->getDataFolder()."DataPacketReceiveEvent.yml", Config::YAML, array());
$this->DataPacketSendEvent = new Config($this->getDataFolder()."DataPacketSendEvent.yml", Config::YAML, array());
$this->ServerCommandEvent = new Config($this->getDataFolder()."ServerCommandEvent.yml", Config::YAML, array());
$this->EntityArmorChangeEvent = new Config($this->getDataFolder()."EntityArmorChangeEvent.yml", Config::YAML, array());
$this->EntityDespawnEvent = new Config($this->getDataFolder()."EntityDespawnEvent.yml", Config::YAML, array());
$this->EntityExplodeEvent = new Config($this->getDataFolder()."EntityExplodeEvent.yml", Config::YAML, array());
$this->EntityMotionEvent = new Config($this->getDataFolder()."EntityMotionEvent.yml", Config::YAML, array());
$this->EntitySpawnEvent = new Config($this->getDataFolder()."EntitySpawnEvent.yml", Config::YAML, array());
$this->CraftItemEvent = new Config($this->getDataFolder()."CraftItemEvent.yml", Config::YAML, array());
$this->PlayerItemHeldEvent = new Config($this->getDataFolder()."PlayerItemHeldEvent.yml", Config::YAML, array());
$this->BlockBreakEvent1 = true;
$this->Damger = true;
$this->entityDamged = true;
$this->BlockPlaceEvent1 = true;
$this->EntityDamageByEntityEvent1 = true;
$this->EntityDamageEvent1 = true;
$this->EntityDeathEvent1 = true;
$this->EntityLevelChangeEvent1 = true;
$this->EntityMoveEvent1 = true;
$this->EntityRegainHealthEvent1 = true;
$this->EntityTeleportEvent1 = true;
$this->InventoryCloseEvent1 = true;
$this->InventoryOpenEvent1 = true;
$this->InventoryPickupItemEvent1 = true;
$this->SpawnChangeEvent1 = true;
$this->LevelLoadEvent1 = true;
$this->LevelUnLoadEvent1 = true;
$this->LevelSaveEvent1 = true;
$this->LevelInitEvent1 = true;
$this->PlayerAchievementAwardedEvent1 = true;
$this->PlayerAnimationEvent1 = true;
$this->PlayerChatEvent1 = true;
$this->PlayerCommandPreprocessEvent1 = true;
$this->PlayerDeathEvent1 = true;
$this->PlayerDropItemEvent1 = true;
$this->PlayerGameModeChangeEvent1 = true;
$this->PlayerInteractEvent1 = true;
$this->PlayerItemConsumeEvent1 = true;
$this->PlayerJoinEvent1 = true;
$this->PlayerKickEvent1 = true;
$this->PlayerLoginEvent1 = true;
$this->PlayerPreLoginEvent1 = true;
$this->PlayerQuitEvent1 = true;
$this->PlayerRespawnEvent1 = true;
$this->PluginDisableEvent1 = true;
$this->PluginEnableEvent1 = true;
$this->DataPacketReceiveEvent1 = true;
$this->DataPacketSendEvent1 = true;
$this->ServerCommandEvent1 = true;
$this->EntityArmorChangeEvent1 = true;
$this->EntityDespawnEvent1 = true;
$this->EntityExplodeEvent1 = true;
$this->EntityMotionEvent1 = true;
$this->EntitySpawnEvent1 = true;
$this->CraftItemEvent1 = true;

		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		}
		
		public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
		switch($cmd->getName()){
			case "eventmanger":
				if($args[0] == "bbe"){
					$this->BlockBreakEvent1 = false;
				if($this->BlockBreakEvent1 = false){
					$this->BlockBreakEvent1 = true;
				}
				if($args[1] == "block"){
					if(isset($args[2])){
		                $block = $args[2]
		                if(!is_numeric($block)){
		                $sender->sendMessage("this is not an ID of a block");	
		                }
		              
		               if($player === null){
				$sender->sendMessage("Can't find player " . $args[1]);
		               }
				elseif($this->BlockPlaceEvent->exsits($player->getName())){
				$this->BlockBreakEvent->remove($player->getName());
				$sender->sendMessage("BlockBreakEvent have been enalbed for" . $args[1]"!");
				}
				else{
				$this->BlockBreakEvent->set($args[1]);	
				$sender->sendMessage("BlockBreakEvent have been disalbed for" . $args[1]"!");
				}
		               }
				}	
				if($args[0] == "bpe"){
				$this->BlockPlaceEvent1 = false;
				if($this->BlockPlaceEvent1 = false){
					$this->BlockPlaceEvent1 = true;
				}
				
				if(isset($args[1])){
		               $player = $this->getServer()->getPlayer($args[1]);
		               if($player === null){
				$sender->sendMessage("Can't find player " . $args[1]);
		               }
				elseif($this->BlockPlaceEvent->exsits($player->getName())){
				$this->BlockPlaceEvent->remove($player->getName());
				$sender->sendMessage("BlockPlaceEvent have been enalbed for" . $args[1]"!");
				}
				else{
				$this->BlockPlaceEvent->set($args[1]);	
				$sender->sendMessage("BlockPlaceEvent have been disalbed for" . $args[1]"!");
				}
		               }
				}
				if($args[0] == "edbe"){
				$this->EntityDamageByEntityEvent1 = false;
				if($this->EntityDamageByEntityEvent1 = false){
				$this->EntityDamageByEntityEvent1 = true;
				}
				if($args[1] == "d"){
					if(!isset($args[2])){
				$this->Damger = false;
					if($this->Damger = false){
					$this->Damger = true;	
				}
					}
					if()
					
				if(isset($args[1])){
		               $ID = $args[1];
		               if(is_numeric($ID)){
		               	if(!$ID = 64 or 65 or 66 or 80 or 81 or 82 or 83 or 84 or 32 or 33 or 34 or 35 or 36 or 37 or 38 or 39 or 10 or 11 or 12 or 13 or 14 or 15 or 16 or 63){
		               	$sender->sendMessage("BlockPlaceEvent have been disalbed for" . $args[1]"!");
		               
		               
		               	
		               
				$sender->sendMessage("Can't find EntityID " . $args[1]);
		               }
				elseif($this->EntityDamageByEntityEvent1->exsits($player->getName())){
				$this->EntityDamageByEntityEvent1->remove($player->getName());
				$sender->sendMessage("EntityDamageByEntityEvent1 have been enalbed for" . $args[1]"!");
				}
				else{
				$this->EntityDamageByEntityEvent1->set($args[1]);	
				$sender->sendMessage("BlockBreakEvent have been disalbed for" . $args[1]"!");
				}
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

		
		
		
				
				
				
				
		
		
				
					









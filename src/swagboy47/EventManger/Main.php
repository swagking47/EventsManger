<?php
 
 namespace swagboy47\EventManger;
 
use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
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
$this->BlockBreakEvent = new Config($this->getDataFolder()."BlockBreakEvent.yml", Config::YAML, array());
$this->BlockPlaceEvent = new Config($this->getDataFolder()."BlockPlaceEvent.yml", Config::YAML, array());
$this->EntityDamageByEntityEvent = new Config($this->getDataFolder()."EntityDamageByEntityEvent.yml", Config::YAML, array());		
$this->EntityDamageEvent = new Config($this->getDataFolder()."EntityDamageEvent.yml", Config::YAML, array());				
$this->EntityDeathEvent = new Config($this->getDataFolder()."EntityDeathEvent.yml", Config::YAML, array());
$this->EntityLevelChangeEvent = new Config($this->getDataFolder()."EntityLevelChangeEvent.yml", Config::YAML, array());	
$this->EntityMoveEvent = new Config($this->getDataFolder()."EntityMoveEvent.yml", Config::YAML, array());	
$this->EntityRegainHealthEvent = new Config($this->getDataFolder()."EntityRegainHealthEvent.yml", Config::YAML, array());	
$this->EntityTeleportEvent = new Config($this->getDataFolder()."EntityTeleportEvent.yml", Config::YAML, array());
$this->InventoryCloseEvent = new Config($this->getDataFolder()."InventoryCloseEvent.yml", Config::YAML, array());
$this->InventoryOpenEvent = new Config($this->getDataFolder()."InventoryOpenEvent.yml", Config::YAML, array());
$this->InventoryPickupItemEvent = new Config($this->getDataFolder()."InventoryPickupItemEvent.yml", Config::YAML, array();
$this->SpawnChangeEvent = new Config($this->getDataFolder()."SpawnChangeEvent.yml", Config::YAML, array());
$this->LevelLoadEvent = new Config($this->getDataFolder()."LevelLoadEvent.yml", Config::YAML, array());
$this->LevelUnLoadEvent = new Config($this->getDataFolder()."LevelUnLoadEvent.yml", Config::YAML, array());
$this->LevelSaveEvent = new Config($this->getDataFolder()."LevelSaveEvent.yml", Config::YAML, array());
$this->LevelInitEvent = new Config($this->getDataFolder()."LevelInitEvent.yml", Config::YAML, array());
$this->PlayerAchievementAwardedEvent = new Config($this->getDataFolder()."PlayerAchievementAwardedEvent.yml", Config::YAML, array());
$this->PlayerAnimationEvent = new Config($this->getDataFolder()."PlayerAnimationEvent.yml", Config::YAML, array());
$this->PlayerChatEvent = new Config($this->getDataFolder()."PlayerChatEvent.yml", Config::YAML, array());	
$this->PlayerCommandPreprocessEvent = new Config($this->getDataFolder()."PlayerCommandPreprocessEvent.yml", Config::YAML, array());
$this->PlayerDeathEvent = new Config($this->getDataFolder()."PlayerDeathEvent.yml", Config::YAML, array());
$this->PlayerDropItemEvent = new Config($this->getDataFolder()."PlayerDropItemEvent.yml", Config::YAML, array());
$this->PlayerGameModeChangeEvent = new Config($this->getDataFolder()."PlayerGameModeChangeEvent.yml", Config::YAML, array());
$this->PlayerInteractEvent = new Config($this->getDataFolder()."PlayerInteractEvent.yml", Config::YAML, array());
$this->PlayerItemConsumeEvent = new Config($this->getDataFolder()."PlayerItemConsumeEvent.yml", Config::YAML, array();
$this->PlayerJoinEvent = new Config($this->getDataFolder()."PlayerJoinEvent.yml", Config::YAML, array());
$this->PlayerKickEvent = new Config($this->getDataFolder()."PlayerKickEvent.yml", Config::YAML, array());
$this->PlayerLoginEvent = new Config($this->getDataFolder()."PlayerLoginEvent.yml", Config::YAML, array());
$this->PlayerPreLoginEvent = new Config($this->getDataFolder()."PlayerPreLoginEvent.yml", Config::YAML, array());
$this->PlayerQuitEvent = new Config($this->getDataFolder()."PlayerQuitEvent.yml", Config::YAML, array());
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
$this->BlockBreakEvent->set("e", true);
$this->BlockPlaceEvent->set("e", true);
$this->EntityDamageByEntityEvent->set("e", true);
$this->EntityDamageEvent->set("e", true);
$this->EntityDeathEvent->set("e", true);
$this->EntityLevelChangeEvent->set("e", true);
$this->EntityMoveEvent->set("e", true);
$this->EntityRegainHealthEvent->set("e", true);
$this->EntityTeleportEvent->set("e", true);
$this->InventoryCloseEvent->set("e", true);
$this->InventoryOpenEvent->set("e", true);
$this->InventoryPickupItemEvent->set("e", true);
$this->SpawnChangeEvent->set("e", true);
$this->LevelLoadEvent->set("e", true);
$this->LevelUnLoadEvent->set("e", true);
$this->LevelSaveEvent->set("e", true);
$this->LevelInitEvent->set("e", true);
$this->PlayerAchievementAwardedEvent->set("e", true);
$this->PlayerAnimationEvent->set("e", true);
$this->PlayerChatEvent->set("e", true);
$this->PlayerCommandPreprocessEvent->set("e", true);
$this->PlayerDeathEvent->set("e", true);
$this->PlayerDropItemEvent->set("e", true);
$this->PlayerGameModeChangeEvent->set("e", true);
$this->PlayerInteractEvent->set("e", true);
$this->PlayerItemConsumeEvent->set("e", true);
$this->PlayerJoinEvent->set("e", true);
$this->PlayerKickEvent->set("e", true);
$this->PlayerLoginEvent->set("e", true);
$this->PlayerPreLoginEvent->set("e", true);
$this->PlayerQuitEvent->set("e", true);
$this->PlayerRespawnEvent->set("e", true);
$this->PluginDisableEvent->set("e", true);
$this->PluginEnableEvent->set("e", true);
$this->DataPacketReceiveEvent->set("e", true);
$this->DataPacketSendEvent->set("e", true);
$this->ServerCommandEvent->set("e", true);
$this->EntityArmorChangeEvent("e", true);
$this->EntityDespawnEvent->set("e", true);
$this->EntityExplodeEvent->set("e",true);
$this->EntityMotionEvent->set("e", true);
$this->EntitySpawnEvent->set("e", true);
$this->CraftItemEvent->set("e", true):

		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		}
		
		public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
		switch($cmd->getName()){
			case "eventmanger":
				if($args[0] == "bbe" and $args[1] == "on"){
					$this->BlockBreakEvent->set("e", true);
					$this->BlockBreakEvent->save();
				}
					if($args[0] == "bbe" and $args[1] == "off"){
					$this->BlockBreakEvent->set("e", false);
					$this->BlockBreakEvent->save();
				}
				if($args[0] == "bpe" and $args[1] == "on"){
					$this->BlockPlaceEvent->set("e", true);
					$this->BlockPlaceEvent->save();
				}
					if($args[0] == "bpe" and $args[1] == "off"){
					$this->BlockPlaceEvent->set("e", false);
					$this->BlockPlaceEvent->save();
				}
				if($args[0] == "edbe" and $args[1] == "on"){
					$this->EntityDamageByEntityEvent->set("e", true);
					$this->EntityDamageByEntityEvent->save();
				}
					if($args[0] == "edbe" and $args[1] == "off"){
					$this->EntityDamageByEntityEvent->set("e", false);
					$this->EntityDamageByEntityEvent->save();
				}
				        if($args[0] == "ede" and $args[1] == "on"){
					$this->EntityDamageEvent->set("e", true);
					$this->EntityDamageEvent->save();
				}
					if($args[0] == "ede" and $args[1] == "off"){
					$this->EntityDamageEvent->set("e", false);
					$this->EntityDamageEvent->save();
				}
					        if($args[0] == "edee" and $args[1] == "on"){
					$this->EntityDeathEvent->set("e", true);
					$this->EntityDeathEvent->save();
				}
					if($args[0] == "edee" and $args[1] == "off"){
					$this->EntityDeathEvent->set("e", false);
					$this->EntityDeathEvent->save();
				}
						        if($args[0] == "elce" and $args[1] == "on"){
					$this->EntityLevelChangeEvent->set("e", true);
					$this->EntityLevelChangeEvent->save();
				}
					if($args[0] == "elce" and $args[1] == "off"){
					$this->EntityLevelChangeEvent->set("e", false);
					$this->EntityLevelChangeEvent->save();
				}
						        if($args[0] == "eme" and $args[1] == "on"){
					$this->EntityMoveEvent->set("e", true);
					$this->EntityMoveEvent->save();
				}
					if($args[0] == "eme" and $args[1] == "off"){
					$this->EntityMoveEvent->set("e", false);
					$this->EntityMoveEvent->save();
				}
							        if($args[0] == "erhe" and $args[1] == "on"){
					$this->EntityRegainHealthEvent->set("e", true);
					$this->EntityRegainHealthEvent->save();
				}
					if($args[0] == "erhe" and $args[1] == "off"){
					$this->EntityRegainHealthEvent->set("e", false);
					$this->EntityRegainHealthEvent->save();
				}
							        if($args[0] == "ete" and $args[1] == "on"){
					$this->EntityEvent->set("e", true);
					$this->EntityMoveEvent->save();
				}
					if($args[0] == "ete" and $args[1] == "off"){
					$this->EntityMoveEvent->set("e", false);
					$this->EntityMoveEvent->save();
				}
				
				
				
		
		
				
					









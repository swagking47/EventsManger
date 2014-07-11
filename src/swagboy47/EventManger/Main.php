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
$this->BlockBreakEvent = new Config($this->getDataFolder()."BlockBreakEvent.yml", Config::YAML, array(BlockBreakEvent = true));
$this->BlockPlaceEvent = new Config($this->getDataFolder()."BlockPlaceEvent.yml", Config::YAML, array(BlockPlaceEvent = true));
$this->EntityDamageByEntityEvent = new Config($this->getDataFolder()."EntityDamageByEntityEvent.yml", Config::YAML, array(EntityDamageByEntityEvent = true));		
$this->EntityDamageEvent = new Config($this->getDataFolder()."EntityDamageEvent.yml", Config::YAML, array("EntityDamageEvent" = true));				
$this->EntityDeathEvent = new Config($this->getDataFolder()."EntityDeathEvent.yml", Config::YAML, array("EntityDeathEvent" = true));
$this->EntityLevelChangeEvent = new Config($this->getDataFolder()."EntityLevelChangeEvent.yml", Config::YAML, array("EntityLevelChangeEvent" = true));	
$this->EntityMoveEvent = new Config($this->getDataFolder()."EntityMoveEvent.yml", Config::YAML, array("EntityMoveEvent" = true));	
$this->EntityRegainHealthEvent = new Config($this->getDataFolder()."EntityRegainHealthEvent.yml", Config::YAML, array("EntityRegainHealthEvent" = true));	
$this->EntityTeleportEvent = new Config($this->getDataFolder()."EntityTeleportEvent.yml", Config::YAML, array("EntityTeleportEven$this->EntityExplodeEvent = new Config($this->getDataFolder()."EntityExplodeEvent.yml", Config::YAML, array("EntityExplodeEvent" = true));t" = true));
$this->InventoryCloseEvent = new Config($this->getDataFolder()."InventoryCloseEvent.yml", Config::YAML, array("InventoryCloseEvent" = true));
$this->InventoryOpenEvent = new Config($this->getDataFolder()."InventoryOpenEvent.yml", Config::YAML, array("InventoryOpenEvent" = true));
$this->InventoryPickupItemEvent = new Config($this->getDataFolder()."InventoryPickupItemEvent.yml", Config::YAML, array("InventoryPickupItemEvent" = true));
$this->SpawnChangeEvent = new Config($this->getDataFolder()."SpawnChangeEvent.yml", Config::YAML, array("SpawnChangeEvent" = true));
$this->LevelLoadEvent = new Config($this->getDataFolder()."LevelLoadEvent.yml", Config::YAML, array("LevelLoadEvent" = true));
$this->LevelUnLoadEvent = new Config($this->getDataFolder()."LevelUnLoadEvent.yml", Config::YAML, array("LevelUnLoadEvent" = true));
$this->LevelSaveEvent = new Config($this->getDataFolder()."LevelSaveEvent.yml", Config::YAML, array("LevelSaveEvent" = true));
$this->LevelInitEvent = new Config($this->getDataFolder()."LevelInitEvent.yml", Config::YAML, array("LevelInitEvent" = true));
$this->PlayerAchievementAwardedEvent = new Config($this->getDataFolder()."PlayerAchievementAwardedEvent.yml", Config::YAML, array("PlayerAchievementAwardedEvent" = true));
$this->PlayerAnimationEvent = new Config($this->getDataFolder()."PlayerAnimationEvent.yml", Config::YAML, array("PlayerAnimationEvent" = true));
$this->PlayerChatEvent = new Config($this->getDataFolder()."PlayerChatEvent.yml", Config::YAML, array("PlayerChatEvent" = true));	
$this->PlayerCommandPreprocessEvent = new Config($this->getDataFolder()."PlayerCommandPreprocessEvent.yml", Config::YAML, array("PlayerCommandPreprocessEvent" = true));
$this->PlayerDeathEvent = new Config($this->getDataFolder()."PlayerDeathEvent.yml", Config::YAML, array("PlayerDeathEvent" = true));
$this->PlayerDropItemEvent = new Config($this->getDataFolder()."PlayerDropItemEvent.yml", Config::YAML, array("PlayerDropItemEvent" = true));
$this->PlayerGameModeChangeEvent = new Config($this->getDataFolder()."PlayerGameModeChangeEvent.yml", Config::YAML, array("PlayerGameModeChangeEvent" = true));
$this->PlayerInteractEvent = new Config($this->getDataFolder()."PlayerInteractEvent.yml", Config::YAML, array("PlayerInteractEvent" = true));
$this->PlayerItemConsumeEvent = new Config($this->getDataFolder()."PlayerItemConsumeEvent.yml", Config::YAML, array("PlayerItemConsumeEvent" = true));
$this->PlayerJoinEvent = new Config($this->getDataFolder()."PlayerJoinEvent.yml", Config::YAML, array("PlayerJoinEvent" = true));
$this->PlayerKickEvent = new Config($this->getDataFolder()."PlayerKickEvent.yml", Config::YAML, array("PlayerKickEvent" = true));
$this->PlayerLoginEvent = new Config($this->getDataFolder()."PlayerLoginEvent.yml", Config::YAML, array("PlayerLoginEvent" = true));
$this->PlayerPreLoginEvent = new Config($this->getDataFolder()."PlayerPreLoginEvent.yml", Config::YAML, array("PlayerPreLoginEvent" = true));
$this->PlayerQuitEvent = new Config($this->getDataFolder()."PlayerQuitEvent.yml", Config::YAML, array("PlayerQuitEvent" = true));
$this->PlayerRespawnEvent = new Config($this->getDataFolder()."PlayerRespawnEvent.yml", Config::YAML, array("PlayerRespawnEvent" = true));
$this->PluginDisableEvent = new Config($this->getDataFolder()."PluginDisableEvent.yml", Config::YAML, array("PluginDisableEvent" = true));
$this->PluginEnableEvent = new Config($this->getDataFolder()."PluginEnableEvent.yml", Config::YAML, array("PluginEnableEvent" = true));
$this->DataPacketReceiveEvent = new Config($this->getDataFolder()."DataPacketReceiveEvent.yml", Config::YAML, array("DataPacketReceiveEvent" = true));
$this->DataPacketSendEvent = new Config($this->getDataFolder()."DataPacketSendEvent.yml", Config::YAML, array("DataPacketSendEvent" = true));
$this->ServerCommandEvent = new Config($this->getDataFolder()."ServerCommandEvent.yml", Config::YAML, array("ServerCommandEvent" = true));
$this->EntityArmorChangeEvent = new Config($this->getDataFolder()."EntityArmorChangeEvent.yml", Config::YAML, array("EntityArmorChangeEvent" = true));
$this->EntityDespawnEvent = new Config($this->getDataFolder()."EntityDespawnEvent.yml", Config::YAML, array("EntityDespawnEvent" = true));
$this->EntityExplodeEvent = new Config($this->getDataFolder()."EntityExplodeEvent.yml", Config::YAML, array("EntityExplodeEvent" = true));
$this->EntityMotionEvent = new Config($this->getDataFolder()."EntityMotionEvent.yml", Config::YAML, array("EntityMotionEvent" = true));
$this->EntitySpawnEvent = new Config($this->getDataFolder()."EntitySpawnEvent.yml", Config::YAML, array("EntitySpawnEvent" = true));
$this->CraftItemEvent = new Config($this->getDataFolder()."CraftItemEvent.yml", Config::YAML, array("CraftItemEvent" = true));
$this->PlayerItemHeldEvent = new Config($this->getDataFolder()."PlayerItemHeldEvent.yml", Config::YAML, array("PlayerItemHeldEvent" = true));


		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		}
		
		public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
		switch($cmd->getName()){
			case "eventmanger":
				if($args[0] == ""){









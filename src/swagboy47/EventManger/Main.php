<?php

 namespace swagboy47\EventManger;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityArmorChangeEvent;
use pocketmine\event\entity\EntityLevelChangeEvent;
use pocketmine\event\entity\EntityMoveEvent;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\event\entity\EntityRegainHealthEvent;
use pocketmine\event\entity\EntityTeleportEvent;
use pocketmine\event\entity\EntityExplodeEvent;
use pocketmine\event\inventory\InventoryPickupItemEvent;
use pocketmine\event\player\PlayerAchievementAwardedEvent;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerCommandPreprocessEvent;
use pocketmine\event\player\PlayerDropItemEvent;
use pocketmine\event\player\PlayerGameModeChangeEvent;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\player\PlayerItemConsumeEvent;
use pocketmine\event\player\PlayerLoginEvent;
use pocketmine\event\player\PlayerPreLoginEvent;
use pocketmine\event\server\DataPacketReceiveEvent;
use pocketmine\event\server\DataPacketSendEvent;
use pocketmine\event\entity\EntityMotionEvent;
use pocketmine\event\
use pocketmine\event\server\ServerCommandEvent;

class Main extends PluginBase implements Listener{
public function onEnable(){
$this->Events = ["BreakBlockEvent" => true, "BlockPlaceEvent" => true, "EntityArmorChangeEvent" => true, "EntityDamageByEntityEvent" => true, "EntityDamageEvent" => true, "EntityExplodeEvent" => true, "EntityInventoryChangeEvent" => true, "EntityLevelChangeEvent" => true, "EntityMotionEvent" => true, "EntityMoveEvent" => true, "EntityRegainHealthEvent" => true, "EntityTeleportEvent" => true, "CraftItemEvent" => true, "InventoryCloseEvent" => true, "InventoryOpenEvent" => true, "InventoryPickupItemEvent" => true, "PlayerAchievementAwardedEvent" => true, "PlayerAnimationEvent" => true, "PlayerChatEvent" => true, "PlayerCommandPreprocessEvent" => true, "PlayerDropItemEvent" => true, "PlayerGameModeChangeEvent" => true, "PlayerInteractEvent" => true, "PlayerItemConsumeEvent" => true, "PlayerLoginEvent" => true, "PlayerPreLoginEvent" => true, "DataPacketReceiveEvent" => true, "DataPacketSendEvent" => true, "ServerCommandEvent" => true]; 
$this->getServer()->getPluginManager()->registerEvents($this, $this);
		}
		public function onCommand(CommandSender $sender, Command $command, $label, array $args){
		 if((strtolower($cmd->getName()) == "eventmanger" or "event" or "em" or "EventManger" and $sender->hasPermission("eventmanger.control")){
					 $Event = $this->Events;
					 $key = $args[0];
					 if(isset($Event[$key)){
					 $value = $Event[$key];
					 $string = str_replace('"', "", $value);
					 if($value !== false){
					 $this->getServer()->broadcastMessage("[EventManger] ".$sender->getName()." has switch".$key."OFF!");
						$value = false;
					 }
					 else{
					 $this->getServer()->broadcastMessage("[EventManger] ".$sender->getName()." has switch".$key."ON!");
					  $value = true;
					 }
					 }
					 else{
					 $sender->sendMessage("[EventManger] Can't find event ".$key."!");
					 }
					 }
					 }
					 public function onEvent($string $event){
					 if($value !== true){
					 $event->setCancelled(true);
					 }
					 else{
					 $event->setCancelled(false);
					 }
					 }
					 }

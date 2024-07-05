<?php

namespace trim;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\player\Player;

use jojoe77777\FormAPI\Form;
use jojoe77777\FormAPI\SimpleForm;

use trim\subform\Amethyst;
use trim\subform\Diamond;
use trim\subform\Emerald;
use trim\subform\Gold;
use trim\subform\Quartz;
use trim\subform\Redstone;

use KRUNCHSHooT\LibTrimArmor\LibTrimArmor;
use KRUNCHSHooT\LibTrimArmor\MaterialType;
use KRUNCHSHooT\LibTrimArmor\PatternType;
use KRUNCHSHooT\LibTrimArmor\utils\TrimUtils;
use pocketmine\item\VanillaItems;

class Main extends PluginBase implements Listener
{
    public function onEnable(): void
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool{
        switch($command->getName()){
            case "trimsui":
                if($sender instanceof Player){
                    $this->getChoiceForm($sender);
                }else{
                    $sender->sendMessage("GK ADA PERM ANJ. LU ITU GK OP TOLOL-TOLOL");
                }
                break;
        }
        return true;
    }

    public function getChoiceForm(Player $player)
    {
        $form = new SimpleForm(function(Player $player, $data){
        $ame = new Amethyst($this);
        $dm = new Diamond($this);
        $eme = new Emerald($this);
        $gold = new Gold($this);
        $quart = new Quartz($this);
        $reds = new Redstone($this);
            if(is_null($data)){
                return;
            }
            switch($data){
                case 0: // ame
                    $ame->getAmeForm($player);
                     
                    break;

                case 1: // dm
                    $dm->getDmForm($player);
                     
                    break;

                case 2: // eme
                    $eme->getEmeForm($player);
                     
                    break;

                case 3: // gold
                    $gold->getGoldForm($player);
                     
                    break;

                case 4: // quart
                    $quart->getQuartForm($player);
                     
                    break;

                case 5: // reds
                    $reds->getRedForm($player);
                     
                    break;
            }
        });
        $form->setTitle("§6Trims UI");
        $form->setContent("§7Hello". $player->getName(). "§7Choose the material bellow:");
        $form->addButton("§d§lAMETHYST",0,"textures/items/amethyst_shard");
        $form->addButton("§b§lDIAMOND",0,"textures/items/diamond");
        $form->addButton("§a§lEMERALD",0,"textures/items/emerald");
        $form->addButton("§e§lGOLD",0,"textures/items/gold");
        $form->addButton("§f§lQUARTZ",0,"textures/items/quartz");
        $form->addButton("§c§lREDSTONE",0,"textures/items/redstone");
        $form->addButton("§cCLOSE",0,"textures/ui/cancel");
        $player->sendForm($form);
    }
}

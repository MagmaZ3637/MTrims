<?php

declare(strict_types=1);

namespace trim\subform;

use pocketmine\event\Listener;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;

use jojoe77777\FormAPI\Form;
use jojoe77777\FormAPI\SimpleForm;
use MagmaZ3637\trim\Main;

use KRUNCHSHooT\LibTrimArmor\LibTrimArmor;
use KRUNCHSHooT\LibTrimArmor\MaterialType;
use KRUNCHSHooT\LibTrimArmor\PatternType;
use KRUNCHSHooT\LibTrimArmor\utils\TrimUtils;
use pocketmine\item\VanillaItems;

class Quartz
{
    private Main $plugin;

    public function __construct(Main $plugin) {
        $this->plugin = $plugin;
    }

    public function getQuartForm(Player $player)
    {
        $form = new SimpleForm(function(Player $player, $data) {
            if (is_null($data)) {
                return;
            }
            switch ($data) {
                case 0: // sil1
                    $armor = [VanillaItems::NETHERITE_HELMET(), VanillaItems::NETHERITE_CHESTPLATE(), VanillaItems::NETHERITE_LEGGINGS(), VanillaItems::NETHERITE_BOOTS()];
                    foreach($armor as $item){
                        LibTrimArmor::create($item, MaterialType::QUARTZ, PatternType::SILENCE);
                        $player->getInventory()->addItem($item);
                    }

                    break;

                case 1: // sno1
                    $armor = [VanillaItems::NETHERITE_HELMET(), VanillaItems::NETHERITE_CHESTPLATE(), VanillaItems::NETHERITE_LEGGINGS(), VanillaItems::NETHERITE_BOOTS()];
                    foreach($armor as $item){
                        LibTrimArmor::create($item, MaterialType::QUARTZ, PatternType::SNOUT);
                        $player->getInventory()->addItem($item);
                    }

                    break;

                case 2: // dm
                    $armor = [VanillaItems::NETHERITE_HELMET(), VanillaItems::NETHERITE_CHESTPLATE(), VanillaItems::NETHERITE_LEGGINGS(), VanillaItems::NETHERITE_BOOTS()];
                    foreach($armor as $item){
                        LibTrimArmor::create($item, MaterialType::QUARTZ, PatternType::VEX);
                        $player->getInventory()->addItem($item);
                    }

                    break;

                case 3: // eme
                    $armor = [VanillaItems::NETHERITE_HELMET(), VanillaItems::NETHERITE_CHESTPLATE(), VanillaItems::NETHERITE_LEGGINGS(), VanillaItems::NETHERITE_BOOTS()];
                    foreach($armor as $item){
                        LibTrimArmor::create($item, MaterialType::QUARTZ, PatternType::WILD);
                        $player->getInventory()->addItem($item);
                    }

                    break;

                case 4: // gold
                    $armor = [VanillaItems::NETHERITE_HELMET(), VanillaItems::NETHERITE_CHESTPLATE(), VanillaItems::NETHERITE_LEGGINGS(), VanillaItems::NETHERITE_BOOTS()];
                    foreach($armor as $item){
                        LibTrimArmor::create($item, MaterialType::QUARTZ, PatternType::DUNE);
                        $player->getInventory()->addItem($item);
                    }

                    break;

                case 5: // iron
                    $armor = [VanillaItems::NETHERITE_HELMET(), VanillaItems::NETHERITE_CHESTPLATE(), VanillaItems::NETHERITE_LEGGINGS(), VanillaItems::NETHERITE_BOOTS()];
                    foreach($armor as $item){
                        LibTrimArmor::create($item, MaterialType::QUARTZ, PatternType::RIB);
                        $player->getInventory()->addItem($item);
                    }

                    break;
                case 6:
                    $this->plugin->getChoiceForm($player);
                    break;
            }
        });

        $form->setTitle("§6Trims UI");
        $form->setContent("§7Hello". $player->getName(). "§7Choose the material bellow:");
        $form->addButton("§b§lSILENCE");
        $form->addButton("§b§lSNOUT");
        $form->addButton("§b§lVEX");
        $form->addButton("§b§lWILD");
        $form->addButton("§b§lDUNE");
        $form->addButton("§b§lRIB");
        $form->addButton("§cBACK", 0, "textures/ui/cancel");
        $player->sendForm($form);
    }
}

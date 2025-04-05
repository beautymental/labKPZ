<?php
require_once 'Hero.php';
require_once 'Warrior.php';
require_once 'Mage.php';
require_once 'Paladin.php';
require_once 'HeroWithArmor.php';
require_once 'MageWithStaff.php';
require_once 'PaladinWithShield.php';

$warrior = new Warrior();
$mage = new Mage();
$paladin = new Paladin();

$warriorWithArmor = new HeroWithArmor($warrior);
$mageWithStaff = new MageWithStaff($mage);
$paladinWithShield = new PaladinWithShield($paladin);

echo $warriorWithArmor->getName() . "\n";
echo $mageWithStaff->getName() . "\n";
echo $paladinWithShield->getName() . "\n";

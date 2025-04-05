<?php
class HeroWithArmor extends Hero {
    protected $hero;

    public function __construct(Hero $hero) {
        $this->hero = $hero;
    }

    public function getName() {
        return $this->hero->getName() . " with Armor";
    }
}

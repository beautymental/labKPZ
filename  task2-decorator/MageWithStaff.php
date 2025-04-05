<?php
class MageWithStaff extends HeroWithArmor {
    public function getName() {
        return $this->hero->getName() . " with Staff";
    }
}

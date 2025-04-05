<?php
class PaladinWithShield extends HeroWithArmor {
    public function getName() {
        return $this->hero->getName() . " with Shield";
    }
}

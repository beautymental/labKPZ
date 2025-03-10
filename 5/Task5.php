<?php
class Hero {
    private $height;
    private $build;
    private $hairColor;
    private $eyeColor;
    private $inventory;

    public function __construct($height, $build, $hairColor, $eyeColor, $inventory) {
        $this->height = $height;
        $this->build = $build;
        $this->hairColor = $hairColor;
        $this->eyeColor = $eyeColor;
        $this->inventory = $inventory;
    }

    public function getHeight() {
        return $this->height;
    }

    public function setHeight($height) {
        $this->height = $height;
    }

    public function getBuild() {
        return $this->build;
    }

    public function setBuild($build) {
        $this->build = $build;
    }

    public function getHairColor() {
        return $this->hairColor;
    }

    public function setHairColor($color) {
        $this->hairColor = $color;
    }

    public function getEyeColor() {
        return $this->eyeColor;
    }

    public function setEyeColor($color) {
        $this->eyeColor = $color;
    }

    public function getInventory() {
        return $this->inventory;
    }

    public function setInventory($items) {
        $this->inventory = $items;
    }

    public function getDetails() {
        return "Height: $this->height, Build: $this->build, Hair Color: $this->hairColor, Eye Color: $this->eyeColor, Inventory: " . implode(", ", $this->inventory);
    }
}

class HeroBuilder {
    private $hero;

    public function __construct() {
        $this->hero = new Hero(0, "", "", "", []);
    }

    public function setHeight($height) {
        $this->hero->setHeight($height);
        return $this;
    }

    public function setBuild($build) {
        $this->hero->setBuild($build);
        return $this;
    }

    public function setHairColor($color) {
        $this->hero->setHairColor($color);
        return $this;
    }

    public function setEyeColor($color) {
        $this->hero->setEyeColor($color);
        return $this;
    }

    public function setInventory($items) {
        $this->hero->setInventory($items);
        return $this;
    }

    public function build() {
        return $this->hero;
    }
}

// Тестування
$builder = new HeroBuilder();
$hero = $builder->setHeight(180)
    ->setBuild("Muscular")
    ->setHairColor("Blonde")
    ->setEyeColor("Blue")
    ->setInventory(["Sword", "Shield"])
    ->build();

echo $hero->getDetails();
?>

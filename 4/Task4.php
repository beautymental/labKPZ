<?php
class Virus {
    private $name;
    private $weight;
    private $age;
    private $species;
    private $children = [];

    public function __construct($name, $weight, $age, $species) {
        $this->name = $name;
        $this->weight = $weight;
        $this->age = $age;
        $this->species = $species;
    }

    public function clone() {
        $newVirus = clone $this;
        return $newVirus;
    }

    public function addChild($child) {
        $this->children[] = $child;
    }

    public function getChildren() {
        return $this->children;
    }

    public function getName() {
        return $this->name;
    }
}


$virus1 = new Virus("Virus A", 1.2, 5, "Alpha");
$virus2 = $virus1->clone();
$virus2->addChild(new Virus("Virus B", 0.8, 3, "Beta"));

echo $virus1->getName() . " has " . count($virus1->getChildren()) . " children.\n";
echo $virus2->getName() . " has " . count($virus2->getChildren()) . " children.\n";
?>

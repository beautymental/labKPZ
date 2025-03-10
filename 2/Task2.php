<?php
interface Device {
    public function getName();
}

class Laptop implements Device {
    public function getName() {
        return "Laptop";
    }
}

class Netbook implements Device {
    public function getName() {
        return "Netbook";
    }
}

class EBook implements Device {
    public function getName() {
        return "EBook";
    }
}

class Smartphone implements Device {
    public function getName() {
        return "Smartphone";
    }
}

interface DeviceFactory {
    public function createLaptop();
    public function createNetbook();
    public function createEBook();
    public function createSmartphone();
}

class IProneFactory implements DeviceFactory {
    public function createLaptop() {
        return new Laptop();
    }

    public function createNetbook() {
        return new Netbook();
    }

    public function createEBook() {
        return new EBook();
    }

    public function createSmartphone() {
        return new Smartphone();
    }
}

class KiaomiFactory implements DeviceFactory {
    public function createLaptop() {
        return new Laptop();
    }

    public function createNetbook() {
        return new Netbook();
    }

    public function createEBook() {
        return new EBook();
    }

    public function createSmartphone() {
        return new Smartphone();
    }
}

class BalaxyFactory implements DeviceFactory {
    public function createLaptop() {
        return new Laptop();
    }

    public function createNetbook() {
        return new Netbook();
    }

    public function createEBook() {
        return new EBook();
    }

    public function createSmartphone() {
        return new Smartphone();
    }
}

// Тестування
$factory = new IProneFactory();
$laptop = $factory->createLaptop();
echo $laptop->getName();
?>

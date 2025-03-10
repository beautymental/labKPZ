<?php

// 1. Клас Money
class Money {
    private int $whole;
    private int $cents;

    public function __construct(int $whole = 0, int $cents = 0) {
        $this->whole = $whole;
        $this->cents = $cents;
    }

    public function setMoney(int $whole, int $cents): void {
        $this->whole = $whole;
        $this->cents = $cents;
    }

    public function getWhole(): int {
        return $this->whole;
    }

    public function getCents(): int {
        return $this->cents;
    }

    public function __toString(): string {
        return $this->whole . '.' . str_pad($this->cents, 2, '0', STR_PAD_LEFT);
    }
}

// 2. Клас Product
class Product {
    public string $name;
    public Money $price;
    public string $category;

    public function __construct(string $name, Money $price, string $category = 'General') {
        $this->name = $name;
        $this->price = $price;
        $this->category = $category;
    }

    public function reducePrice(Money $amount): void {
        $totalCents = ($this->price->getWhole() * 100 + $this->price->getCents()) - ($amount->getWhole() * 100 + $amount->getCents());
        $totalCents = max($totalCents, 0);
        $this->price->setMoney(intdiv($totalCents, 100), $totalCents % 100);
    }

    public function __toString(): string {
        return "Product: {$this->name}, Price: {$this->price}, Category: {$this->category}";
    }
}

// 3. Клас Warehouse
class WarehouseItem {
    public Product $product;
    public string $unit;
    public int $quantity;
    public string $lastDelivery;

    public function __construct(Product $product, string $unit, int $quantity, string $lastDelivery) {
        $this->product = $product;
        $this->unit = $unit;
        $this->quantity = $quantity;
        $this->lastDelivery = $lastDelivery;
    }

    public function __toString(): string {
        return "{$this->product}, Unit: {$this->unit}, Quantity: {$this->quantity}, Last Delivery: {$this->lastDelivery}";
    }
}

class Warehouse {
    private array $items = [];

    public function addItem(WarehouseItem $item): void {
        $this->items[] = $item;
    }

    public function removeItem(string $productName, int $quantity): void {
        foreach ($this->items as $item) {
            if ($item->product->name === $productName && $item->quantity >= $quantity) {
                $item->quantity -= $quantity;
                break;
            }
        }
    }

    public function getInventory(): array {
        return array_map('strval', $this->items);
    }
}

// 4. Клас Reporting
class Reporting {
    public static function incomeInvoice(WarehouseItem $item, int $quantity): string {
        return "Income Invoice: {$item->product->name} x {$quantity}, Unit Price: {$item->product->price}, Total: " .
            ($item->product->price->getWhole() * $quantity) . '.' . str_pad($item->product->price->getCents() * $quantity, 2, '0', STR_PAD_LEFT);
    }

    public static function expenseInvoice(WarehouseItem $item, int $quantity): string {
        return "Expense Invoice: {$item->product->name} x {$quantity}, Unit Price: {$item->product->price}, Total: " .
            ($item->product->price->getWhole() * $quantity) . '.' . str_pad($item->product->price->getCents() * $quantity, 2, '0', STR_PAD_LEFT);
    }

    public static function inventoryReport(Warehouse $warehouse): string {
        return "Inventory Report:\n" . implode("\n", $warehouse->getInventory());
    }
}

?>

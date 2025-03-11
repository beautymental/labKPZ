<?php

// 1. Клас Money
class Money {
    private int $whole;
    private int $cents;

    public function __construct(int $whole = 0, int $cents = 0) {
        $this->setMoney($whole, $cents);
    }

    public function setMoney(int $whole, int $cents): void {
        $totalCents = $whole * 100 + $cents;
        $this->whole = intdiv($totalCents, 100);
        $this->cents = $totalCents % 100;
    }

    public function subtract(Money $amount): void {
        $this->setMoney($this->whole, $this->cents - ($amount->whole * 100 + $amount->cents));
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
        $this->price->subtract($amount);
    }

    public function __toString(): string {
        return "Product: {$this->name}, Price: {$this->price}, Category: {$this->category}";
    }
}

// 3. Клас WarehouseItem
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

// 4. Клас Warehouse
class Warehouse {
    private array $items = [];

    public function addItem(WarehouseItem $item): void {
        $this->items[] = $item;
    }

    public function removeItem(string $productName, int $quantity): void {
        foreach ($this->items as $key => $item) {
            if ($item->product->name === $productName) {
                $item->quantity -= $quantity;
                if ($item->quantity <= 0) {
                    unset($this->items[$key]);
                }
                break;
            }
        }
    }

    public function getInventory(): array {
        return array_map('strval', $this->items);
    }
}

// 5. Інтерфейс InvoiceGenerator
interface InvoiceGenerator {
    public function generate(WarehouseItem $item, int $quantity): string;
}

// 6. Реалізації InvoiceGenerator
class IncomeInvoice implements InvoiceGenerator {
    public function generate(WarehouseItem $item, int $quantity): string {
        return "Income Invoice: {$item->product->name} x {$quantity}, Price: {$item->product->price}";
    }
}

class ExpenseInvoice implements InvoiceGenerator {
    public function generate(WarehouseItem $item, int $quantity): string {
        return "Expense Invoice: {$item->product->name} x {$quantity}, Price: {$item->product->price}";
    }
}

// 7. Клас Reporting
class Reporting {
    private static function generateInvoice(InvoiceGenerator $invoice, WarehouseItem $item, int $quantity): string {
        return $invoice->generate($item, $quantity);
    }

    public static function incomeInvoice(WarehouseItem $item, int $quantity): string {
        return self::generateInvoice(new IncomeInvoice(), $item, $quantity);
    }

    public static function expenseInvoice(WarehouseItem $item, int $quantity): string {
        return self::generateInvoice(new ExpenseInvoice(), $item, $quantity);
    }

    public static function inventoryReport(Warehouse $warehouse): string {
        return "Inventory Report:\n" . implode("\n", $warehouse->getInventory());
    }
}

?>

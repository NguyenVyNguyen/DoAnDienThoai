<?php
class Cart{
    public int $id_product;
    public string $name;
    public string $color;
    public float $price;
    public int $quantity;
    
    public function __construct(
        int $id_product,
        string $name,
        string $color,
        float $price,
        int $quantity
    ) {
        $this->id_product = $id_product;
        $this->name = $name;
        $this->color = $color;
        $this->price = $price;
        $this->quantity = $quantity;
    }
    // ===== Getter =====
    public function getIdProduct(): int {
        return $this->id_product;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getColor(): string {
        return $this->color;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function getQuantity(): int {
        return $this->quantity;
    }
    // ===== Setter =====
    public function setQuantity(int $quantity): void {
        $this->quantity = $quantity;
    }
    
    
}
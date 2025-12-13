<?php

class Product
{
    public int $id_product;
    public int $id_user;
    public int $id_category;
    public string $name;
    public string $color;
    public float $price;
    public int $quantity;
    public string $status;
    public int $warrantyperiod;

    public function __construct(
        int $id_product,
        int $id_user,
        int $id_category,
        string $name,
        string $color,
        float $price,
        int $quantity,
        string $status,
        int $warrantyperiod
    ) {
        $this->id_product = $id_product;
        $this->id_user = $id_user;
        $this->id_category = $id_category;
        $this->name = $name;
        $this->color = $color;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->status = $status;
        $this->warrantyperiod = $warrantyperiod;
    }

    // ===== Getter =====
    public function getIdProduct(): int {
        return $this->id_product;
    }

    public function getIdUser(): int {
        return $this->id_user;
    }

    public function getIdCategory(): int {
        return $this->id_category;
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

    public function getStatus(): string {
        return $this->status;
    }

    public function getWarrantyPeriod(): int {
        return $this->warrantyperiod;
    }

    // ===== Setter (ví dụ) =====
    public function setQuantity(int $quantity): void {
        $this->quantity = $quantity;
    }

    public function setStatus(string $status): void {
        $this->status = $status;
    }
}

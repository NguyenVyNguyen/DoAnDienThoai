<?php

class Category {
    public int $id_category;
    public string $name;

    public function __construct(
        int $id_category,
        string $name
    ) {
        $this->id_category = $id_category;
        $this->name = $name;
    }

    // ===== Getter =====
    public function getIdCategory(): int {
        return $this->id_category;
    }

    public function getName(): string {
        return $this->name;
    }

}

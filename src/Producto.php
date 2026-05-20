<?php

namespace App;

class Producto {
    public string $nombre;
    public float $precio;

    public function __construct(string $nombre, float $precio) {
        $this->nombre = $nombre;
        $this->precio = $precio;
    }

    public function getInfo(): string {
        return "Producto: {$this->nombre} | Precio: $" . number_format($this->precio, 2);
    }
}
<?php

namespace App;

class Carrito {
    private array $productos = [];

    public function agregar(Producto $producto): void {
        $this->productos[] = $producto;
        echo "Agregado: {$producto->nombre}\n";
    }

    public function getProductos(): array {
        return $this->productos;
    }
}
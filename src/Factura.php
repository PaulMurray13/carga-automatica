<?php

namespace App;

class Factura {
    private Carrito $carrito;

    public function __construct(Carrito $carrito) {
        $this->carrito = $carrito;
    }

    public function generar(): void {
        echo "\n===== FACTURA =====\n";
        $total = 0;
        foreach ($this->carrito->getProductos() as $producto) {
            echo $producto->getInfo() . "\n";
            $total += $producto->precio;
        }
        echo "-------------------\n";
        echo "TOTAL: $" . number_format($total, 2) . "\n";
        echo "===================\n";
    }
} 

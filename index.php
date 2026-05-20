<?php

require_once 'vendor/autoload.php';

use App\Producto;
use App\Carrito;
use App\Factura;

// Crear productos
$p1 = new Producto("Laptop", 850.00);
$p2 = new Producto("Mouse", 25.50);
$p3 = new Producto("Teclado", 45.00);

// Agregar al carrito
$carrito = new Carrito();
$carrito->agregar($p1);
$carrito->agregar($p2);
$carrito->agregar($p3);

// Generar factura
$factura = new Factura($carrito);
$factura->generar(); 

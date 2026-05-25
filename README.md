# Implementación de Carga Automática (Autoload) bajo el Estándar PSR-4 con Composer

## Descripción

Este proyecto implementa el estándar **PSR-4** para la organización de archivos y clases PHP utilizando **Composer Autoload**. El objetivo es demostrar cómo eliminar el uso de `include` y `require` manuales mediante la configuración automática de namespaces.

---

## Instalación

### Requisitos
- PHP 7.0 o superior
- Composer instalado

### Pasos de Instalación

1. **Clonar el repositorio:**
```bash
git clone <tu-repositorio>
cd Autoload
```

2. **Instalar dependencias de Composer:**
```bash
composer install
```

3. **Generar el autoloader (si es necesario):**
```bash
composer dump-autoload
```

---

## Estructura del Proyecto

```
Autoload/
│
├── App/
│   └── User.php                    # Clase User con namespace App
│
├── Database/
│   └── Model/
│       └── ProductModel.php        # Clase ProductModel con namespace Database\Model
│
├── vendor/
│   ├── autoload.php                # Autoloader generado por Composer (NO editar)
│   └── composer/
│
├── composer.json                   # Configuración de PSR-4
├── .gitignore                      # Excluir archivos no necesarios
├── prueba.php                      # Archivo principal que usa el autoload
└── README.md                       # Este archivo
```

### Mapa de Namespaces

| Namespace | Carpeta Física |
|-----------|---|
| `App\` | `App/` |
| `Database\` | `Database/` |

---

## Configuración de Composer (composer.json)

```json
{
  "autoload": {
    "psr-4": {
      "App\\": "App/",
      "Database\\": "Database/"
    }
  }
}
```

Esta configuración indica a Composer que:
- Las clases con namespace `App\` se encuentran en la carpeta `App/`
- Las clases con namespace `Database\` se encuentran en la carpeta `Database/`

---

## Uso del Autoload

### Antes (Sin Autoload)
```php
<?php
require("App/User.php");
require("Database/Model/ProductModel.php");

$user = new App\User();
$product = new Database\Model\ProductModel();
?>
```

### Después (Con Autoload PSR-4)
```php
<?php
require("vendor/autoload.php");

use App\User;
use Database\Model\ProductModel;

$user = new User();
$product = new ProductModel();
?>
```

---

## Pruebas de Ejecución

### Ejecutar el Archivo Principal

```bash
php prueba.php
```

### Resultado Esperado
```
John Doe
123
```

**Explicación:**
- `John Doe` → Resultado del método `getName()` de la clase `User`
- `123` → Resultado del método `getId()` de la clase `ProductModel`

---

## Conclusiones Técnicas

### 1. Mantenibilidad
✅ **Facilidad para agregar nuevas clases:** No es necesario modificar archivos de configuración global. Solo crear una nueva clase en la carpeta correspondiente respetando el namespace y el autoload la encontrará automáticamente.

**Ejemplo:** Si quiero agregar `Database\Model\OrderModel`, simplemente creo el archivo en `Database/Model/OrderModel.php` con el namespace correcto.

### 2. Eficiencia de Memoria (Lazy Loading)
✅ **Carga bajo demanda:** Con PSR-4, las clases se cargan SOLO cuando se usan, no todas al inicio del script. Esto reduce el consumo de memoria.

**Ventaja:** Un proyecto con 100 clases solo carga las que necesita en ese momento, mejorando el rendimiento.

### 3. Estandarización y Colaboración
✅ **Estándar PSR-4 (PHP Standard Recommendation):** Todos los desarrolladores PHP conocen este estándar, lo que facilita la colaboración en equipo y la integración con frameworks modernos (Laravel, Symfony, etc.).

**Beneficio:** El código es predecible, organizado y compatible con herramientas existentes.

### 4. Escalabilidad
✅ **Crecimiento sin caos:** Proyectos grandes con cientos de clases se mantienen organizados sin conflictos de nombres ni archivos perdidos.

---

## Archivos Importantes

### `prueba.php`
Archivo principal que demuestra el uso del autoload:
```php
<?php
require("vendor/autoload.php");

use App\User;
use Database\Model\ProductModel;

$user = new User();
echo $user->getName();
echo "\n";

$product = new ProductModel();
echo $product->getId();
?>
```

### `App/User.php`
```php
<?php
namespace App;

class User {
    public function getName(): string {
        return "John Doe";
    }
}
?>
```

### `Database/Model/ProductModel.php`
```php
<?php
namespace Database\Model;

class ProductModel {
    public function getId(): int {
        return 123;
    }
}
?>
```

---

## Archivo .gitignore

El archivo `.gitignore` excluye la carpeta `vendor/` del repositorio porque:
- Ocupa mucho espacio (~2-10 MB)
- Se regenera automáticamente con `composer install`
- Cada máquina puede tener versiones diferentes

---

## Comandos Útiles

```bash
# Instalar dependencias
composer install

# Regenerar autoloader
composer dump-autoload

# Actualizar dependencias
composer update

# Validar composer.json
composer validate
```

---

## Referencias

- [PSR-4 Standard](https://www.php-fig.org/psr/psr-4/)
- [Composer Documentation](https://getcomposer.org/doc/)
- [PHP Namespaces](https://www.php.net/manual/en/language.namespaces.php)

---

**Fecha de Creación:** 2 de Mayo de 2026  
**Autor:** Estudiante de Ingeniería en Sistemas  
**Asignatura:** Desarrollo de Software VII

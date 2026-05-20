AutoloadLab — PSR-4 con Composer
Laboratorio de Carga Automática con Composer bajo el estándar PSR-4.
Requisitos

PHP 8.0 o superior
Composer instalado

Instalación
bashgit clone https://github.com/PaulMurray13/carga-automatica.git
cd carga-automatica
composer dump-autoload
Ejecución
bashphp index.php
Estructura
AutoloadLab/
├── src/
│   ├── Producto.php
│   ├── Carrito.php
│   └── Factura.php
├── composer.json
├── index.php
└── .gitignore
Conclusiones

Mantenibilidad: Se pueden agregar nuevas clases sin tocar archivos de configuración.
Eficiencia: Las clases solo se cargan cuando se necesitan, ahorrando memoria.
Estandarización: PSR-4 facilita el trabajo en equipo y la organización del proyecto.
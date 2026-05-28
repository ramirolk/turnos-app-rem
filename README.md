# Sistema de Turnos

Aplicación web para gestión de turnos adaptable a distintos rubros.

## Stack

- PHP
- MySQL
- HTML / CSS / JavaScript

## Requisitos

- PHP 8.0 o superior
- MySQL 5.7 o superior
- Servidor local: XAMPP o Laragon

## Instalación local

1. Clonar el repositorio
   git clone https://github.com/tu-usuario/turnos-app.git

2. Crear la base de datos en MySQL
   Importar el archivo: config/database.sql

3. Configurar la conexión
   Editar config/database.php con tus credenciales locales

4. Apuntar el servidor al proyecto
   El document root debe apuntar a la carpeta raíz del proyecto

## Estructura del proyecto

turnos-app/
├── app/
│   ├── controllers/
│   ├── models/
│   ├── services/
│   └── views/
├── config/
├── public/        ← punto de entrada público
├── routes/
└── README.md
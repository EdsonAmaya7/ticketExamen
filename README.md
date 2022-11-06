<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>
****
<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


## Instalacion
La instalacion requiere composer como dependencia.
- Descarga las librerias y dependecias necesarias para el proyecto.

 ```sh
    composer install
```

Modifica el archivo .env.example con las credenciales de las conecciones a tu base de datos, luego renombralo a .env

Una vez instaladas las dependecias del proyecto utiliza el comando

```sh
    php artisan key:generate
```
para generar las llaves de autenticacion del proyecto actual.

Para instalar las tablas definidas de usuario, tipo_usuario y departamento, utiliza el comando
```sh
    php artisan migrate
```

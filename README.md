# Dashboard de Cervepar

![version](https://img.shields.io/badge/version-1.0.0-blue.svg) 
![license](https://img.shields.io/badge/license-MIT-blue.svg)

## Tabla de Contenido
* Pre requisitos
* Instalación
* Configuración

## Pre requisitos

Para correr la aplicación es necesario contar con:

 - PHP corriendo en su version 8 como mínimo
 - PostgreSQL corriendo en cualquier version


## Instalación
1. Clonar el repositorio inicial
2. Generar una base de datos dentro de PostgreSQL
3. Correr en la terminal `composer install`
4. Copiar `.env.example` a `.env` y actualiza los datos de la configuración, principalmente el de la base de datos
5. Correr en la terminal `php artisan key:generate`
6. Correr en la terminal `php artisan migrate --seed` para crear la base de datos

## Configuración
El sistema a su vez require la configuración del negocio por lo cual hay que modificar las siguientes variables en el archivo `.env`

-   Empresa
-   Actividad
-   RUC
-   Central

una vez realizada la configuración se puede ingresar a la aplicación con el usuario por defecto el cual es `admin@test.com` con la contraseña `12345` y terminar la configuración interna de este.
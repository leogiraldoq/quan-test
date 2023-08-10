
# Quan Prueba Backend Laravel

CRUD de usuarios API y FRONT, realizada por Leonardo Giraldo Quintero

##Instalación
-----------------

> [!IMPORTANTE]
> Verificar que Composer, npm y mysql, estan instalados en su equipo de computo.Clonar el repositorio en el lugar de su preferencia, ingresar al proyecto llamado quan-test. 

1. Ubicamos el archivo .env, si no esta creado copiar el archivo .env.example y renombrarlo a .env

2. En el arvhivo .env agregamos las variables para la conexión a la base de datos MySql o MariaDB
```console
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE= DB_NAME
DB_USERNAME= DB_USER
DB_PASSWORD= DB_PASSWORD
```
> [!IMPORTANTE]
> EL usuario que este creado para acceder a la base de datos debe tener habilitados los permisos para realizar consultas al DDL y DML en la base de datos elegida 

3. Ejecutar el comamdo para actualizar he instalar el proyecto
```console
> $composer update
```
4. COrremos el comando que contiene las migraciones de la aplicación
```console
> $php artisan migrate
```
5. Llenamos las tablas creadas por la migración con los datos de inicio
```console
> $php artisan db:seed
```
6. Ejecutamos los comandos para la instalación de los paquetes utilizados para la visualización o front de la aplicación
```console
> $npm install
```
7. Ejecutamos el siguiente comando para levantar nuestro servidor integrado  del proyecto laravel, si solo necesitamos el back funcionando
```console
> $php artisan serve
```
8. Para el correcto funcionamiento del front, despues de levantar el servidor (php artisan serve) debemos en otra ventana y/o pestaña de la terminal ingresar a la carperta del proyecto *quan-test* y ejecutamos el siguiente comando
```console
> $npm run dev
```

##Metodos de consumo Api
-----------------

> [!IMPORTANTE]
> Cuando nuestro servidor ya se esta ejecutando, el nos muestra la dirección donde se esta ejecutando el proyecto, normalmente la url es **http://127.0.0.1:8000**, para efectos de este manual utilizaremos esta dirección.

- Auth Loguin
*Ruta:* /api/auth/login
*Metodo:* POST
*Formato datos:* JSON

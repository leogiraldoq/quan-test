
# Quan Prueba Backend Laravel

CRUD de usuarios API y FRONT, realizada por Leonardo Giraldo Quintero

## Instalación
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
4. Corremos el comando que contiene las migraciones de la aplicación
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

## Metodos de consumo Api
-----------------

> [!IMPORTANTE]
> Cuando nuestro servidor ya se esta ejecutando, el nos muestra la dirección donde se esta ejecutando el proyecto, normalmente la url es **http://127.0.0.1:8000**, para efectos de este manual y en los ejemplos dados utilizaremos esta dirección.

### Inicio de sesion
- *Metodo:* `POST`
- *Ruta:* `/api/auth/login`
- *Parametros petición:*
```json
{
	"email":"test1@email.com",
	"password":"password"
}
``` 
- *Respuesta:*
```json
{
	"message": "Bienvenido Leonardo Giraldo Quintero",
	"token": "91|Sbur2FDbjJzVfpBYtiFfd1kwoRDQ4lTNQkTD2qtm",
	"permisions": [
		"Create",
		"Update",
		"Delete"
	]
}
```
Esta es la unica petición que no necesita de un token para ser realizda y en su respuesta nos devuelve el **token** para las siguientes peticiones

> [!IMPORTANTE]
> Por seguridad de mi aplicación se realiza la creación de un primer usuario en los seeders, iniciar con los siguientes datos **email**: test1@email.com,**password**: password.

### Crear usuario
- *Metodo:* `POST`
- *Ruta:* `/api/users/create`
- *Parametros petición:*
```json
{
	"name" : "Alejandro Giraldo",
	"email": "trisha48@hermiston.org",
	"password": "l30n4rd0",
	"personal_reference" : [{
		"names": "Jose Pepito Perez",
		"phone": "1234567890",
		"email": "test1@mail.com"
	}],
	"blood_type": "O+",
	"phone_number": "1234567890",
	"address": "Calle 321 # 32 - 1",
	"birth": "1986-10-24",
	"role": [1,3]
}
``` 
- *Autenticación:* Token Bearer
- *Respuesta:*
```json
{
	"id": 3,
	"name": "Alejandro Giraldo",
	"email": "trisha48@hermiston.org",
	"email_verified_at": null,
	"created_at": null,
	"updated_at": null,
	"message": "El usuario Alejandro Giraldo ha sido creado correctamente",
	"roles": [
		{
			"id": 1,
			"group": "users",
			"rol": "Create",
			"description": "Solo puede insertar o crear usuarios",
			"status": "Active",
			"created_at": null,
			"updated_at": null,
			"pivot": {
				"user_id": 3,
				"role_id": 1
			}
		},
		{
			"id": 3,
			"group": "users",
			"rol": "Delete",
			"description": "Solo puede eliminar usuarios",
			"status": "Active",
			"created_at": null,
			"updated_at": null,
			"pivot": {
				"user_id": 3,
				"role_id": 3
			}
		}
	],
	"personal_user_data": [
		{
			"id": 3,
			"user_id": 3,
			"personal_reference": "[{\"email\": \"test1@mail.com\", \"names\": \"Jose Pepito Perez\", \"phone\": \"1234567890\"}]",
			"blood_type": "O+",
			"phone_number": "1234567890",
			"address": "Calle 321 # 32 - 1",
			"birth": "1986-10-24",
			"created_at": "2023-08-08T06:46:47.000000Z",
			"updated_at": "2023-08-08T06:46:47.000000Z"
		}
	]
}
```

### Actualizar usuario
- *Metodo:* `PUT`
- *Ruta:* `/api/users/update`
- *Parametros petición:*
```json
{
	"id": 3,
	"name" : "Prueba Actualización",
	"email": "trisha48@hermiston.org",
	"password": "l30n4rd0",
	"personal_reference" : [{
		"names": "Jose Pepito Perez",
		"phone": "1234567890",
		"email": "test1@mail.com"
	},{
		"names": "Jose Pepito Perez",
		"phone": "1234567890",
		"email": "test1@mail.com"
	},{
		"names": "Jose Pepito Perez",
		"phone": "1234567890",
		"email": "test1@mail.com"
	}],
	"blood_type": "O+",
	"phone_number": "1234567890",
	"address": "Calle 321 # 32 - 1",
	"birth": "1986-10-24",
	"role": [1,3]
}
``` 
- *Autenticación:* Token Bearer
- *Respuesta:*
```json
{
	"id": 3,
	"name": "Prueba Actualización",
	"email": "trisha48@hermiston.org",
	"email_verified_at": null,
	"created_at": null,
	"updated_at": "2023-08-08T06:46:55.000000Z",
	"message": "El usuario Prueba Actualización ha sido actualizado correctamente",
	"roles": [
		{
			"id": 1,
			"group": "users",
			"rol": "Create",
			"description": "Solo puede insertar o crear usuarios",
			"status": "Active",
			"created_at": null,
			"updated_at": null,
			"pivot": {
				"user_id": 3,
				"role_id": 1
			}
		},
		{
			"id": 3,
			"group": "users",
			"rol": "Delete",
			"description": "Solo puede eliminar usuarios",
			"status": "Active",
			"created_at": null,
			"updated_at": null,
			"pivot": {
				"user_id": 3,
				"role_id": 3
			}
		}
	],
	"personal_user_data": [
		{
			"id": 3,
			"user_id": 3,
			"personal_reference": "[{\"email\": \"test1@mail.com\", \"names\": \"Jose Pepito Perez\", \"phone\": \"1234567890\"}]",
			"blood_type": "O+",
			"phone_number": "1234567890",
			"address": "Calle 321 # 32 - 1",
			"birth": "1986-10-24",
			"created_at": "2023-08-08T06:46:47.000000Z",
			"updated_at": "2023-08-08T06:50:32.000000Z"
		}
	]
}
```

### Borrar usuario
- *Metodo:* `DELETE`
- *Ruta:* `/api/users/delete`
- *Parametros petición:*
```json
{
	"id": 3,
}
``` 
- *Autenticación:* Token Bearer
- *Respuesta:*
```json
{
	"message": 	"El usuario Alejandro Giraldo ha sido eliminado correctamente",
}
```


# APPMunicipal

El proyecto consiste en una página web donde los usuarios pueden ver los eventos que hjay disponibles y pueden inscribirse a ellos. También está la parte de admin donde se podrá llevar el control de todos los eventos y de los usuarios inscritos. Los administradores pueden editar, modificar, crear eventos...

## Comenzando 🚀

Con estas instrucciones te epxlicaré como hacer para poder visualizar la página web, tanto de manera local como mediante un host.

Mira **Instalación** para conocer como visualizar la página web de manera local.

Mira **Despliegue**  para conocer como visualizar la página web desde el host.

### Pre-requisitos 📋

_Que cosas necesitas para instalar el software y como instalarlas_

Para poder visualizar nuestra página web tenemos que instalar XAMPP (https://www.apachefriends.org/es/index.html)

También necesitaremos con editor de texto como puede ser:
* **Visual Studio Code** - (https://code.visualstudio.com/)
* **Sublime Text** - (https://www.sublimetext.com/)

### Instalación 🔧


_Instalaciones_

_Añadir la base de datos_

```
Tendras que insertar, una vez descargado el proyecto, en la **carpeta bd** encontraras el fichero **bd_app**. Ahí estarán todos los inserts que tendrás que 
meter en el sql de PhpMyAdmin, copias el texto, lo pegas y ejecutas el contenido del fichero

```
_Creación de un fichero config_
```
Crea un fichero llamado config.php en el directorio services con el siguiente contenido dentro:
```
```
<?php
define("SERVIDOR","localhost");
define("USUARIO","root");
define("PASSWORD","");
define("BD","bd_restaurante");
?>
```
Introduce todo el directorio completo dentro de htdocs en Xampp y podras acceder al directorio mediante el navegador cuando el servidor apache del XAMP esté activado junto con el SQL

## Despliegue 📦

Entramos en 000Webhost (https://es.000webhost.com) y creamos una cuenta.

A continuación agregaremos un nuevo proyecto,

En la carpeta **public_html** añadiremos todos los archivos de la página web.

Ahora procederemos a añadir la base de datos creandola desde 000webhost en **Tools y Database manager**, dentro crearemos la base de datos con nombre bd_app
Tendras que insertar, una vez descargado el proyecto, en la **carpeta bd** encontraras el fichero **bd_app**. Ahí estarán todos los inserts que tendrás que 
meter en el sql de PhpMyAdmin, copias el texto, lo pegas y ejecutas el contenido del fichero
Una vez tengamos esto, configuraremos el fichero **config.php** con las credenciales que hemos indicado al crear la base de datos.

Para acceder a la página de admin necesitamos iniciar sesión, por eso aquí abajo te dejo un usuario de prueba: 


**Email:** admin@gmail.com

**Contraseña:** qweQWE123

## Construido con 🛠️

* [PHP] - Lenguaje de programación
* [JS] - Para la validación de formularios
* [HTML & CSS] - Para el diseño y la forma del contenido 
* [PhpMyAdmin] - Para la base de datos

## Autores ✒️

* **Juan Carlos Gundín** - *Back-end* 
* **Laura Fernández** - *JS y front-end* 

También puedes mirar la lista de todos los [contribuyentes](https://github.com/LauraFernandez18/APPMunicipal/contributors) quíenes han participado en este proyecto. 



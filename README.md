# TIS_E-Learning_Project
Proyecto grupal de Taller de Ingeniería de Software que consiste en la creación de una plataforma E-Learning para emprendedores y pequeñas empresas, orientada al marketing digital.

# Proyecto Plataforma E Learning

La plataforma a desarrollar, se hará mediante el uso del lenguaje [PHP](https://www.php.net/), [HTML](https://html.com/), [CSS](https://lenguajecss.com/css/), entre otros. Además, para la gestión de la base de datos se usará a [phpMyAdmin](https://www.phpmyadmin.net/), y como gestor de la base de datos será [MySQL](https://www.mysql.com/) que estará integrado en [Xampp](https://www.apachefriends.org/es/index.html). 

_PD: No es necesario instalar MySQL por separado, basta con solo instalar Xampp_

## Tabla de Contenidos
* [Plataforma](#proyecto-plataforma-e-learning)
* [Instalacion](#instalacion)
* [Estado del proyecto](#estado-del-proyecto)
* [Tecnologias usadas](#tecnologias-usadas)

## Instalacion

- Primero comenzamos descargando el archivo **elearning.sql** que se encuentra dentro de la carpeta **_"Modelos_BD"_**. Si quieren pueden descargar los demás modelos generados en PowerDesigner, aunque no es necesario, basta con tener el script SQL.

### Instalación de Xampp

- Segundo, procedemos a descargar Xampp usando el siguiente enlace [Xampp](https://www.apachefriends.org/es/download.html).

Seleccionamos la ultima versión existente:

![image](https://github.com/user-attachments/assets/c31d347c-3513-4230-9b3f-f0a217856484)

Ejecutamos el instalador:

![image](https://github.com/user-attachments/assets/2b335bb4-e9ee-42ac-a937-4671bfbebde9)

Aceptamos las opciones:

![image](https://github.com/user-attachments/assets/eb82254a-ef4d-4fad-a7ad-14c1d026c675)

Procuramos tener estas dos opciones marcadas (phpMyAdmin & MySQL) si o si:

![image](https://github.com/user-attachments/assets/5875d2e1-7232-4c66-8bda-5bef2b79b1ed)

Y terminamos con la instalación:

![image](https://github.com/user-attachments/assets/6f7516f2-0551-4bc8-b546-238ce23f8864)

### Ejecución de phpMyAdmin

- Para empezar a trabajar con la base de datos en **phpMyAdmin** primero ejecutamos Xampp y le damos **Start** tanto a Apache como a MySQL:

![image](https://github.com/user-attachments/assets/31768193-8c49-46be-ac07-da1f2ab1466c)

Seleccionamos la opción de **"admin"** en MySQL y se nos redirigirá a `http://localhost/phpmyadmin/`

Dentro de esta pagina seleccionamos **Base de Datos** e ingresamos un nombre para dicha BD, que en este caso fue **_elearning_DB_**. Todo lo demás lo mantenemos igual y seleccionamos **Crear**

![image](https://github.com/user-attachments/assets/00d74097-a10e-43d6-bcb6-f3398b3ee8b5)

### Creación de la Base de Datos

- Para ejecutar el Script SQL basta con seleccionar el nombre de nuestra base de datos en el panel lateral izquierdo, nos dirigimos a **Importar** y seleccionamos el script **elearning.sql** que descargamos en un principio, para finalizar seleccionando el botón **Importar** que se encuentra al final de la pagina.

![image](https://github.com/user-attachments/assets/31309223-3cb2-4d2c-8e36-293a4b22969c)

### Visual Studio Code

- Dentro del IDE procuramos contar con nuestro archivo de conexión **config.php**, en el cual ingresaremos los parametros necesarios, que en este caso solo será modificando el **_DB_name_**, por el nombre correspondiente al de nuestra base de datos que está en **phpMyAdmin** _(Todos los demás valores quedan tal cual 'server', 'username', 'password')_

![image](https://github.com/user-attachments/assets/ea1804c7-0860-4783-b04b-8125eeaab9ca)

  
## Estado del proyecto

El proyecto está: _en progreso_

## Tecnologias usadas

 - PHP
 - HTML
 - CSS
 - Visual Studio Code
 - phpMyAdmin
 - MySQL
 - Xampp


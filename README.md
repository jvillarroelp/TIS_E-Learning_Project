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

### Descarga y clonación de proyecto.

1. Copiamos la dirección HTTPS referente al repositorio a clonar:

![image](https://github.com/user-attachments/assets/90922dab-26ae-4ae3-9ea3-d96dffeaee79)

2. Ejecutamos en carpeta raiz la terminal de git:

![image](https://github.com/user-attachments/assets/688d3681-ded3-428e-a20b-9f59703c91be)

3. Ingresamos ***"git init"*** en la terminal
4. Indicamos ***"git clone + dirección HTTTPS"***

   ![image](https://github.com/user-attachments/assets/322f2151-c8ea-4bb0-bf53-84a9118c44dd)

### Implementación VS Code

1. Procedemos a crear un archivo `.env` a partir del ejemplo existente que tiene por nombre `.env.example`. Debemos contar con los siguientes datos:

   ![image](https://github.com/user-attachments/assets/5b23c472-22d3-4e25-a130-60779f53a598)

2. Abrimos nuestra terminal e ingresamos ***"composer install"***

![image](https://github.com/user-attachments/assets/9992148f-7530-4ab2-a782-05fb857ca189)

3. Ejecutamos _migrations_ a partir del siguiente comando ***"php migrations.php"*** desde la raiz del proyecto.
4. Nos dirigimos a la carpeta _Public_ existente en dicho proyecto con `cd public` 
5. Encendemos el servidor PHP ejecutando el siguiente comando ***php -S localhost:8080***

![image](https://github.com/user-attachments/assets/f2f09185-f95a-480d-a91b-cf9b8ef50f27)

   
7. Abrimos en el navegador http://localhost:8080
   
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

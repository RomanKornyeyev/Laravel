<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Guía

## Instalación  y configuración del entorno de desarrollo

Hay varias maneras de trabajar con Laravel, aquí nos centraremos en un entorno de desarrollo de Windows con Docker. Usando Docker nos ahorraremos instalar PHP, Composer, MySQL, etc.

### Windows con Docker

#### Docker Desktop
Descarga e instala [Docker Desktop](https://www.docker.com/products/docker-desktop/).
Una vez instalado nos preguntará si queremos instalar WSL 2, aceptamos y continuamos. Seguidamente reiniciamos.
<br>
Para asegurarnos de no tener problemas de compatibilidades y usar la versión 2 de wsl, ejecutamos este comando en powershell 

```powershell
wsl --set-default-version 2
```

También usaremos la distro de **Ubuntu**, la cual tendremos que instalar:

```powershell
wsl --list --online
```

Nos saldrán distintas distros,  elegiremos **Ubuntu** para trabajar en ella:

```powershell
wsl --install -d Ubuntu
```

Una vez instalada, nos pedirá nombre y password. Como esto es una guía, para mantenerlo simple y no olvidarnos, podremos usar el mítico **admin admin**.

Antes de iniciar WSL, miramos el status para asegurarnos de que todo está ok:

```powershell
wsl --status
```

Esto nos arroja lo siguiente:

```powershell
Distribución predeterminada: Ubuntu
Versión predeterminada: 2
```

#### MySQL Workbench
Para facilidad de consultar y modificar datos, nos conviene instalar un gestor de bases de patos. Tiraremos por el clásico [MySQL Workbench](https://dev.mysql.com/downloads/workbench/). En caso de querer instalar también el server (innecesario para Docker), podremos instalar [MySQL Server](https://dev.mysql.com/downloads/mysql/), pero esto no nos hará falta al usar Docker.





Una vez lo tengamos así, lanzamos wsl, escribimos en powershell:

```powershell
wsl
```

Y vamos a entrar en una especie de espejo de todo lo que tenemos en el PC, pero listado desde Linux, mismos programas, mismos archivos, etc.
<br>
Por lo que podriamos inicar el proyecto en Desktop mísmamente. No obstante, en Windows al hacer las peticiones entre **WSL <-> Windows** Ralentiza MUCHO la carga de los archivos. **La recarga de una app de Laravel simple puede tardar incluso varios segundos**.
<br>
**¿Solución?** WSL tiene sus propias rutas de linux (/home/usuario), por tanto, es recomendable crear el proyecto en esa ruta de usuario. Es decir, estando ya dentro de WSL:

```bash
cd ~
```

*\* Una vez que terminemos con el desarrollo, es recomendable apagar WSL, para que no consuma muchos recursos, una vez fuera de WSL (en poweshell de windows) escribimos `wsl --shutdown`.*



## Creación del proyecto

Una vez situados en ~ (directorio home), creamos el proyecto de Laravel:

```bash
curl -s https://laravel.build/example-app | bash
```

La primera vez nos va a decir que no encuentra la imagen de Sail y nos tardará bastante, pero las siguientes irá más rápido. En el caso de que pida contraseña para superuser la proporcionamos para que termine de configurar los privilegios. 
<br>

## Configuración del proyecto

Al usar Docker, Laravel tiene una herramienta integrada llamada Sail, la cual nos permite interactuar con Docker de una manera muy sencilla.
<br>
Entonces la manera sería: entraríamos al directorio y lanzaríamos sail así: `./vendor/bin/sail up`. Esto nos crearía (en caso de no tener) y arracaría todos los contenedores necesarios para iniciar la aplicación (esto sería equivalente a un `php artisan serve`, pero usando docker). Es conveniente crear un alias para sail, para directamente poner `sail up`. Por tanto:

```bash
sudo nano ~/.bashrc
```

Bajamos abajo del todo y añadimos (en una nueva línea):

```bash
alias sail="./vendor/bin/sail"
```

Guardamos (ctrl + o y ctrl + x). También nos va a hacer falta refrescar ese archivo para que los cambios surtan efecto:

```bash
source ~/.bashrc
```

Podemos asegurarnos de que el alias se ha agregado correctamente con:

```bash
alias
```

Hecho esto, navegaríamos a la carpeta raíz del proyecto y lo levantaríamos con:

```bash
sail up
```

Para detener los contenedores (una vez finalicemos nuestras modificaciones y querramos chapar):

```bash
sail down
```

*\*RESUMEN: una vez dentro del WSL, entramos a nuestro proyecto, lo levantamos con `sail up`. Una vez hemos terminado la jornada de trabajo, tumbamos todos los contenedores con `sail down` o ctrl+c. Adicionalmente para que WSL no consuma recursos, en el powershell de windows (fuera de WSL) escribimos `wsl --shutdown`.*
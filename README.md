# Practicando Laravel

Necesitaremos instalar PHP, Composer, Curl, MariaDB/MySQL/SQLite, NodeJS + NPM.

## Instalaciones

### PHP
```bash
sudo apt install php-cli
```
```bash
sudo apt install php-mysql php-sqlite3 php-xml php-mbstring 
```

### MariaDB
```bash
sudo apt install mariadb-server
```

### Curl
```bash
sudo apt install curl
```

### NodeJS
```bash
sudo apt install nodejs npm
```

Es posible que se instale una versión antigua de node y npm. Para actualizarlo a la última versión se puede hacer con n.

Instalar n:
```bash
sudo npm install -g n
```

Cambiar la versión de node:
```bash
n latest
```

o

```bash
n <versión>
```

Comprobar versión:
```bash
node -v
```

### Composer
Necesario instalar composer en caso de no tenerlo, si lo tienes, ignora este paso. Instrucciones sacadas del [sitio oficial](https://getcomposer.org/download/).
<b>Recomiendo instalarlo por el sitio oficial para la última versión</b>. En caso de no estar disponible, ejecutamos los siguientes comandos (1 por 1):

```bash
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

lo movemos a /bin para que sea como un comando de linux (y poder utilizarlo como un programa instalado):

```bash
sudo mv composer.phar /usr/local/bin/composer
```

## Creando el proyecto

Creamos el proyecto con el siguiente comando:

```bash
composer create-project laravel/laravel example-app
```

Lanzamos un server en local con:

```bash
cd example-app
 
php artisan serve
```
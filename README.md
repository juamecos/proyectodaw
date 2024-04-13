# Proyecto Laravel con Breeze, Inertia y React

Este proyecto proporciona una base para desarrollar una aplicación web usando Laravel, Breeze, Inertia, y React en Ubuntu 20.04. Sigue estos pasos para configurar el entorno y poner en marcha la aplicación.

## Configuración Inicial

### Prerrequisitos

- Actualiza tu sistema: `sudo apt-get update && sudo apt-get upgrade -y`
- Instala PHP y extensiones necesarias: `sudo apt-get install php8.2 php8.2-xml php8.2-sqlite3 -y`
- Instala Composer: `curl -sS https://getcomposer.org/installer | php && sudo mv composer.phar /usr/local/bin/composer`
- Instala Node.js con NVM: `curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.1/install.sh | bash && source ~/.nvm/nvm.sh && nvm install --lts`
- Instala herramientas adicionales: `sudo snap install --classic code && sudo apt-get install curl -y`

### Configuración del Proyecto

- Crea y configura el proyecto: `mkdir ~/projects && cd ~/projects && composer create-project laravel/laravel lapisgame`
- Instala Laravel Breeze con React e Inertia: `cd lapisgame && composer require laravel/breeze --dev && php artisan breeze:install react && npm install && npm run dev`

### Base de Datos

- Prepara SQLite: `touch ~/projects/lapisgame/database/database.sqlite && echo "DB_CONNECTION=sqlite" >> ~/projects/lapisgame/.env && echo "DB_DATABASE=/ruta/absoluta/a/tu/proyecto-lapisgame/database/database.sqlite" >> ~/projects/lapisgame/.env && php artisan migrate`

### Ejecución

- Inicia el servidor de desarrollo: `php artisan serve`
- Abre `http://localhost:8000` en tu navegador para ver la aplicación.

## Licencia

Este proyecto está bajo la Licencia MIT. Consulta el archivo `LICENSE` para más detalles.

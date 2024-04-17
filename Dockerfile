# Use Ubuntu 20.04 as the base image
FROM ubuntu:20.04

# Prevent interactive prompts during package installation
ENV DEBIAN_FRONTEND=noninteractive

# Update the system and install necessary dependencies
RUN apt-get update && apt-get upgrade -y && apt-get install -y \
    curl \
    git \
    zip \
    unzip \
    vim \
    software-properties-common \
    postgresql \
    postgresql-contrib \
    postgis \
    php8.2 \
    php8.2-xml \
    php8.2-pgsql \
    php8.2-mbstring \
    php8.2-curl \
    php8.2-cli \
    php8.2-sqlite3 \
    php8.2-gd \
    php8.2-zip \
    apache2

# Install Composer for managing PHP dependencies
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install NVM and Node.js for managing Node versions
RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.1/install.sh | bash
ENV NVM_DIR /root/.nvm
RUN . "$NVM_DIR/nvm.sh" && nvm install --lts

# Copy the application source code to the container
WORKDIR /var/www/html
COPY . /var/www/html

# Install PHP dependencies via Composer
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Install Node.js dependencies and build assets (assuming you use Vite which Laravel Breeze may use)
RUN . "$NVM_DIR/nvm.sh" && npm install && npm run build

# Enable Apache mod_rewrite for clean URLs
RUN a2enmod rewrite

# Configure Apache to serve the public directory and handle requests
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf
RUN sed -i 's!/var/www/!/var/www/html/public!g' /etc/apache2/apache2.conf

# Expose port 80 for Apache and 5432 for PostgreSQL
EXPOSE 80 5432

# Command to start Apache and PostgreSQL (adjust as necessary)
CMD service postgresql start && apache2-foreground


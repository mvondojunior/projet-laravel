FROM php:8.2-cli

WORKDIR /app

# Installer dépendances système
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copier le projet
COPY . .

# Installer dépendances Laravel
RUN composer install

# Exposer port Render
EXPOSE 10000

# Lancer Laravel
CMD php artisan serve --host=0.0.0.0 --port=10000
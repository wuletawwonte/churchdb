# ChurchDB — CodeIgniter 4 (PHP 8.2 + Apache)
# Frontend: compile Tailwind v4 + daisyUI for scanned PHP views
FROM node:22-bookworm AS frontend
WORKDIR /build
COPY package.json package-lock.json ./
RUN npm ci
COPY resources ./resources
COPY app ./app
RUN mkdir -p public/assets/css \
    && npx @tailwindcss/cli -i resources/css/app.css -o public/assets/css/tailwind.css --minify

FROM php:8.2-apache-bookworm

RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    libicu-dev \
    libzip-dev \
    unzip \
    zip \
    && docker-php-ext-configure intl \
    && docker-php-ext-install -j"$(nproc)" intl mysqli pdo_mysql opcache zip \
    && rm -rf /var/lib/apt/lists/*

RUN a2enmod rewrite headers

COPY docker/apache/000-default.conf /etc/apache2/sites-available/000-default.conf

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-interaction --prefer-dist

COPY . .
COPY --from=frontend /build/public/assets/css/tailwind.css public/assets/css/tailwind.css
RUN composer dump-autoload --optimize --classmap-authoritative --no-dev \
    && chown -R www-data:www-data writable \
    && chmod -R 775 writable

ENV CI_ENVIRONMENT=production

EXPOSE 80

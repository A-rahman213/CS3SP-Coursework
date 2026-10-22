FROM php:8.4-apache

RUN docker-php-ext-install mysqli pdo_mysql

WORKDIR /var/www/html

COPY src/ /var/www/html

RUN chown -R www-data:www-data /var/www/html
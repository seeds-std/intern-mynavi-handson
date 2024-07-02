FROM php:8.1.11-apache
RUN set -eux; \
    docker-php-ext-install -j$(nproc) mysqli pdo_mysql; \
    a2enmod rewrite;

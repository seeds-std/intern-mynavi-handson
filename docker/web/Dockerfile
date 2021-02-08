FROM php:7.4.12-apache
RUN docker-php-ext-install -j$(nproc) pdo_mysql \
    && docker-php-ext-enable opcache

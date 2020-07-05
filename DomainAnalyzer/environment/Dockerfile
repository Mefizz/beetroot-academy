FROM php:7.3-apache

RUN apt update \
    && apt install -y dnsutils geoip-bin whois netbase

RUN pecl install xdebug-2.8.1 \
    && docker-php-ext-enable xdebug

COPY ./environment/php.ini $PHP_INI_DIR/php.ini
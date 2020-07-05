FROM php:7.3-apache

RUN apt update \
	&& apt install -y libicu-dev

RUN pecl install xdebug-2.8.1 \
	&& docker-php-ext-enable xdebug \
	&& a2enmod rewrite \
	&& docker-php-ext-install pdo_mysql intl

COPY ./environment/php.ini $PHP_INI_DIR/php.ini
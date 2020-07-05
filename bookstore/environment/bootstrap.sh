#!/usr/bin/env bash

apt update
apt install -y apache2
apt install -y php
apt install -y php-xdebug
apt install -y php-intl
apt install -y php-mysql
apt install -y mysql-server
a2enmod rewrite
cp /var/www/html/environment/xdebug.ini /etc/php/7.2/cli/conf.d/20-xdebug.ini
cp /var/www/html/environment/mysqld.cnf /etc/mysql/mysql.conf.d/mysqld.cnf
cp /var/www/html/environment/000-default.conf /etc/apache2/sites-available/000-default.conf

php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'e0012edf3e80b6978849f5eff0d4b4e4c79ff1609dd1e613307e16318854d24ae64f26d17af3ef0bf7cfb710ca74755a') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
chmod 777 composer.phar
cp composer.phar /usr/bin/composer
systemctl restart apache2
systemctl restart mysql
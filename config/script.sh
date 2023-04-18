#!/bin/bash

apt-get update
add-apt-repository ppa:ondrej/php

apt-get update
apt-get install -y apache2 mysql-server php8.0 php8.0-mysql

cp /var/www/html/test/config/blissim.conf /etc/apache2/sites-available/blissim.conf

a2ensite blissim.conf
a2dissite 000-default.conf
a2enmod rewrite

systemctl reload apache2

echo "create database blissim" | mysql
echo "CREATE USER 'user'@'localhost' IDENTIFIED BY 'password'" | mysql
echo "GRANT ALL PRIVILEGES ON blissim.* TO 'user'@'localhost';" | mysql
echo "flush privileges" | mysql
mysql -u user -ppassword < /var/www/html/test/config/test.sql

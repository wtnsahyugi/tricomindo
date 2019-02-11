FROM php:7.1.2-apache 
# RUN docker-php-ext-install mysqli
RUN apt-get update && \
    apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng12-dev && \
    docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ && \
    docker-php-ext-install mysqli pdo_mysql gd
RUN a2enmod rewrite


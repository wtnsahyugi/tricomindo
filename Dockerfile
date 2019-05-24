FROM php:7.1.2-apache
# RUN docker-php-ext-install mysqli
RUN printf "deb http://archive.debian.org/debian/ jessie main\ndeb-src http://archive.debian.org/debian/ jessie main\ndeb http://security.debian.org jessie/updates main\ndeb-src http://security.debian.org jessie/updates main" >/etc/apt/sources.list
RUN apt-get update && \
    apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng12-dev && \
    docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ && \
    docker-php-ext-install mysqli pdo_mysql gd

RUN curl -sSL https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && apt-get update && \
    apt-get install -y zlib1g-dev git wget \
    && docker-php-ext-install zip \
    && rm -rf /var/lib/apt/lists/*


RUN a2enmod rewrite


FROM php:8.0-apache

ARG user
ARG uid
RUN rm /bin/sh && ln -s /bin/bash /bin/sh
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    gnupg2

RUN apt-get install -y build-essential libssl-dev zlib1g-dev libpng-dev libjpeg-dev libfreetype6-dev

WORKDIR /var/www/html

RUN docker-php-ext-configure gd  \
    && docker-php-ext-install gd

RUN docker-php-ext-install pdo pdo_mysql mysqli zip

RUN usermod -u 1000 www-data

RUN a2enmod rewrite && service apache2 restart

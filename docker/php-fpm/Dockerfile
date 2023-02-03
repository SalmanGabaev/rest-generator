FROM php:8.1-fpm

RUN apt update && apt upgrade -yq && \
    apt-get install -yq curl git zip && \
    rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install mysqli pdo pdo_mysql

WORKDIR /app
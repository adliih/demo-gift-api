FROM php:7.4-fpm-alpine

RUN apk update; \
    apk add \
    libpq-dev \
    curl-dev \
    openssl-dev

RUN docker-php-ext-install sockets pdo pdo_mysql pcntl

RUN touch /dev/null

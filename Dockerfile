FROM php:7.3-fpm-alpine

RUN mkdir -p /usr/share/php-fpm \
    && apk add --update iproute2 wget gnupg netcat-openbsd git bash unzip autoconf build-base \
      icu-dev \
    && docker-php-ext-install opcache intl \
    && yes | pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && echo "xdebug.remote_enable=1" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_connect_back=0" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_host=172.17.0.1" >> /usr/local/etc/php/conf.d/xdebug.ini

RUN yes | pecl install uopz

ENV PHP_IDE_CONFIG serverName=quality
ENV XDEBUG_CONFIG idekey=PHPSTORM

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

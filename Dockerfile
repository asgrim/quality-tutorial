FROM php:7.3-fpm-alpine

RUN mkdir -p /usr/share/php-fpm \
    && apk add --update iproute2 wget gnupg netcat-openbsd git bash unzip autoconf build-base \
      icu-dev \
    && docker-php-ext-install opcache intl \
    && yes | pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_connect_back=off" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_addr_header=REMOTE_ADDR" >> /usr/local/etc/php/conf.d/xdebug.ini

RUN yes | pecl install uopz

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

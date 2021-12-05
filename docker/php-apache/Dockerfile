FROM php:8.0-apache

ARG user_uid
ARG gpoup_uid

RUN if [ "${user_uid}" != 0 ]; then usermod -u ${user_uid? invalid argument} www-data; fi
RUN if [ "${gpoup_uid}" != 0 ]; then groupmod -g ${gpoup_uid? invalid argument} www-data; fi

RUN apt update \
        && apt install -y \
            g++ \
            libicu-dev \
            libpq-dev \
            libzip-dev \
            zip \
            zlib1g-dev \
        && docker-php-ext-install \
            intl \
            opcache \
            pdo \
            pdo_pgsql \
            pgsql

WORKDIR /var/www/ealiev_ipr

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

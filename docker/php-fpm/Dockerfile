FROM php:7.1-fpm

RUN apt-get update && \
    apt-get install -y --no-install-recommends \
        curl \
        libz-dev \
        libpq-dev \
        libssl-dev \
        libmcrypt-dev

RUN docker-php-ext-install mcrypt
RUN docker-php-ext-install pdo_pgsql

ADD ./queryme.ini /usr/local/etc/php/conf.d
ADD ./queryme.pool.conf /usr/local/etc/php-fpm.d/

RUN rm -r /var/lib/apt/lists/*

RUN usermod -u 1000 www-data

WORKDIR /var/www

CMD ["php-fpm"]

EXPOSE 9000
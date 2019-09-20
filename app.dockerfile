FROM php:7.1.3-fpm
RUN apt-get update
RUN apt-get install -y libmcrypt-dev
RUN apt-get install -y mysql-client
RUN apt-get update && apt-get install -y libmcrypt-dev \
    mysql-client libmagickwand-dev --no-install-recommends \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && docker-php-ext-install mcrypt pdo_mysql
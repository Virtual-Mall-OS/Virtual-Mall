FROM php:fpm

ADD opencart.conf /usr/local/etc/php-fpm.d/opencart.conf:rw
ADD opencart.ini /usr/local/etc/php/conf.d/opencart.ini

RUN apt-get update && apt-get install -y \
	libfreetype6-dev \
	libjpeg62-turbo-dev \
	libmcrypt-dev \
	libpng-dev \
	libzip-dev \
    curl

RUN apt-get install -y libmcrypt-dev
RUN pecl install mcrypt-1.0.4 && docker-php-ext-enable mcrypt

# Install extensions using the helper script provided by the base image
RUN docker-php-ext-install \
	zip \
	pdo_mysql \
    && docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ \
	&& docker-php-ext-install -j$(nproc) gd \
	&& docker-php-ext-install mysqli

RUN usermod -u 1000 www-data

WORKDIR /usr/share/nginx/html

CMD ["php-fpm"]

EXPOSE 9000

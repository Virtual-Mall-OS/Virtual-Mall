FROM nginx:1.20.2

ARG PHP_SOCKET=php-fpm:9000

ENV WEB_PHP_SOCKET=$PHP_SOCKET

ENV WEB_DOCUMENT_ROOT=/usr/share/nginx/html

EXPOSE 80 443

WORKDIR /usr/share/nginx/html

COPY app.tar /
COPY nginx.conf /etc/nginx/nginx.conf
ADD conf.d/default.conf /etc/nginx/conf.d/default.conf
COPY default.conf /










FROM mshakirfattani/nginx-php-composer:1.0
FROM node:14.19.3 AS builder

ARG DEBIAN_FRONTEND=noninteractive
COPY package.json .

RUN npm i
WORKDIR /html 

RUN composer -V
COPY . .
RUN chmod 777 -R /html 
RUN composer install --no-interaction --prefer-dist --no-scripts 

COPY nginx-conf/nginx.conf /etc/nginx/nginx.conf
# COPY nginx-conf/default.conf /etc/nginx/conf.d/default.conf
COPY nginx-conf/fastcgi_params /etc/nginx/fastcgi_params

RUN sed 's/www-data/nginx/' /etc/php/8.1/fpm/pool.d/www.conf > /etc/php/8.1/fpm/pool.d/nginx.conf
RUN rm /etc/php/8.1/fpm/pool.d/www.conf
RUN mkdir /run/php

RUN rm -rf /html/nginx-conf

EXPOSE 80

STOPSIGNAL SIGQUIT

CMD ["./run.sh"]
# CMD ["php-fpm"]
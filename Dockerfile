FROM node:19.0-alpine AS builder
WORKDIR /src
LABEL builder=true

COPY package.json .
RUN npm i

FROM mshakirfattani/nginx-php-composer:1.0
ARG DEBIAN_FRONTEND=noninteractive
WORKDIR /html 

COPY . .

RUN composer install --no-interaction --prefer-dist --no-scripts 
RUN php artisan optimize:clear
COPY nginx-conf/nginx.conf /etc/nginx/nginx.conf
COPY nginx-conf/fastcgi_params /etc/nginx/fastcgi_params
COPY nginx-conf/php-8.1.ini /etc/php/8.1/fpm/php.ini
RUN sed 's/www-data/nginx/' /etc/php/8.1/fpm/pool.d/www.conf > /etc/php/8.1/fpm/pool.d/nginx.conf
RUN rm /etc/php/8.1/fpm/pool.d/www.conf

RUN rm -rf /html/nginx-conf
RUN mkdir /run/php
RUN chmod 777 -R /html
COPY --from=builder /src/node_modules /html/node_modules

EXPOSE 80

STOPSIGNAL SIGQUIT

CMD ["./run.sh"]
# CMD ["php-fpm"]
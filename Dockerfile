FROM node:19.0-alpine AS builder
WORKDIR /src
LABEL builder=true

COPY package.json .
RUN npm i

FROM mshakirfattani/nginx-php-composer:1.0
ARG DEBIAN_FRONTEND=noninteractive
WORKDIR /html 

COPY . .

COPY nginx-conf/nginx.conf /etc/nginx/nginx.conf
COPY nginx-conf/fastcgi_params /etc/nginx/fastcgi_params
COPY nginx-conf/php-8.1.ini /etc/php/8.1/fpm/php.ini
RUN sed 's/www-data/nginx/' /etc/php/8.1/fpm/pool.d/www.conf > /etc/php/8.1/fpm/pool.d/nginx.conf
RUN rm /etc/php/8.1/fpm/pool.d/www.conf

RUN rm -rf /html/nginx-conf
RUN mkdir /run/php
RUN chmod 777 -R /html

RUN composer install --no-interaction --prefer-dist --no-scripts 
# --no-dev -o
RUN php artisan migrate --path=database/migrations/production --force
RUN php artisan db:seed --force

RUN php artisan event:clear
# RUN php artisan route:clear
RUN php artisan config:clear
RUN php artisan view:clear
RUN php artisan optimize:clear


# RUN php artisan route:cache
# RUN php artisan config:cache
# RUN php artisan event:cache
# RUN php artisan view:cache
# RUN php artisan optimize

RUN echo "#!/bin/bash" > ./run-with-env.sh
RUN echo " " > ./run-with-env.sh
RUN grep "\S" env-dev.txt | awk '{print "export "$0}' >> ./run-with-env.sh
# RUN sh ./temp.sh
RUN echo " " >> ./run-with-env.sh
RUN cat ./run.sh >> ./run-with-env.sh
RUN echo " " >> ./run-with-env.sh

RUN chmod a+x ./run-with-env.sh
RUN rm -rf tests
COPY --from=builder /src/node_modules /html/node_modules

EXPOSE 80

STOPSIGNAL SIGQUIT

# CMD ["./run.sh"]
CMD ["./run-with-env.sh"]
# CMD ["php-fpm"]
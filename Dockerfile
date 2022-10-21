FROM nginx:1.23.1

ARG DEBIAN_FRONTEND=noninteractive

WORKDIR /html 

RUN apt update
RUN apt upgrade -y

RUN apt install -y software-properties-common gpg apt-transport-https lsb-release ca-certificates curl locales wget
RUN wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg
RUN echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list
# RUN locale -a

# RUN locale-gen en_US.UTF-8
# RUN locale -a
# RUN apt install -y aptitude php-symfony-polyfill-php81 php-cli
# RUN add-apt-repository ppa:ondrej/php -y
RUN apt update

RUN apt install -y php8.1 php8.1-fpm php8.1-cli php8.1-common php8.1-mysql php8.1-xml php8.1-xmlrpc php8.1-curl php8.1-gd php8.1-imagick php8.1-cli php8.1-dev php8.1-imap php8.1-mbstring php8.1-opcache php8.1-soap php8.1-zip php8.1-redis php8.1-intl
# RUN apt install -y php8.1-fpm
# RUN rm -rf nginx-conf
RUN wget -O composer-setup.php https://getcomposer.org/installer
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN rm composer-setup.php

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
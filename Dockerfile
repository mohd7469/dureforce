FROM nginx:1.23.1-alpine

RUN apt update

COPY nginx-conf/nginx.conf /etc/nginx/nginx.conf
COPY nginx-conf/fastcgi_params /etc/nginx/fastcgi_params

COPY . /usr/share/nginx/html

RUN rm -rf /usr/share/nginx/html/nginx-conf

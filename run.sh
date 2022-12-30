sh /html/load-env.sh
/usr/sbin/php-fpm8.1 --nodaemonize --fpm-config /etc/php/8.1/fpm/php-fpm.conf &
nginx -g "daemon off;"
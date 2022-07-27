<?php
server {
    listen 80 default_server;
    listen [::]:80 default_server;
    
    root  /public;
    
    index index.php index.html index.htm index.nginx-debian.html;
    
    server_name _;
    
    location / {
    try_files $uri $uri/ =404;
    }
    
    location ~ \.php$ {
    include snippets/fastcgi-php.conf;
    
    # With php-fpm (or other unix sockets);
    fastcgi_pass unix:/var/run/php/php7.2-fpm.sock;
    # With php-fpm (or other unix sockets);
    $uri = urldecode(
        parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
    );
    
    // This file allows us to emulate Apache's "mod_rewrite" functionality from the
    // built-in PHP web server. This provides a convenient way to test a Laravel
    // application without having installed a "real" web server software here.
    if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {
        return false;
    }
    
    require_once __DIR__.'/public/index.php';
    }
    }
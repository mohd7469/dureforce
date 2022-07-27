<?php
server {
    listen 80 default_server;
    listen [::]:80 default_server;
    
    root  /wwwroot/public/;
    
    index index.php index.html index.htm index.nginx-debian.html;
     
    server_name _; 

    location / {
        try_files $uri $uri/ /index.php$is_args$args;
   }

   # pass the PHP scripts to FastCGI server listening on /var/run/php5-fpm.sock
   location ~ \.php$ {
           try_files $uri /index.php =404;
           fastcgi_pass unix:/var/run/php8-fpm.sock;
           fastcgi_index index.php;
           fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
           include fastcgi_params;
   }
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
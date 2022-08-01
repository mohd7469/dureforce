echo "Replacing nginx configuration for serving PHP 8.0-based applications" 
cp /home/site/deployments/azure-app-service/nginx.config /etc/nginx/sites-available/default
echo "reload nginx" 
service nginx reload
echo "Php artisan key generate"
php artisan key:generate --ansi
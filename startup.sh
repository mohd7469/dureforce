#!/bin/bash

echo "Replacing nginx configuration for serving PHP 8.0-based applications"
cp /home/site/deployments/azure-app-service/nginx.config /etc/nginx/sites-available/default
echo "Reloading nginx to apply new configuration"
nginx -s reload 

ASSETS_FOLDER="/home/site/wwwroot/assets"

if [ -h $ASSETS_FOLDER ] && [ -d $ASSETS_FOLDER ]
then
	echo "assets folder is link"
	ls -al $ASSETS_FOLDER
else
	echo "assets folder is not a link"
	mkdir -p /home/site/deployments/assets-record
	cp -R $ASSETS_FOLDER /home/site/deployments/assets-record/.
	rm -rf $ASSETS_FOLDER
	ln -s /home/site/deployments/assets-record $ASSETS_FOLDER
fi
# cd /home/site/wwwroot
echo "Php artisan key generate"
php artisan key:generate --ansi


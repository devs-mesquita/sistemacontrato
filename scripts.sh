#!/bin/bash
while [ true ]
do
  php /var/www/html/artisan schedule:run --verbose --no-interaction &
  sleep 300
done &\
# php artisan key:generate && \
php artisan config:cache &&\
php artisan route:cache &&\
php artisan migrate --force && \
# php artisan db:seed --force && \
apache2ctl -D FOREGROUND

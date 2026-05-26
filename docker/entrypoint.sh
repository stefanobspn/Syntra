#!/bin/sh
set -e

cd /var/www/html

mkdir -p storage/app storage/framework/cache storage/framework/sessions storage/framework/views storage/logs database bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache database

if [ -z "${APP_KEY:-}" ]; then
    if [ -f storage/app/.app_key ]; then
        export APP_KEY="$(cat storage/app/.app_key)"
    else
        export APP_KEY="$(php artisan key:generate --show)"
        printf '%s' "$APP_KEY" > storage/app/.app_key
        chown www-data:www-data storage/app/.app_key
    fi
fi

if [ ! -f database/database.sqlite ]; then
    touch database/database.sqlite
fi

chown www-data:www-data database/database.sqlite

php artisan migrate --force --no-interaction
php artisan db:seed --force --no-interaction

php artisan storage:link --force >/dev/null 2>&1 || true

exec apache2-foreground
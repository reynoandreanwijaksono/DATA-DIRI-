#!/bin/sh
set -e

# Render assigns a dynamic port via the PORT environment variable
PORT="${PORT:-80}"
echo "Configuring Nginx to listen on port ${PORT}..."
sed -i "s/listen 80;/listen ${PORT};/g" /etc/nginx/http.d/default.conf

# Ensure storage link exists
php artisan storage:link || true

# Run migrations if database is configured
if [ -n "$DB_HOST" ] && [ -n "$DB_DATABASE" ]; then
    echo "Running database migrations..."
    php artisan migrate --force || echo "Warning: Migration failed, continuing..."

    if [ "$SEED_DATABASE" = "true" ] || [ "$RUN_SEEDER" = "true" ]; then
        echo "Running database seeder..."
        php artisan db:seed --force || echo "Warning: Seeding failed, continuing..."
    fi
fi

# Cache configuration, routes, and views
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

echo "Starting PHP-FPM..."
php-fpm -D

echo "Starting Nginx on port ${PORT}..."
exec nginx -g "daemon off;"

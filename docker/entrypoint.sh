#!/bin/sh
set -e

# Railway provides dynamic PORT (defaults to 80 if not set)
PORT="${PORT:-80}"
echo "Configuring Nginx to listen on port ${PORT}..."
sed -i "s/\${PORT}/${PORT}/g" /etc/nginx/http.d/default.conf

# Ensure essential Laravel directories exist
mkdir -p /var/www/html/storage/framework/cache/data \
         /var/www/html/storage/framework/sessions \
         /var/www/html/storage/framework/views \
         /var/www/html/storage/logs \
         /var/www/html/storage/app/public \
         /var/www/html/bootstrap/cache

# Fix ownership and permissions for runtime
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Create storage symlink if it doesn't already exist
if [ ! -L /var/www/html/public/storage ]; then
    echo "Creating storage symlink..."
    php artisan storage:link || true
fi

# Run database migrations if RUN_MIGRATIONS is set to true
if [ "$RUN_MIGRATIONS" = "true" ]; then
    echo "Running database migrations..."
    php artisan migrate --force || echo "Warning: Migration failed, continuing startup..."
fi

# Cache optimization for production
if [ "$APP_ENV" = "production" ]; then
    echo "Clearing and preparing Laravel application cache..."
    php artisan config:clear
    php artisan route:clear
    php artisan view:clear
    php artisan package:discover --ansi
fi

echo "Starting supervisor..."
exec "$@"

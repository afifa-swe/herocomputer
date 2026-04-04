#!/bin/bash
set -e

cd /var/www

# Fix Render DATABASE_URL: postgres:// -> pgsql:// for Laravel
if [ -n "$DATABASE_URL" ]; then
    export DATABASE_URL=$(echo "$DATABASE_URL" | sed 's|^postgres://|pgsql://|')
fi

# Create required storage directories
mkdir -p storage/logs storage/framework/{cache,sessions,views} bootstrap/cache
chmod -R 775 storage bootstrap/cache

# Cache config and routes
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Run migrations
php artisan migrate --force

# Storage link
php artisan storage:link --force 2>/dev/null || true

# Start server
exec php artisan serve --host=0.0.0.0 --port=10000

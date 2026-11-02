#!/bin/sh
set -e

# Runtime environment setup for Render
if [ -z "$APP_URL" ] && [ -n "$RENDER_EXTERNAL_URL" ]; then
    export APP_URL="$RENDER_EXTERNAL_URL"
fi

# Refresh the package manifest based on the packages actually installed
php artisan package:discover

# Make sure the SQLite database exists (fresh deploys)
touch database/database.sqlite

# Run migrations
php artisan migrate --force

# Cache config AFTER all env vars are available
php artisan config:cache

# Start the web server on the port Render expects
exec php artisan serve --host=0.0.0.0 --port="${PORT:-8000}"

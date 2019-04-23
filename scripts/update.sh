#!/usr/bin/env bash

if [[ $# -ne 1 ]]; then
    echo "Usage: bash scripts/update.sh GIT"
    echo ""
    echo "Arguments:"
    echo "  GIT - name of the branch or tag to checkout."
    exit 1
fi

if ! [[ -d ./.git ]]; then
    echo "'.git' directory not foumd."
    exit 1
fi

if ! [[ -f ./artisan ]]; then
    echo "'artisan' not found."
    exit 1
fi

for cmd in git npm composer; do
    if ! [[ -x $(command -v $cmd) ]]; then
        echo "Command '"$cmd"' is missing."
        exit 1
    fi
done

# Turn on maintenance mode
php artisan down

# Checkout requested version
git checkout $1

# Update and install back-end dependencies
composer install --no-dev

# Update, install and compile front-end assets
npm install
npm run production

# Migrate the database.
# --force forces the migrations to run in production.
php artisan migrate --force

# Dump optimized autoloader
composer dump-autoload --optimize

# Compile and cache Laravel's files
php artisan view:cache
php artisan route:cache
php artisan config:cache

# Turn off maintenance mode
php artisan up

#!/usr/bin/env bash
# Microweber installation script
set -euo pipefail

echo "Starting Microweber installation..."

# Require root so we can install packages and write to the app folder
if [ "$(id -u)" -ne 0 ]; then
    echo "This script must be run as root. Please use sudo."
    exit 1
fi

# Check if php83 is available
if ! command -v php83 >/dev/null 2>&1; then
    echo "php83 command not found. Installing Bolt PHP 8.3..."
    yum install -y php83
fi

# Install Microweber
APP_FOLDER=/usr/local/bolt/apps/microweber/app/mw-plugin

mkdir -p "$APP_FOLDER"

# Download composer.phar
if command -v curl >/dev/null 2>&1; then
    curl -fsSL https://getcomposer.org/download/latest-stable/composer.phar -o "$APP_FOLDER/composer.phar"
else
    wget -q https://getcomposer.org/download/latest-stable/composer.phar -O "$APP_FOLDER/composer.phar"
fi

COMPOSER_ALLOW_SUPERUSER=1 php83 "$APP_FOLDER/composer.phar" install --no-interaction --working-dir="$APP_FOLDER" --ignore-platform-req=ext-intl --ignore-platform-req=ext-zip

cp "$APP_FOLDER/.env.example" "$APP_FOLDER/.env"

echo "Setting up environment variables..."
php83 "$APP_FOLDER/artisan" key:generate

echo "Configuring database connection..."
php83 "$APP_FOLDER/artisan" migrate --force

echo "Seeding the database..."
php83 "$APP_FOLDER/artisan" db:seed --force

echo "Downloading Microweber CMS..."
php83 "$APP_FOLDER/artisan" microweber:download

echo "Installation successful!"
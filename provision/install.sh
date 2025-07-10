# microweber Installation Script

echo "Starting microweber installation..."

# Check if the script is run as root
if [ "$(id -u)" -ne 0 ]; then
    echo "This script must be run as root. Please use sudo."
    exit 1
fi

# Install microweber
cd /usr/local/bolt/plugins/microweber/app/mw-plugin

sudo wget https://getcomposer.org/download/latest-stable/composer.phar
sudo COMPOSER_ALLOW_SUPERUSER=1 bolt-php composer.phar install

cp .env.example .env

bolt-php artisan key:generate
bolt-php artisan migrate --force
bolt-php artisan db:seed --force

echo "Installation successful!"
# microweber Installation Script

echo "Starting microweber installation..."

# Check if the script is run as root
if [ "$(id -u)" -ne 0 ]; then
    echo "This script must be run as root. Please use sudo."
    exit 1
fi

# Check if php83 is available
if ! command -v php83 &> /dev/null; then
    echo "php83 command not found. Installing Bolt PHP 8.3..."
    yum install -y php83
fi

# Install microweber
cd /usr/local/bolt/plugins/microweber/app/mw-plugin

sudo wget https://getcomposer.org/download/latest-stable/composer.phar
sudo COMPOSER_ALLOW_SUPERUSER=1 php83 composer.phar install

cp .env.example .env

echo "Setting up environment variables..."
php83 artisan key:generate

echo "Configuring database connection..."
php83 artisan migrate --force

echo "Seeding the database..."
php83 artisan db:seed --force

echo "Downloading Microweber CMS..."
php83 artisan microweber:download

echo "Installation successful!"
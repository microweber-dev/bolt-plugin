# microweber Uninstallation Script

echo "Starting microweber uninstallation..."

# Check if the script is run as root
if [ "$(id -u)" -ne 0 ]; then
    echo "This script must be run as root. Please use sudo."
    exit 1
fi

# Remove BoltStarter directory
#if [ -d "/usr/local/bolt/plugins/microweber" ]; then
#    rm -rf /usr/local/bolt/plugins/microweber
#    echo "BoltStarter directory removed."
#else
#    echo "BoltStarter directory not found."
#fi

rm -rf /usr/local/bolt/plugins/microweber/app/mw-plugin/vendor
rm -rf /usr/local/bolt/plugins/microweber/app/mw-plugin/composer.lock
rm -rf /usr/local/bolt/plugins/microweber/app/mw-plugin/database/database.sqlite
#!/bin/bash
if [[ ! -f .env ]]; then
    echo -e "\nYou must to create a .env file with a correct enviroment data configured, you have a .env.example to know the configuration structure\n"
    exit 1
fi

if [[ $(which composer) == "" ]]; then
    echo -e "\nYou must to be installed composer. Instructions:\n"
    echo -e "curl -sS https://getcomposer.org/installer | php\n"
    echo -e "sudo mv composer.phar /usr/local/bin/composer\n"
    exit 1
fi

echo "Installing dependences..."
composer install

echo "Fixing storage folder perms..."
chmod -R 775 storage

echo "Fixing bootstrap/cache folder perms..."
chmod -R 775 bootstrap/cache/

echo "Generating laravel key..."
php artisan key:generate

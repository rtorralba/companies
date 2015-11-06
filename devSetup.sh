#!/bin/bash
if which composer >/dev/null; then
    echo "Installing dependences..."
    composer install

    echo "Fixing storage folder perms..."
    chmod -R 775 storage

    echo "Fixing bootstrap/cache folder perms..."
    chmod -R 775 bootstrap/cache/

    echo "Fixing generating laravel key..."
    php artisan key:generate
else
    echo -e "\nYou must to be installed composer. Instructions:\n"
    echo -e "curl -sS https://getcomposer.org/installer | php\n"
    echo -e "sudo mv composer.phar /usr/local/bin/composer\n"
fi

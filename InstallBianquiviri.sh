#!/usr/bin/env bash
#git checkout dev ;
rm -rf vendor;
composer install;
cp .env.example .env;
./vendor/bin/sail up -d;
./vendor/bin/sail php artisan key:generate;
./vendor/bin/sail php artisan migrate:reset;
./vendor/bin/sail php artisan migrate;



#./vendor/bin/sail php artisan test;

python -mwebbrowser -n http://127.0.0.1/api/newgame
#php artisan dump-autoload ;


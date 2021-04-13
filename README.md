
## Acerca de kat-app

Para ejecutar  el sistema se debe tener instalado docker,bash el usuario debe estar autorizado para 
poder ejecutar docker, ademas se debe tener Composer , php todo lo  que se exije en la 
documentacion de Laravel 8 para poder ejecutarlo el sisema fue credo usado laravel Sail.

## Instalacion 

Despues que se clona el proyecto se debe ejecutar se debe ejecutar el siguiente bash
./InstallBianquiviri.sh
Se escript  se encargar de ejecutar los siguientes comandos

rm -rf vendor

composer install

cp .env.example .env

./vendor/bin/sail up -d

./vendor/bin/sail php artisan key:generate

./vendor/bin/sail php artisan migrate:reset

./vendor/bin/sail php artisan migrate

python -mwebbrowser -n http://127.0.0.1/api/newgame

# Rutas
Cuenta con las siguiente rutas (todas las peticiones son generas por get)
- http://127.0.0.1/api/newgame   Genera un nuevo juego 
- http://127.0.0.1/api/games     Muestra los juegos
- http://127.0.0.1/api/game/{idgame}/cards    Muestras a cartas del juegos
- http://127.0.0.1/ api/game/{idgame}/card/{id}      Muestra el detalle de la carta

#Notas 
    El sistema usa como manejador de base datos postgresql, el instaldor fue testeado Linux 
    OpenSuse tumbleweed
## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

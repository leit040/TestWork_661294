For deploy
1) docker-compose up -d
2) composer install
3) docker-compose exec  lib-php-fpm2  php  artisan migrate --seed
--------
http://localhost:8087 - OpenAPi docs (For example)


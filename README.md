<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

Возможно потребуется переписать в [Makefile](..%2FMakefile) с "docker-compose на  docker compose"

## Steps:

### Step 0
cp .env.example .env

### Step 1
make init

### Step 2 
make revive-node

### Step 3
Repeat "Step 1" 

### Step 4
php artisan key:generate

### Step 5
sudo chown -R www-data:www-data ./app/storage

### Step 5
sudo chown -R www-data:www-data ./app/storage

### Step 6
docker compose run --rm wh-php-cli php artisan centrifuge:install 

созданные в .env константы указать  в [config.json](docker%2Fcentrifugo%2Fconfig.json) 

[//]: # (TODO надо както придумать как их туда прокинуть)
__________________________________________________

## Command

### Down
make docker-down-clear

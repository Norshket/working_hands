init: docker-down-clear docker-pull docker-build docker-up wh-init

revive-node:
	docker compose run --rm wh-node npm install

php-bash:
	docker compose run --rm wh-php-cli bash
node-bash:
	docker compose exec wh-node bash



docker-up:
	docker compose up -d

docker-build:
	docker compose up -d

docker-down-clear:
	docker compose down -v --remove-orphans
docker-pull:
	 docker compose pull
docker-down:
	docker compose down

#--------------------------------------------------------------------

wh-init: wh-composer-install wh-npm-install wh-wait-db wh-generate-key wh-migration  wh-seed

wh-composer-install:
	docker compose run --rm wh-php-cli composer install

wh-wait-db:
	until docker compose exec -T wh-postgres pg_isready --timeout=0 --dbname=app ; do sleep ; done

wh-migration:
	docker compose run --rm wh-php-cli php artisan migrate

wh-generate-key:
	docker compose run --rm wh-php-cli php artisan key:generate

wh-seed:
	docker compose run --rm wh-php-cli php artisan db:seed

wh-npm-install:
	docker compose exec wh-node npm install


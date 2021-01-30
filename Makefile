build:
	docker-compose build

b-php:
	docker-compose up -d --no-deps --build php

b-mysql:
	docker-compose up -d --no-deps --build mysql

b-nginx:
	docker-compose up -d --no-deps --build nginx

up:
	docker-compose up -d

stop:
	docker-compose stop;

down:
	docker-compose down;

restart: stop up

sh-php:
	docker exec -it blog_php /bin/sh

sh-mysql:
	docker exec -it blog_mysql /bin/sh

sh-nginx:
	docker exec -it blog_nginx /bin/sh

behat:
	APP_ENV=test vendor/bin/behat --strict --tags="~@javascript"

.PHONY: all

build:
	docker-compose build --build-arg user_uid=$$(id -u) --build-arg gpoup_uid=$$(id -g)

up:
	docker-compose up -d

down:
	docker-compose down

bash:
	docker-compose exec -u www-data php-apache /bin/bash

du: memory
	docker-compose up -d

dd:
	docker-compose down

db: memory
	docker-compose up --build -d

de:
	docker exec -it topshiriq-php sh

test:
	docker-compose exec php-cli vendor/bin/phpunit

memory:
	sudo sysctl -w vm.max_map_count=262144

perm:
	sudo chown ${USER} console/migrations -R

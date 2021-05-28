du: memory
	docker-compose up -d

dd:
	docker-compose down

db: memory
	docker-compose up --build -d

de:
	docker exec -it topshiriq-php sh

memory:
	sudo sysctl -w vm.max_map_count=262144

#Variables______________________________________________________________________________________________________________
APP_CONTAINER_NAME = "api-generator.app"

#Docker_________________________________________________________________________________________________________________
first-start:
	make up && make install

up:
	docker-compose up -d --build

down:
	docker-compose down

#Composer_______________________________________________________________________________________________________________
install:
	docker exec -it ${APP_CONTAINER_NAME} php composer.phar install

update:
	docker exec -it ${APP_CONTAINER_NAME} php composer.phar update

require:
	docker exec -it ${APP_CONTAINER_NAME} php composer.phar require ${name}
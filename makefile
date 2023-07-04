install:
	- docker-compose run php cp .env.example .env
	- docker-compose run php composer install
	- docker-compose run php artisan config:cache
	- docker-compose run php artisan migrate
	- docker-compose run php artisan db:seed
	- docker-compose run php artisan vietnamzone:import

deploy:
	- docker-compose run php artisan down
	- git pull
	- docker-compose run php composer install
	- docker-compose run php artisan migrate
	- docker-compose run php artisan up

# Initial setup & Requirements
- Docker & Docker compose installed

## Installing dependencies

Run command to install laravel dependencies
```
docker-composer run php-cli composer install
```
make sure to copy ``/api/.env.example`` and create ``.env`` variation in folder ``api``

make sure to copy ``/vue/.env.example`` and create ``.env`` variation in folder ``vue``

## Start application

``docker-compose up``

## Run migrations

```
docker-compose run php-cli php artisan migrate
```

## Browse applications:

http://localhost -> API
http://localhost:5731 -> VUE app
http://localhost:8001 -> PHPMyAdmin




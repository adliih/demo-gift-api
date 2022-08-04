# Demo Gift API
Written in Laravel

## Requirement
- Docker

## Commands
### Run Services
Run all service include database
```sh
docker-compose up -d
```

### `.env` for Database Configuration
If you are running the application fully with it's docker database, you need to replace the .env for the following:
```env
DB_CONNECTION=mysql
DB_HOST=database # Follow docker container name
DB_PORT=3306
DB_DATABASE=laravel # Created by docker initialitation script
DB_USERNAME=laravel # Created and granted by docker initialitation script 
DB_PASSWORD=laravel # Created and granted by docker initialitation script 
```


### Artisan
Use docker exec to run artisan as a container
```sh
docker-compose exec webapp php artisan tinker
```

### Run Migration
```sh
docker-compose exec webapp php artisan migrate
```

### Reset database
This will wipe all database tables, re-run the migrations, and seeding the data
```sh
docker-compose exec webapp php artisan db:wipe && php artisan migrate &&  php artisan d
b:seed
```

## API Collection
The collection are generated using [Insomnia](https://insomnia.rest/)

Please see [Insomnia.yaml](Insomnia.yaml) file  and export them.
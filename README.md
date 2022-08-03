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

### Artisan
Use docker exec to run artisan as a container
```sh
docker-compose exec webapp php artisan tinker
```

### Run Migration
```sh
docker-compose exec webapp php artisan migrate
```

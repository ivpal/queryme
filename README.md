## Queryme

Queryme is a Q&A social network.

## Run
```bash
cd docker/
docker-compose -f docker-compose.dev.yml up -d
docker-compose -f docker-compose.dev.yml exec -u docker qm_workspace bash
composer install
cp .env.example .env
npm i
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan passport:install
```

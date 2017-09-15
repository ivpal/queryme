## Queryme

Queryme is a Q&A social network.

## Run
```bash
cd docker/
docker-compose -f docker-compose.dev.yml up -d
docker-compose -f docker-compose.dev.yml exec -u docker qm_workspace bash
composer install
cp .env.example .env
php artisan key:generate
npm i
php artisan migrate
```

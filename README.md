## Queryme

Queryme is a Q&A social network.

## Run
```bash
cd docker/
docker-compose -f docker-compose.local.yml up -d
docker-compose -f docker-compose.local.yml exec --user=docker qm_workspace bash
cp .env.example .env
php artisan key:generate
```

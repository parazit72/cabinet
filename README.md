### Get Up And Running On Your Local:

    docker compose build
    docker compose run --rm gtm-app sh -c "composer install"
    docker compose run --rm gtm-app sh -c "php artisan key:generate"
    docker compose run --rm gtm-app sh -c "php artisan vendor:publish --force --tag=mehr-panel"
    docker compose run --rm gtm-app sh -c "php artisan vendor:publish --tag=mehr-panel-customize"
    docker compose run --rm gtm-node sh -c "npm install"
    docker compose run --rm gtm-app sh -c "php artisan migrate:fresh --seed"
    docker compose run --rm gtm-app sh -c "php artisan db:seed"
    docker compose run --rm gtm-app sh -c "php artisan storage:link"
    docker compose run --rm gtm-node sh -c "npm run prod"
    docker compose up --build -d

### Running Migrations On Server

    docker compose -f "docker-compose.prod.yml" run --rm gtm-app sh -c "php artisan migrate"
    docker compose -f "docker-compose.prod.yml" run --rm gtm-app sh -c "php artisan db:seed"

### Other

    docker compose run --rm gtm-app sh -c "composer require tir/crud"
    docker compose run --rm gtm-app sh -c "composer require tir/mehr-panel"
    docker compose run --rm gtm-app sh -c "php artisan vendor:publish --force --tag=mehr-panel"

## for update panel

    docker compose run --rm gtm-app sh -c "composer require tir/mehr-panel v3.3-beta"
    docker compose run --rm gtm-app sh -c "php artisan vendor:publish --force --tag=mehr-panel"

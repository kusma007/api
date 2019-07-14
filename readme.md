## CRUD app API based on Laravel for AngularJS app

1) Download repository with console command - git clone git@github.com:kusma007/api.git
2) Go to app repository - cd api
3) Install library - composer install
4) Copy app config - cp .env.example .env
5) Create db and change database access in file ".env"
6) Apply migrations - php artisan migrate
7) Add access to next folders:
 - storage/logs/
 - storage/framework/cache/data/
8) start testing - phpunit


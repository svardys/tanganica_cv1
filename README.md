# tanganica_cv1
1, composer install
2, v .env upravit připojení do DB
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=db_name
    DB_USERNAME=db_user
    DB_PASSWORD=db_password
3, php artisan migrate:refresh
4, Spustit server příkazem : php artisan serve

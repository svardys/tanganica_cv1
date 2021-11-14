# tanganica_cv1
1, composer install<br>
2, v .env upravit připojení do DB<br>
    DB_CONNECTION=mysql<br>
    DB_HOST=127.0.0.1<br>
    DB_PORT=3306<br>
    DB_DATABASE=db_name<br>
    DB_USERNAME=db_user<br>
    DB_PASSWORD=db_password<br>
3, php artisan migrate:refresh<br>
4, Spustit server příkazem : php artisan serve<br>

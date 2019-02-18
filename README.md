# Project set-up

1. Run “composer install“ to install all php dependencies
2. Create a database for the project on the local mysql server.
3. Create a “.env” file in the project root. Copy the contents of “.env.example” into the newly created “.env”.
4. In the “.env” file, enter your values for DB_DATABASE, DB_USERNAME and DB_PASSWORD.
5. Run “php artisan key:generate” to generate application encryption key
6. Run “php artisan migrate” to set up database structure
7. Run “npm i” to install node dependencies
8. Run “npm run production“ to compile front end assets
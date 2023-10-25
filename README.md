php artisan migrate --seed
php artisan migrate:refresh --seed

 -- Run either composer install or composer update (if necessary).
 -- Use the command php artisan migrate to create the database and tables.
 -- Create an Admin User with the command php artisan db:seed (by setting up a seeder for the admin user).
 -- Finally, launch the application with php artisan serve.

<!-- for sending emails run the queue commands -->
php artisan queue:work
## Requirements

-   PHP 8.0^
-   MySQL
-   Composer

## Installation

1. Clone this repository
2. Open repository
3. Run `composer install && npm i`
4. Run `php artisan key:generate`
5. Start your local mysql server
6. Run `php artisan migrate`
7. Run `php artisan db:seed`
8. Open two terminals in project root
9. Run in first terminal `php artisan serve`
10. Run in second terminal `npm run dev`
11. Visit `yourappurl/register` and create user
12. Enjoy

## FOR API ROUTE

1. You need to pass authorization key to your request header, key can be found in .env file

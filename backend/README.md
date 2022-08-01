<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Environment

-   MariaDB: 10.4.18
-   PHP 7.4.16
-   Laravel 9
-   Composer

## Local Setup:

-   Create a single database for the backend application. (I use Xampp to install the DB)
-   In the laravel root (/backend) folder, run "composer install" to retrieve all the dependencies/modules that laravel uses.
-   Copy and paste the .env.example file and rename it to .env
-   Add your database name, username and password credentials to the .env file.
-   Run the command "php artisan key:generate" to generate a key used by laravel for cryptography.
-   Run the commands "php artisan migrate" to populate the tables & data of the database.
-   Run "php artisan serve" to start

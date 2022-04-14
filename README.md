<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Installation
### Install Composer
Laravel utilizes Composer to manage its dependencies. First, download a copy of the composer.phar. Once you have the PHAR archive, you can either keep it in your local project directory or move to usr/local/bin to use it globally on your system. On Windows, you can use the [Composer Windows installer](https://getcomposer.org/Composer-Setup.exe).

### Install Laravel
#### Via Laravel Installer
First, download the Laravel installer using Composer.
```
composer global require "laravel/installer=~1.1"
```
Make sure to place the `~/.composer/vendor/bin directory` in your `PATH` so the laravel executable is found when you run the laravel command in your terminal.

#### Via Composer Create-Project
You may also install Laravel by issuing the Composer `create-project` command in your terminal:
```
composer create-project laravel/laravel {directory} 4.2 --prefer-dist
```
## Setup the project
Clone the git repository, then `cd` into the folder's project. Run `composer install`.
>
Copy `.env.example` file to `.env` on the root folder. 
>
Open your `.env` file and change the database name (`DB_DATABASE`) to your empty database, username (`DB_USERNAME`) and password (`DB_PASSWORD`) field correspond to your configuration.
>
Run `npm install` for installing the NPM dependencies.
>
After modifying the `.env` file correctly, run `php artisan migrate` for creating the db with all the tables.
>
Run the following commands for seeding the database:
>
* `php artisan db:seed ClassesSeeder`
* `php artisan db:seed SubjectSeeder`
* `php artisan db:seed DatabaseSeeder`
* `php artisan db:seed StudentsSeeder`
* `php artisan db:seed ProfessorsSeeder`
* `php artisan db:seed TeachingSeeder`
* `php artisan db:seed AbsencesSeeder`
* `php artisan db:seed GradesSeeder`

## Run the project
Use the `php artisan serve` command, then go to `http://localhost:8000/`.

## Database Informations
The "highschool" database has 7 tables, with foreign keys, described in the next image:
![db](https://user-images.githubusercontent.com/60388013/163412137-0321afa4-27f7-40a4-8ab2-8801b32f7697.PNG)

There is the `users table` too, which has `name`, `email`, `password` and `isAdmin` fields. `isAdmin` has the value `1` if the user is an admin, and `0` if the user is a student or a normal user.
>
Every created student has an account, and the email is made of the string `student` + `registration_number` + `@gmail.com`, password being a string formed with `student` + `registration_number` (assuming that registration number is private). 

## API




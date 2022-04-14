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
>
![db](https://user-images.githubusercontent.com/60388013/163412137-0321afa4-27f7-40a4-8ab2-8801b32f7697.PNG)

There is the `users table` too, which has `name`, `email`, `password` and `isAdmin` fields. `isAdmin` has the value `1` if the user is an admin, and `0` if the user is a student or a normal user.
>
Every created student has an account, and the email is made of the string `student` + `registration_number` + `@gmail.com`, password being a string formed with `student` + `registration_number` (assuming that registration number is private). 

## API
There are `models` for every created table, such as:
* `Absence`
*  `ClassStud`
*  `Grade` 
*  `Professor`
*  `Student`
*  `Subject`
*  `Teaching`
*  `User`.
>
In these models, we have attributes to the $fillable field so that we can use them in our requests.
>
In web.php, we have all the routes for the API:
>
![routes](https://user-images.githubusercontent.com/60388013/163416702-60a5c941-1bdc-469a-b418-81579fddadb0.PNG)
>
A middleware was used, called `Admin.php`, in which is verrified if the logged user is admin or a normal user. If we log in as an admin, we can use all the routes from the image, if not, we are redirected on our user page, which uses these requests:
![router2](https://user-images.githubusercontent.com/60388013/163417644-ae3ca043-ab55-45cd-85e2-ceb3be5fb741.PNG)
All the requests, `GET`, `POST`, `PUT`, `DELETE` are used.
### Controllers
Controllers can group related request handling logic into a single class. For example, a `UserController` class might handle all incoming requests related to users, including showing, creating, updating, and deleting users. By default, controllers are stored in the app/Http/Controllers directory.
>
There is one controller for every Model (table) we made so that we can store all the methods for the routes. After creating all the methods correctly, our API is working and we can use all the requests from `web.php`, deppending on which type of user is logged in.
### Resources
When building an API, you may need a transformation layer that sits between your Eloquent models and the JSON responses that are actually returned to your application's users. For example, you may wish to display certain attributes for a subset of users and not others, or you may wish to always include certain relationships in the JSON representation of your models. Eloquent's resource classes allow you to expressively and easily transform your models and model collections into JSON.
>
Of course, you may always convert Eloquent models or collections to JSON using their `toJson` methods; however, Eloquent resources provide more granular and robust control over the JSON serialization of your models and their relationships.
>
There are 5 resources made in this project, every resource including a function like:
>
![aaaaa](https://user-images.githubusercontent.com/60388013/163420867-99608f36-dc07-4e1b-95c4-663c33a256b1.PNG)

### Folders
* `app` - Contains all the Eloquent models
* `app/Http/Controllers/Api` - Contains all the api controllers
* `app/Http/Middleware` - Contains the middlewares
* `app/Http/Resources` - Contains all the used resources

## Available functionalities
* Register, login and logout 
* Manage professors ( View table, add new professor, edit)
* Manage students ( View table, add new students, edit, delete)
* Manage grades ( View table, add new grade, edit, delete)
* Search fields

## 


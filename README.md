# Laravel-Projects

## Create a new Project Using Composer

### You Sholud Add These Codes Into Your AppServiceProvider:

public function boot(): void
    {
        Schema::defaultStringLength(191);
    }

## Laravel can display an overview of your application's configuration, drivers, and environment via the about Artisan command.
    php artisan about

## If you're only interested in a particular section of the application overview output, you may filter for that section using the --only option:

    php artisan about --only=environment

## The -m also will make database file 
    php artisan make:model Note -m

## Work of Model
## Work of Factory

php artisan migrate:refresh --seed 

php artisan make:controller NoteController

## for work smarter, we add layout page into the blade folder, instead of adding manually each file into the folder

## I had a problem with running vite cofiguration on my project, then i run the npm install once again and everything fixed.

## always before we migrate the sql file, we should put into the appserviceprovider.php => 
Schema::defaultStringLength(191);

## Inertia: is not a framework, it is a glue that stick the frontend into the backend => in this project will be use to connect laravel into the react project

## Learn about JSX File

## Learn about tinker
    \App\Models\Task::query()->paginate(5)->all()

## Start to make Controller

php artisan route:list

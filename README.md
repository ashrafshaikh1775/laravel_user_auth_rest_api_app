# ![Laravel laravel_user_auth_rest_api_app]

> ### Laravel codebase containing application (V10+) that allows users to login and register using rest api. The application has a login page, a registration page and a page where users can view users list [laravel_user_auth_rest_api_app](https://github.com/ashrafshaikh1775/laravel_user_auth_rest_api_app.git).

----------

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/10.x/installation)

Clone the repository

    git clone https://github.com/ashrafshaikh1775/laravel_user_auth_rest_api_app.git

Switch to the repo folder

    cd laravel_user_auth_rest_api_app

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## Database seeding

**Populate the database with seed data with relationships which includes users table.**

Open the DummyDataSeeder and set the property values as per your requirement

    database/seeders/DatabaseSeeder.php

Run the database seeder and you're done

    php artisan db:seed

***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

    php artisan migrate:refresh
    
----------

## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information in .env file.

----------

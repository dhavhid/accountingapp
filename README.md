# REST API Accounting App


A Laravel API to handle personal financing data. The App is based on the Laravel 7.0 framework and it uses the built-in features for API building:
- Model
- Route resource
- Resource collection model
- Controller resource
- Database migrations
- Database seeds
- Laravel Passport to handle authentication via OAuth 2.0 with grant password type

This app has been built with the purpose to show off my skills on the following core programming concepts:
- Test Driven Development(TDD)
- Database modeling
- API building skills
- Third party API's integrations(PayPal among others)
- DevOps(AWS Elastic Beanstalk)

## Install

To install the app make sure you have met the requirements for [Laravel 7.0](https://laravel.com/docs/7.x#server-requirements) 

## Run the app

As first step you need to install all dependencies for the app:

- `composer install`

Now you can run the app locally:

- `php artisan serve`


## Migrations

To create the whole database structure you need to perform the following step:

- `php artisan migrate`

Optionally you may seed the database with some sample data:

- `php artisan db:seed`

## Run the tests

- `php artisan test`


# Docker

Additionally you may run the app via Docker compose. Follow this guide to do so.

## Build the image

Make sure you have Docker install on your computer and execute the following commands:

- `docker build -t php/laravel .`

## Postgresql

This app uses Postgresql as it's default database so make sure to have the corresponding Docker image

- `docker pull postgres`

## Run the app

Now you are ready to run the app

- `docker-compose up -d`

Now you may go to [http://localhost](http://localhost) to see the app running

# API Documentation

For specific API documentation please refer to this guide: [App API Documentation by Swagger](https://app.swaggerhub.com/apis-docs/RMCoding/accounting/v1.0)
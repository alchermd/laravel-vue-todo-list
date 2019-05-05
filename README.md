# Laravel Vue Todo-List [![Build Status](https://travis-ci.com/alchermd/laravel-vue-todo-list.svg?branch=master)](https://travis-ci.com/alchermd/laravel-vue-todo-list)

## Introduction

This repository contains the code for a simple Todo-List application built with Laravel and VueJS.

## Project Objectives

The objective of this project is to familiarize myself with the build tools and workflow of Laravel in context of building the front end with VueJS. The following technologies will be used to develop the application:

| Technology | Website | Purpose |
| --- | --- | --- |
| VueJS | https://vuejs.org | Front end JavaScript framework |
| Bootstrap 4 | https://getbootstrap.com | CSS framework |
| Laravel | https://laravel.com | Server side framework |
| PostgreSQL | https://postgresql.org | Relational Data Store |
| PHPUnit | https://phpunit.de | PHP testing framework |
| Laravel Dusk | https://laravel.com/docs/dusk | End-to-end testing framework |

To ensure best practices, the following parameters are to be followed:

1. Code is written using the [Test-Driven Development](#) methodology.
2. Inject [underlying classes](https://laravel.com/docs/facades#facade-class-reference) instead of Laravel Facades.
3. Fully utilize [Laravel Mix](https://laravel.com/docs/mix) (i.e. no stray assets in `/public`)

## Installation

This project contains a [Vagrantfile](Vagrantfile) which allows us to utilize Vagrant and [Laravel Homestead](https://laravel.com/docs/homestead). So please follow the installation process from that link. Once finished, follow these instructions:

1. Run `composer install`
2. Run `vendor/bin/homestead make` to install Homestead for this project
3. Customize `Homestead.yaml` to your preference
4. Run `vagrant up` to start the Homestead box
5. Run `vagrant ssh` to connect to the Homestead box
6. Go to the project directory with `cd code`
7. Once inside the project directory, you can now run [Artisan Commands](https://laravel.com/docs/artisan) to interact with Laravel.

## Site User Roles

- User
    - A user can create an account and persist their todo-list data within the application.

## Design Specifications

> ... TODO: Create a design mockup

## Application Flow

> ... TODO: Create application flowchart and ERD

## Site Map

> ... TODO: Create site map

## License

Released under the MIT License. Read the license [here](LICENSE).

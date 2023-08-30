## Task list

Tasks list, all data stored in MariaDB database. You can add, update, delete tasks and mark them. Style based on [Tailwind CSS](https://tailwindcss.com/). Also used [Alpine JS](https://alpinejs.dev/) for alerts.

# Getting started

1. Clone repository.
2. In project folder run `composer install` commad.
3. Set up new database using `docker-compose up` command, or connect exiting one.
4. Run `cp .env.example .env` command and edit .env file for database connection.
5. Run `php artisan migrate` if you are setting up new DB then run `php artisan migrate:refresh --seed` to fill your database.
6. Run `php artisan serve` to launch the APP.

## APP Preview:

<p align="center">
<img  src="https://i.imgur.com/CJBAlNR.gif" width="400" alt="Laravel Logo">
</p>


# About PPI Edufest 2022
This is an event management website system to hold a registration and event dissemination of Perhimpunan Pelajar Indonesia Education Festival in 2022. Besides, there are bunch of features are included within this project.

## Features
1. Event Registration.
2. Event Creation.
3. Add Speaker to a specific event.
4. Attendees generator (list of participants was obtained from spreadsheet and attendees using microsoft excel)
5. Documentation Uploader to Google Drive.
6. Super Admin Control Role


## Setup for Local Environment

Install all dependencies

```bash
    composer install
```

Copy the example env file and make the required configuration changes in the .env file

NOTE: Change the variable within this file according to your local DB setting

```bash
    cp .env.example .env
```

Generate a new application key

```bash
    php artisan key:generate
```

Create Database on DBMS (Navicat, mysql workbench, or phpmyadmin) called as **ppi_edufest**

Migrate the database schema

```bash
    php artisan migrate
```

Fresh the database schema just in case you want to drop and rebuild the schema

```bash
    php artisan migrate:fresh
```

Seed the database

```bash
    php artisan db:seed
```

Start the local development server

```bash
    php artisan serve
```

You can now access the server at <http://localhost:8000>

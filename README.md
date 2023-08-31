# PHP + LARAVEL + AJAX
This repository contains an example application based on the Laravel framework for managing users and their images. The application provides an API and AJAX for creating users and images, as well as the ability to view and sort the list of users by the number of images.
## Installation and Setup
### Step 1
Clone this repository to your local machine:
```console
https://github.com/ArtemPleskachov/CP30082023-01.git
````

### Step 2
Create a copy of the `.env.example` file and name it `.env`. 
Change `APP_NAME` in `.env`.
Configure your database access and other configurations.

### Step 3
Build and start the Docker containers:
```console
docker-compose up --build
```

### Step 4
Access the PHP container (Use {APP_NAME} from `.env` file):
```console
 docker exec -i -t "php_${APP_NAME}" /bin/bash
```
### Step 5
Install Laravel dependencies:

```console
composer install
```

### Step 6
Generate a key using the command:
```console
php artisan key:generate
```

### Step 7
Run migrations to create the necessary database tables:
```console
php artisan migrate
```
### Step 8
Run the seeder to load the tables with fake data
```
php artisan make:seeder UserSeeder
php artisan make:seeder UserImageSeeder
```
### Step 9
Open a web browser and go to http://localhost to view the app.

## Troubleshooting
In case of encountering errors, you can try the following commands to clear cache and configuration:

```console
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```
or simple
```console
php artisan optimize
```

## Technologies Used
- Laravel
- PHP
- MySQL
- Docker
- AJAX

## Author
- Artem Pleskachov

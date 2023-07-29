# Weather Info

### Description
* The purpose of this program is to list users and provide real weather information based on their locations.

### Built With
* [Laravel](https://laravel.com/) - v10
* [PHP](https://www.php.net/) - v8.1
* [VueJS](https://vuejs.org/) - v3
* [MySQL](https://www.mysql.com/) - v8

## Things to consider:

### API
- https://openweathermap.org/api - https://openweathermap.org/current#one
- Sign up and get an API Key

## To run the local dev environment:

### API
- Navigate to `/api` folder
- Ensure version docker installed is active on host
- Copy .env.example: `cp .env.example .env`
- Start docker containers `docker compose up` (add `-d` to run detached)
- Connect to container to run commands: `docker exec -it fullstack-challenge-app-1 bash`
  - Make sure you are in the `/var/www/html` path
  - Install php dependencies: `composer install`
  - Setup app key: `php artisan key:generate`
  - Migrate database: `php artisan migrate` 
  - Seed database: `php artisan db:seed`
  - Run tests: `php artisan test`
- Visit api: `http://localhost`
- Add your API Key to .env (OPEN_WEATHER_API_KEY)
- Configure crontab and supervisor to schedule and run jobs

### Frontend
- Navigate to `/frontend` folder
- Ensure nodejs v18 is active on host
- Install javascript dependencies: `npm install`
- Run frontend: `npm run dev`
- Visit frontend: `http://localhost:5173`

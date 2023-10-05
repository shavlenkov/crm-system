# CRM-System

### About project
This project is a CRM system designed to manage interactions with clients and companies.

### Tools for launching the project
To start the project, you will need:
1. PHP >= **8.2.6**
2. Laravel >= **10**
3. Composer >= **2.6.4**
4. npm >= **8.5.1**
5. Docker >= **24.0.6**
6. Docker Compose >= **1.29.2**

### How to launch the project?
1. Clone a repository:

   `git clone https://github.com/shavlenkov/crm-system.git`
2. Go to the crm-system folder:

   `cd crm-system`
3. Make an .env file from the .env.example file:

   `cp .env.example .env`
4. Make the necessary configuration changes to the .env file:
```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```
5. Install all dependencies using Composer:

   `composer install`
6. Install all dependencies using npm:

   `npm install`

7. Сompile the project with the command:

   `npm run build`

8. Run containers using Docker Compose:

   `docker-compose up -d`
9. Connect to the container:

   `docker exec -it  crm-system_laravel.test_1 bash`
    1. Give the correct access rights to the bootstrap folder:

       `chmod -R 777 ./bootstrap ./storage`
    2. Generate App Key:

       `php artisan key:generate`
    3. Run migrations and seeders:

       `php artisan migrate --seed`
   4. Create admin:
       `php artisan make:admin`
10. Open a browser and go to the address:
    [http://localhost/login](http://localhost:8000/ "http://localhost/login") and login to the site

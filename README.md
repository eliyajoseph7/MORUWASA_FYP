# MORUWASA_FYP
This is the final year project for MORUWASA billing system. The project has mainly built on <em>Laravel</em>, which is the PHP Framework. Other technologies used are JS, Bootstrap4, AJAX and JQuery.

# Installing Laravel
Laravel utilizes Composer to manage its dependencies. So, before using Laravel, make sure you have Composer installed on your machine. Also ensure that PHP is installed globally in your machine.

## Via Laravel Installer
First, download the Laravel installer using Composer:

<strong> composer global require laravel/installer </strong>

Make sure to place Composer's system-wide vendor bin directory in your $PATH so the laravel executable can be located by your system. This directory exists in different locations based on your operating system;

## Running the project
After downloading the Laravel installer, you can choose either to clone the project or to download the ZIP file.
Before running the project, you have first copy the from .env.example file and create a new file .env in the root directory and paste the copied contents.
If you choose to clone the project, then, run the following command to generate the key:

<strong> php artisan key:generate </strong>

<b>If the application key is not set, your user sessions and other encrypted data will not be secure!</b>

If you choose to download the ZIP file, you don’t have to run the above command.
Run the following command and check in your browser at <strong>127.0.0.1:8000</strong> to verify if the project runs successfully:

<strong> php artisan serve </strong>

## Database
The database configurations can be found at config/database.php. Once youare done with the configuration of the default database, make sure the database configurations in .env file reflects those in database.php.

### Migrations
After completing the configurations, run the following command so as to create tables in the database you've created:

<strong> php artisan migrate </strong>

The project also contains database seeds which helps in generating fake data and store them into the database for testing purposes. To generate these dummy data, run the following command:

<strong> php artisan db:seed </strong>

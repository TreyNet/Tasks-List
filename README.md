# Tasks List - Laravel 

**Tasks List** is a simple task management web application built with [Laravel].  designed to help users create, view, update, and delete tasks. This project is based on a Laravel course by Pyotr Jura and has been customized with additional features and improvements.

## Features

- Create new tasks with a title and description  
- View a list of all tasks  
- Edit existing tasks  
- Delete tasks  
- Optional user authentication  
- Responsive UI using Bootstrap  
- Laravel MVC architecture  
- Unit testing with PHPUnit  
- Frontend assets managed with Vite

## Technologies 

- Laravel (PHP Framework)  
- Bootstrap (CSS Framework)  
- Vite (Frontend build tool)  
- Composer (PHP dependency manager)  
- PHPUnit (Testing framework)

## Installation

1. Clone the repository and navigate to the project folder  
   `git clone https://github.com/TreyNet/Tasks-List.git`  
   `cd Tasks-List`

2. Install PHP dependencies using Composer  
   `composer install`

3. Install JavaScript dependencies and build frontend assets  
   `npm install`  
   `npm run dev`

4. Copy the environment configuration file and generate the application key  
   `cp .env.example .env`  
   `php artisan key:generate`

5. Run database migrations  
   `php artisan migrate`

6. Start the development server  
   `php artisan serve`

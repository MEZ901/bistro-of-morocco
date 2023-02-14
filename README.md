# Bistro Of Morocco
Bistro Of Morocco is a web application for managing meals in a Moroccan bistro. It provides three roles: super admin, admin, and user, each with different levels of access and permissions.
## Features
- Super admin: can view all users and assign any user as an admin
- Admin: can view, add, edit, and delete meals
- User: can view all meals and optionally register and login
## Technologies used
- Laravel framework
- MySQL database
- Tailwind CSS framework
- Blade templating engine
## Requirements
- PHP 8.0 or higher
- MySQL 5.7 or higher
- Composer package manager
## Installation
1. Clone the repository: ``git clone https://github.com/MEZ901/bistro-of-morocco.git``
2. Install dependencies: ``composer install``
3. Create a ``.env`` file by copying ``.env.example`` and update it with your database credentials and other settings.
4. Generate a new app key: ``php artisan key:generate``
5. Run database migrations: ``php artisan migrate``
6. Seed the database with initial data: ``php artisan db:seed``
7. Serve the application: ``php artisan serve``

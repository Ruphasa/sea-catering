`note : I rush this code in one go so i just need 1 commit :)`

## SEA Catering Website
Welcome to the SEA Catering Website, a Laravel-based application for managing catering services, including user dashboards and admin functionalities. This README provides detailed instructions to set up and run the application on your local machine.

# Table of Contents
- Prerequisites
- Installation
- Environment Variables
- Running the Application
- Creating an Admin Account
- Usage
- Features
- License

# I've already hosting it if you want
https://seacatering.42web.io/sea-catering/public/

# Prerequisites
Before you begin, ensure you have the following installed on your system:

- PHP (>= 8.2, recommended for Laravel 12)
- Composer (latest version)
- Node.js and NPM (for frontend assets)
- A Database (e.g., MySQL, PostgreSQL, SQLite)
- Laragon, XAMPP, or another local server environment (optional, if using Windows)
- Git (for cloning the repository)

# 1. Installation
Clone the Repository Open your terminal and run:
`git clone https://github.com/Ruphasa/sea-catering`

# 2. Install PHP Dependencies 
Install the required PHP packages using Composer:
`composer install`

# 3. Install Frontend Dependencies 
Install Node.js dependencies and build assets:
`npm install`
`npm run build`

# 4. Configure Environment
Copy the .env.example file to .env and configure it with your settings (see Environment Variables below):
`cp .env.example .env`

# 5. Generate Application Key
Generate a unique application key:
`php artisan key:generate`

# 6. Run Database Migrations
Set up the database schema and seed initial data:
`php artisan migrate --seed`

# 7. Install Node Modules 
Ensure frontend assets are compiled:
`npm run dev`



## Creating an Admin Account
The application includes admin functionality accessible via the /admin route. Follow these steps to create an admin account:

I've create 1 admin account
Email       : `admin@gmail.com`
Password    : `Nimda098!%))`

But if you another

- go to database folder
- then open seeder folder
- open file UserSeeder.php
- add this following code below the `]);`

# Examples code :
`User::create(['name' => 'yourname','email' => 'your@email.com','password' => bcrypt('password'),'is_admin'=> true,]);`

# Artisa Refresh :
`php artisan:fresh --seed`

# Usage
- Home: View the main page at /.
- Dashboard: Access user dashboard at /dashboard (for non-admin users).
- Admin Dashboard: Access admin features at /admin (for users with is_admin = true).
- Meal Plans: Browse meal options at /menu.
- Contact Us: Reach out via /contact.
- Authentication: Use the default Breeze authentication routes (/login, /register, /logout).

# Features
- User authentication and registration (via Laravel Breeze).
- Responsive navigation bar with different links for admin and non-admin users.
- Admin dashboard with subscription statistics (new subscriptions, MRR, reactivations, growth).
- Custom favicon for branding.
- Mobile-friendly design with a collapsible menu.

# License
This project is open-source and licensed under the MIT License. Feel free to modify and distribute as needed.

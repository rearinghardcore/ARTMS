# Artemis Portal: An Automated Real-Time Tardiness Monitoring System

This research study, entitled **"Artemis Portal: An Automated Real-Time Tardiness Monitoring System Using Laravel Framework for Streamlined Attendance,"** is a mandatory component for Grade 12 students under Electronic Information, Communication, and Technology (EICT) in the Science, Technology, Engineering, and Mathematics (STEM) track. It is part of their research course: **RESE: Inquiries, Investigation, and Immersion**.

This study focuses on solving the recurring problem of tardiness monitoring at **Colegio San Agustin - Bacolod**. Through quantitative analysis, the researchers aim to develop a web application that can efficiently handle tardiness records and manage late slip requests via an administrative dashboard.

---

## Laravel Application Installation Guide for IT Experts

### Pre-requisites

Before installing the Laravel application, ensure that the following are installed on your system:

- **PHP (7.4 or higher)**
- **Composer** (for PHP dependencies)
- **MySQL** (or any other supported database; MySQL is assumed in this guide)
- **Node.js & NPM** (for compiling frontend assets)
- **Laravel Installer** (optional)
- **XAMPP** (for managing Apache and MySQL)

---

### Step 1: Clone the Repository
Clone your Laravel project repository to your local machine.

```bash
git clone https://your-repository-url.git
cd your-laravel-project
```

### Step 2: Install PHP Dependencies
Run Composer to install the required PHP dependencies.

```bash
composer install
This command will install all the required PHP packages specified in the composer.json file.
```

### Step 3: Configure Environment Variables
Copy the .env.example file to .env. This file contains environment-specific settings (such as database configuration, mail setup, etc.).
```bash
cp .env.example .env
```
After copying the .env file, open it in a text editor and configure the necessary environment variables, especially the database settings:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

### Step 4: Generate Application Key
Laravel requires an application key, which can be generated using Artisan (Laravel's command-line tool).
```bash
php artisan key:generate
```
This command generates a new key and updates your .env file.

### Step 5: Set Up the Database
Make sure that you have XAMPP installed in your local system. Ensure that the Apache, MySQL and Filezilla modules are running. Configure the Apache's PHP.ini in XAMPP by pressing the config button under the Actions column. Find the ;extension=gd and remove the semi colon in that specific line to run the QR code library embedded in the ARTMS system.

Database Migration
Run the database migrations to create the necessary tables in your database.
```bash
php artisan migrate
```
If you need to roll back and re-run migrations, use:
```bash
php artisan migrate:rollback
php artisan migrate
```
Database Seeding (Required)
To be able to use the starter accounts, run the following command:
```bash
php artisan db:seed
```

### Step 6: Install Frontend Dependencies (If Applicable)
If your application uses frontend packages (e.g., for Vue.js, React, or CSS frameworks), run the following commands to install and build them:
```bash
npm install
npm run dev
```
To build for production:
```bash
npm run prod
```
### Step 7: Set Permissions (For Linux/Unix-based Systems)
Ensure proper file and directory permissions, especially for directories that Laravel needs to write to, such as storage and bootstrap/cache.
```bash
chmod -R 775 storage bootstrap/cache
```
### Step 8: Serve the Application
You can now serve the Laravel application using PHP's built-in server for testing or development purposes.
```bash
php artisan serve
```
This will start the application at http://127.0.0.1:8000 by default.

### Step 9: Access the Application
Open a web browser and visit:

http://127.0.0.1:8000
You should now see your Laravel application running.

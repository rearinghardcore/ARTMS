<h1>The Artemis Portal is a research-based web application developed using Laravel. </h1>
  
  <div align="justify" style="font-size: 14px;">
This conducted research study entitled “Artemis Portal: An Automated Real-Time
Tardiness Monitoring System Using Laravel Framework for Streamlined Attendance” is a
mandatory component for Grade 12 students under Electronic Information, Communication, and
Technology (EICT), Science, Technology, Engineering, and Mathematics (STEM) in their
research course: RESE: Inquiries, Investigation, and Immersion. This exploration, through a
rigorous quantitative analysis, aims to allow the researchers to develop a web application that
can provide an efficient alternative and solution for the recurring problem that the tardiness
monitoring system poses at Colegio San Agustin - Bacolod.
This research aims to combat the said problem by developing a web application that can
create and organize a repository of tardiness records of students and monitor, allow, or decline
their requests for late slip permits through an administrative dashboard that can be accessed by
school moderators.
</div>

Laravel Application Installation Guide for IT Experts
Pre-requisites:

Before installing the Laravel application, ensure that the following are installed on your system:

PHP (7.4 or higher)
Composer (for PHP dependencies)
MySQL (or any other supported database, but MySQL is assumed in this guide)
Node.js & NPM (for compiling frontend assets)
Laravel Installer (optional)
Step 1: Clone the Repository
Clone your Laravel project repository to your local machine.

bash
Copy
git clone https://your-repository-url.git
cd your-laravel-project
Step 2: Install PHP Dependencies
Run Composer to install the required PHP dependencies.

bash
Copy
composer install
This command will install all the required PHP packages specified in the composer.json file.

Step 3: Configure Environment Variables
Copy the .env.example file to .env. This file contains environment-specific settings (such as database configuration, mail setup, etc.).

bash
Copy
cp .env.example .env
After copying the .env file, open it in a text editor and configure the necessary environment variables, especially the database settings:

plaintext
Copy
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
Step 4: Generate Application Key
Laravel requires an application key, which can be generated using Artisan (Laravel's command-line tool).

bash
Copy
php artisan key:generate
This command generates a new key and updates your .env file.

Step 5: Set Up the Database
Database Migration
Run the database migrations to create the necessary tables in your database.

bash
Copy
php artisan migrate
If you need to roll back and re-run migrations, use:

bash
Copy
php artisan migrate:rollback
php artisan migrate
Database Seeding (Optional)
If your application uses database seeding to populate tables with sample or default data, run the following command:

bash
Copy
php artisan db:seed
You can also seed specific classes:

bash
Copy
php artisan db:seed --class=YourSeederClass
Step 6: Install Frontend Dependencies (If Applicable)
If your application uses frontend packages (e.g., for Vue.js, React, or CSS frameworks), run the following commands to install and build them:

bash
Copy
npm install
npm run dev
To build for production:

bash
Copy
npm run prod
Step 7: Set Permissions (For Linux/Unix-based Systems)
Ensure proper file and directory permissions, especially for directories that Laravel needs to write to, such as storage and bootstrap/cache.

bash
Copy
chmod -R 775 storage bootstrap/cache
Step 8: Serve the Application
You can now serve the Laravel application using PHP's built-in server for testing or development purposes.

bash
Copy
php artisan serve
This will start the application at http://127.0.0.1:8000 by default.

Step 9: Access the Application
Open a web browser and visit:

plaintext
Copy
http://127.0.0.1:8000
You should now see your Laravel application running.

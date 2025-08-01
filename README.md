<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>  

Forklift Project
A Laravel-based forklift management system.

** 1. Install XAMPP **
- Download XAMPP
- Start **Apache** and **MySQL** from the XAMPP Control Panel.
- Access database: ( http://localhost/phpmyadmin/ )

XAMPP includes:PHP,MySQL,Apache Server,PhpMyAdmin  

**2. Clone the Project**  

git clone https://github.com/iremalaiye/forklift.git  
cd forklift

**3. Create and Configure Environment File**    

cp .env.example .env  

Open the .env file and update with your own settings:   

APP_URL=http://localhost:8000  


DB_CONNECTION=mysql  
DB_HOST=127.0.0.1  
DB_PORT=3306  
DB_DATABASE=your_database_name   # ex: db2_forklift  
DB_USERNAME=your_database_username   # ex: root  
DB_PASSWORD=your_database_password   # can be left blank   

To access PhpMyAdmin and manage your database, visit:
http://localhost/phpmyadmin/


**4.Install Dependencies**  

composer install  
npm install  
npm run dev  

**5. Generate Application Key**  

php artisan key:generate  

**6. Run Migrations and Seed Database**  

php artisan migrate  
php artisan db:seed  

**7. Serve the Application**  

php artisan serve






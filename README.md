<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>  

**Forklift Project**

- A Laravel-based forklift management system.  
- Forklift Project is a dynamic company website with Laravel (PHP) featuring an admin panel to manage content such as homepage, about,products contact info, and messages.

**Installation and Setup Guide**  

**1. Install XAMPP and Laravel (Option 1 - With XAMPP)**
- Download XAMPP (Option 1 - With XAMPP)
- Start **Apache** and **MySQL** from the XAMPP Control Panel.  
  Important: Make sure both Apache and MySQL services are running before starting the project. If these services are not started, the application will not work properly.
- Access database: ( http://localhost/phpmyadmin/ )

XAMPP includes:PHP,MySQL,Apache Server,PhpMyAdmin  

- Install **Laravel Installer** (if not installed).

**1.a Install Required Components Manually (Option 2 - Without XAMPP)**  
If you don’t want to use XAMPP, you need to install the following components individually:

- Apache Web Server 

- PHP (>=8.0) 

- MySQL Server 

- PhpMyAdmin 

- Composer   

- Node.js & NPM   

- (Optional) Laravel Installer  

Laravel Installer is only necessary if you plan to create new Laravel projects using laravel new project-name.
For existing projects like Forklift Project, you don’t need it, Composer will install everything required.

**2. Clone the Project**  

- git clone https://github.com/iremalaiye/forklift.git  

- cd forklift

**3. Create and Configure Environment File**    

- cp .env.example .env  

- Open the .env file and update with your own settings:   

APP_URL=http://localhost:8000  


DB_CONNECTION=mysql  
DB_HOST=127.0.0.1  
DB_PORT=3306  
DB_DATABASE=your_database_name   # ex: db2_forklift  
DB_USERNAME=your_database_username   # ex: root  
DB_PASSWORD=your_database_password   # can be left blank   

- To access PhpMyAdmin and manage your database, visit:
http://localhost/phpmyadmin/


**4.Install Dependencies**  

- composer install  
- npm install  
- npm run dev  

**5. Generate Application Key**  

- php artisan key:generate  

**6. Run Migrations and Seed Database**  

- php artisan migrate  
- php artisan db:seed  

**7. Serve the Application**  

- php artisan serve






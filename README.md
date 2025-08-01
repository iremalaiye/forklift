# Forklift Project Installation Guide

**1. Clone the Project**
<strong>1. Clone the Project</strong>
```bash
git clone https://github.com/iremalaiye/forklift.git
cd forklift

<strong>2. Create and Configure Environment File</strong>
cp .env.example .env

Open the .env file and update with your own settings:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db2_forklift
DB_USERNAME=root
DB_PASSWORD=
**3.Install Dependencies**
composer install
npm install
npm run dev
**4. Generate Application Key**
php artisan key:generate
**5. Run Migrations and Seed Database**
php artisan migrate
php artisan db:seed
**6. Serve the Application**
php artisan serve






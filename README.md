# 🚀 Symfony REST API Project

### Developed by **Sviatoslav Diachuk**

---

## 📌 Technologies Used

- 🐘 **PHP** 8.4.3 (CLI)  
- 🎵 **Symfony CLI** 5.10.6  
- 📦 **Composer** 2.8.5  
- 🗄 **MySQL Server** 8.0  
- 🔐 **OpenSSL** 3.4.0  

---

## ⚙️ Setup & Installation

### 1. Clone the Repository

git clone https://github.com/Kishouu/symfony_project.git

2. Navigate to the Project Directory

cd symfony_project

4. Install Dependencies

composer install

5. Configure Environment Variables

Edit the .env file and update the database connection details:

DATABASE_URL="mysql://root:12345678@127.0.0.1:3306/symfony-api?serverVersion=8.0.32&charset=utf8mb4"

6. Set Up the Database

Create the database:

php bin/console doctrine:database:create

Run database migrations:

php bin/console doctrine:migrations:migrate

7. Generate JWT Keys

php bin/console lexik:jwt:generate-keypair

8. Start the Development Server

symfony server:start

Now, open your browser and visit: http://localhost:8000

API Testing with Postman

The Postman collection for this API can be found in:

/symfony_project/symfony-app.postman_collection.json

Additional Features

Load Data Fixtures

php bin/console doctrine:fixtures:load

Custom CLI Commands

Add a new user:

php bin/console app:add-user user@example.com yourpassword

List all users:

php bin/console app:list-users

Run Tests

PHP Unit Tests:

php bin/phpunit

Behat Tests:

vendor/bin/behat

Happy coding!

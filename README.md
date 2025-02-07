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

### 1️⃣ Clone the Repository  
```sh
git clone https://github.com/Kishouu/symfony_project.git
```  

### 2️⃣ Navigate to the Project Directory  
```sh
cd symfony_project
```  

### 3️⃣ Switch to the Workable Branch  
💡 The functional project is located in the **`new-branch-name`** branch, not in the default `master` branch. Switch to it using:  
```sh
git checkout new-branch-name
```  

### 4️⃣ Install Dependencies  
```sh
composer install
```  

### 5️⃣ Configure Environment Variables  
Edit the `.env` file and update the database connection details:  
```ini
DATABASE_URL="mysql://root:12345678@127.0.0.1:3306/symfony-api?serverVersion=8.0.32&charset=utf8mb4"
```

### 6️⃣ Set Up the Database  
Create the database:  
```sh
php bin/console doctrine:database:create
```  

Run database migrations:  
```sh
php bin/console doctrine:migrations:migrate
```  

### 7️⃣ Generate JWT Keys  
```sh
php bin/console lexik:jwt:generate-keypair
```  

### 8️⃣ Start the Development Server  
```sh
symfony server:start
```  
🌐 Now, open your browser and visit: **[http://localhost:8000](http://localhost:8000)**  

---

## 🔍 API Testing with Postman  
📁 The Postman collection for this API can be found in:  
```sh
/symfony_project/symfony-app.postman_collection.json
```  

---

## 🚀 Additional Features  

### 🔄 Load Data Fixtures  
```sh
php bin/console doctrine:fixtures:load
```  

### 🛠 Custom CLI Commands  
- **Add a new user**:  
  ```sh
  php bin/console app:add-user user@example.com yourpassword
  ```  
- **List all users**:  
  ```sh
  php bin/console app:list-users
  ```  

### 🧪 Run Tests  
- ✅ **PHP Unit Tests**:  
  ```sh
  php bin/phpunit
  ```  
- 🔍 **Behat Tests**:  
  ```sh
  vendor/bin/behat
  ```  

---




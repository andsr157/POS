
POS (Point of Sales) Application

This application is a web-based Point of Sales (POS) system designed for retail store management. It provides a complete set of features for product management, transactions, and reporting, making your store operations easier and more efficient.

Main Features:
--------------
- **Account Management**: Add, edit, and delete user accounts with different access levels.
- **Product Management**: Manage product data, categories, stock, and pricing.
- **Cashier**: Process sales transactions with barcode scanner support and automatic receipt printing.
- **Barcode Generator & Scanner**: Generate and scan product barcodes directly.
- **Stock Management**: Monitor and manage inventory in real-time.
- **Reports**: Download and print sales, stock, and activity reports.
- **Transaction History**: View detailed transaction history.
- **File Upload**: Upload files for additional data needs.
- **Multi-user**: Supports multiple users with different access levels.

----------------------
How to Run the Application
----------------------

### 1. Run with Docker (Recommended)

1. Make sure Docker is installed on your computer.
2. Run the following command in your terminal from the project folder:
   ```bash
   docker compose -f compose.prod.yml up -d
   ```
3. The application will run on the port specified in `compose.prod.yml` (default: 80 or 8080).
4. To stop the application:
   ```bash
   docker compose -f compose.prod.yml down
   ```

### 2. Run Manually (Without Docker)

1. Create a new database named `POS`.
2. Import the `pos.sql` file into the database.
3. Install the required libraries using composer:
   ```bash
   composer install
   ```
4. Configure your database settings in `application/config/database.php` according to your environment.
5. Run the application on a web server (Apache/Nginx) with at least PHP version 5.6.

----------------------
Default Account
----------------------

Username: **admin**
Password: **admin**

----------------------
Server Requirements
----------------------

- PHP version 5.6 or newer (latest version recommended for security and performance)
- MySQL/MariaDB
- Composer
- Web server (Apache/Nginx)
- Docker (optional, for easier deployment)

> **Note:**
> The application can run on PHP 5.3.7, but it is strongly discouraged due to security and performance reasons.


----------------------
Important Directory Structure
----------------------

- `application/` : Main source code (controllers, models, views, config, etc)
- `assets/`      : Static files (CSS, JS, images)
- `vendor/`      : External libraries from composer install
- `pos.sql`      : Database file
- `compose.prod.yml`, `Dockerfile` : Docker deployment files
- `000-default.conf` : Default Apache virtual host configuration file. This file is used to set up the web server environment, such as the document root, directory permissions, and other Apache settings. It is especially useful when deploying the application using Docker or on a custom server setup.
- `.htaccess` : Apache configuration file for directory-level settings. This file is used to enable URL rewriting (mod_rewrite), set custom error pages, restrict access to certain files or directories, and configure other web server behaviors without modifying the main server configuration. It is essential for clean URLs and proper routing in the application.

----------------------
Contribution & License
----------------------

Feel free to use, modify, and distribute this application as needed. See `license.txt` for license details.



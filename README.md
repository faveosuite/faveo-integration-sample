#  Agora Sample Integration

This repository contains a sample [Laravel](https://github.com/laravel/laravel) web application, showcasing integration with the following platforms:

- [Agora Invoicing](https://github.com/ladybirdweb/agora-invoicing-community)
- [Agora License Manager](https://github.com/ladybirdweb/agora-license-manager)

## Prerequisites

Before setting up the project, ensure the following are installed on your system:

- **PHP** (version 8.0 or higher)
- **Composer** (for PHP dependency management)
- **Web Server** (e.g., Apache or Nginx)
- **Database Server** (e.g., MySQL or PostgreSQL)

## Installation Guide

### 1. Clone the Repository

To get started, clone this repository to your local machine:

```bash
git clone https://github.com/ladybirdweb/agora-integration-sample.git
```

### 2. Navigate to the Project Directory

Move into the project directory:

```bash
cd agora-integration-sample
```

### 3. Install PHP Dependencies

Run the following command to install all the required PHP dependencies:

```bash
composer install
```

This will download and install all the libraries listed in the \`composer.json\` file.

### 4. Set Up the Environment File

Laravel uses an environment file (`.env`) for configuration settings. Create a new `.env` file by copying the example file:

```bash
cp .env.example .env
```

### 5. Generate the Application Key

Generate an application key, which is required by Laravel to secure encrypted data:

```bash
php artisan key:generate
```

This command will set the `APP_KEY` in your `.env` file.

### 6. Configure the Database

Open the `.env` file and configure the database settings:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

Replace `your_database_name`, `your_database_username`, and `your_database_password` with your actual database credentials.

### 7. Migrate the Database

Run the following command to migrate the database tables:

```bash
php artisan migrate
```

### 8. Seed the Database

Run the database seeder to populate the database with initial data:

```bash
php artisan db:seed
```

### 9. Set Directory Permissions

Ensure that the `storage` and `bootstrap/cache` directories are writable by the web server.

#### Linux/macOS:
```bash
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```
#### Windows (Run in Administrator Command Prompt):

```cmd
icacls storage /grant "IIS_IUSRS:(OI)(CI)F"
icacls bootstrap/cache /grant "IIS_IUSRS:(OI)(CI)F"` 
```
_Note: Replace `IIS_IUSRS` with the appropriate user group if using a different web server or environment._

### 10. Start the Development Server

Run the Laravel development server locally:

```bash
php artisan serve
```

Your application will be served on `http://127.0.0.1:8000`.

## Troubleshooting

If you encounter any issues during setup, try the following:

- Double-check your `.env` file for correct configurations.
- Ensure that all required services (database, web server) are running.
- Refer to the [Laravel documentation](https://laravel.com/docs) for more detailed instructions.

## Credits

- **Laravel Framework** - The base PHP framework used in this application.
- **Admin LTE Theme** - The front-end theme used.

## Reporting a Vulnerability

If you discover any security vulnerabilities, please report them to support@faveohelpdesk.com. You will receive a response within 48 hours. If confirmed, we will release a patch based on the complexity, usually within a few days.

## Need Help?

For assistance, visit the [issue page](https://github.com/ladybirdweb/agora-integration-sample/issues). If you need professional support, you can contact us through the [Faveo Helpdesk contact form](http://www.faveohelpdesk.com/contact-us/).

## Follow Us

Stay updated by following us on social media:

<a href="https://www.facebook.com/faveohelpdesk" ><img src="http://www.faveohelpdesk.com/wp-content/uploads/2016/12/fb.png" /></a> <a href="https://x.com/faveohelpdesk" ><img src="http://www.faveohelpdesk.com/wp-content/uploads/2016/12/twitter.png" /></a> <a href="https://www.linkedin.com/showcase/faveohelpdesk" ><img src="http://www.faveohelpdesk.com/wp-content/uploads/2016/12/linkedin.png" /></a> <a href="https://www.youtube.com/@faveohelpdesk" ><img src="http://www.faveohelpdesk.com/wp-content/uploads/2016/12/youtube.png" /></a> 

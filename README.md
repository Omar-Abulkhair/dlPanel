# Panel

## Installation Steps

### 1. Require the Package

After creating your new Laravel application you can include the Develogs admin package with the following command:

```bash
composer require develogs/panel
```

```bash
\Dl\Panel\DevelogsServiceProvider::class
```
### 2. Add the DB Credentials & APP_URL

Next make sure to create a new database and add your database credentials to your .env file:

```
DB_HOST=localhost
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

You will also want to update your website URL inside of the `APP_URL` variable inside the .env file:

```
APP_URL=http://localhost:8000
```
### 3. Update composer

```bash
composer dump-autoload
```
### 4. Run The Installer

Lastly, we can install develogs admin panel.
To install Admin with all configuration simply run

```bash
php artisan develogs:install
```
And we're all good to go!

Start up a local development server with `php artisan serve` And, visit [http://localhost:8000/admin](http://localhost:8000/admin).

# Panel

## Installation Steps


### 1. Require the Package

you can require Package with the following command:

```bash
composer require develogs/panel
```

### 2. Add the DB Credentials & APP_URL

Next make sure to create a new database and add your database credentials to your .env file with url:

```
APP_URL=http://localhost:8000
DB_HOST=localhost
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```


### 3. Run The Installer

Lastly, we can install Package.
```bash
php artisan develogs:install
```
And we're all good to go!

Start up a local development server with `php artisan serve` And, visit [http://localhost:8000/dashboard](http://localhost:8000/dashboard).

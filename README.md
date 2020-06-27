# Panel

## Installation Steps

### 1. Require and Install Authentication

```bash
composer require laravel/ui
```

```bash
php artisan ui vue --auth
```

### 2. Require the Package

Now you can require Package with the following command:

```bash
composer require develogs/panel
```
### 3. Add Service Provider to your `app/config`

```bash
\Dl\Panel\DevelogsServiceProvider::class
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


### 4. Run The Installer

Lastly, we can install Package.
```bash
php artisan develogs:install
```
And we're all good to go!

Start up a local development server with `php artisan serve` And, visit [http://localhost:8000/dashboard](http://localhost:8000/dashboard).

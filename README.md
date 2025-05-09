# Oracle and Laravel Integration Guide

This guide covers the complete process of installing Oracle Database, connecting it with Laravel using the yajra/laravel-oci8 package, and setting up a working environment.

- oracle db (23ai free) : https://download.oracle.com/otn-pub/otn_software/db-express/WINDOWS.X64_238000_free.zip
- download dbevear and make connection to oracle db 
- php 8.2
- laravel 9
- pecl: php_oci8_19.dll - https://pecl.php.net/package/oci8/3.4.0/windows
- package yajra/laravel-oci8: "^9"


## 1. Oracle Database Installation

### Oracle Installation
- Download Oracle Database from the Oracle website
- During installation, note that "SS" will be used as your service name
- Make sure to remember the service password you set during installation
- Complete the installation process following on-screen instructions

### Verify Oracle Listener
After installation, verify the Oracle listener is running and note the port:
```bash
lsnrctl status
lsnrctl reload
```

## 2. DBeaver Installation and Oracle Connection

### Install DBeaver
- Download and install DBeaver from https://dbeaver.io/download/
- Launch DBeaver after installation

### Connect to Oracle as System User
- Click "New Database Connection"
- Select "Oracle"
- Enter the following details:
  - Host: localhost
  - Port: 1521 or 1522 (default port, use the one from lsnrctl status if different). you will find prot also in 'SS'
  - Service name: SS (the service name you defined during installation)
  - Username: system
  - Password: (use the password you set during Oracle installation)
- Test the connection and save it

### Create User for Laravel
Connect to Oracle as the system user and execute the following SQL commands in a SQL script:

```sql
CREATE USER laravel_user IDENTIFIED BY laravel_password;
GRANT CONNECT, RESOURCE TO laravel_user;
ALTER USER laravel_user QUOTA UNLIMITED ON USERS;
```

### Create Connection for Laravel User
- Click "New Database Connection" again
- Select "Oracle"
- Enter the following details:
  - Host: localhost
  - Port: 1521 or 1522 you will find prot also in 'SS'
  - Service name: SS
  - Username: laravel_user
  - Password: laravel_password
- Test the connection and save it

## 3. PHP Oracle Support Setup


### Install PHP OCI8 Extension
Use PECL to install the OCI8 extension:

 - Download form https://pecl.php.net/package/oci8/3.4.0/windows
 - put into ../php/ext/

When prompted, provide the path to your Oracle Instant Client directory.

## 4. Configure PHP.ini

Edit your php.ini file to enable the OCI8 extension by adding or uncommenting these lines:

```ini
extension=oci8_19
```
- run command to confirm the extension is loaded
```bash 
php -m
```

Restart your web server after making changes to php.ini.

## 5. Install Laravel Project

Create a new Laravel project:

```bash
composer create-project laravel/laravel:^9.0 laravel-oracle-project
```

## 6. Install Yajra Oracle Package

Install the yajra/laravel-oci8 package:

```bash
composer require yajra/laravel-oci8:"^9"

```

## 7. Update Database Configuration

### Add Oracle Driver to config/database.php

Add the Oracle connection details to your `config/database.php` file:

```php
'connections' => [
    // ... other connections

    'oracle' => [
        'driver'         => 'oracle',
        'tns'            => '',
        'host'           => env('DB_HOST', 'localhost'),
        'port'           => env('DB_PORT', '1521'),
        'database'       => env('DB_DATABASE', 'FREEPDB1'),
        'service_name'   => env('DB_SERVICE_NAME', 'FREEPDB1'),
        'username'       => env('DB_USERNAME', 'laravel_user'),
        'password'       => env('DB_PASSWORD', 'laravel_password'),
        'charset'        => env('DB_CHARSET', 'AL32UTF8'),
        'prefix'         => env('DB_PREFIX', ''),
        'prefix_schema'  => env('DB_SCHEMA_PREFIX', ''),
        'edition'        => env('DB_EDITION', 'ora$base'),
        'server_version' => env('DB_SERVER_VERSION', '11g'),
        'load_balance'   => env('DB_LOAD_BALANCE', 'yes'),
        'dynamic'        => [],
    ],
],
```

## 8. Update .env File

Update your `.env` file with Oracle connection details:

```
DB_CONNECTION=oracle
DB_HOST=localhost
DB_PORT=1521
DB_SERVICE_NAME=FREEPDB1
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_password
```

## 9. Run Migrations

Run Laravel migrations to verify the connection:

```bash
php artisan migrate
```

If everything is set up correctly, migrations should run successfully.

## Troubleshooting

### Common Issues:

1. **OCI8 extension not found**
   - Verify that the extension is properly installed with `php -m`
   - Check your php.ini file to ensure the extension is enabled

2. **Connection issues**
   - Verify Oracle service is running with `lsnrctl status`
   - Test the connection using DBeaver or SQL*Plus
   - Check firewall settings if connecting to a remote database

3. **Migration errors**
   - Ensure the laravel_user has the necessary permissions
   - Check for syntax differences between MySQL and Oracle in your migrations


3. **Test Result**
   - Migration is working fine
   - ORM is working fine
   - Make two CRUD operations to verify the connection
   


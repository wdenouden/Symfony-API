Symfony 4 API template
========================

This project contains an simple template to build an API with Symfony.

Requirements
------------

  * PHP 7.1.3 or higher;
  * PDO-SQLite PHP extension enabled;

Installation
------------

```bash
$ composer install
 
// Create database
$ php bin/console d:d:c 
 
// Database migration
$ php bin/console d:m:m
 
// Load fixtures (some test users)
$ php bin/console d:l:f
```

Usage
-----

Execute this command to run the built-in web server and access the application in your
browser at <http://localhost:8000>:

```bash
$ php bin/console server:run
```

Tests
-----

Execute this command to run tests:

```bash
$ ./bin/phpunit
```
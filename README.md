## Laravel User Account Boilerplate

This is a boilerplate framework built on top of [Laravel](http://laravel.com/docs) for creating user accounts, using social & manual login/signup, and password recovery methods.

## Functionality

 * User login (manual, Facebook, Twitter)
 * User signup (manual, Facebook, Twitter)
 * User logout
 * Password reset

## Getting Started

1. Clone this repository ```git clone git@github.com:nick-jonas/laravel-users-boiler.git```
2.  ```composer install```
3.  Point your server to the ```/public``` directory
4.  Run ```chmod -R 777 app/storage``` to make storage writable
5.  By default, it runs the production environment.  To create a new environment, follow [these instructions](http://laravel.com/docs/configuration#environment-configuration)
6.  Edit ```config/database.php``` with your database settings.
7.  ```php artisan migrate``` to migrate the DB schema
8.  ```php artisan db:seed``` to seed sample data
9. Update the ```app/config/mail.php``` file (or override in your env) to reflect your mail server settings.  An example for using gmail:

```
'host' => 'smtp.gmail.com',
'port' => 465,
'encryption' => 'ssl',
'username' => 'your_username',
'password' => 'your_password',
'from' => array('address' => 'yourname@gmail.com', 'name' => 'Sender Name')
```


## Laravel Official Documentation

Documentation for the entire framework can be found on the [Laravel website](http://laravel.com/docs).
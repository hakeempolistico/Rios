# Rio's Library Management System

Rio has recently opened his new library, and he has just got his first set of books. He wants to be able to catalogue all books coming in and out of his library.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. 

### Prerequisites

What things you need to install the software and how to install them

```
Composer
Xampp
```

### Deployment

A step by step series of examples that tell you how to get a development env running

```
Clone or download folder to C:\xampp\htdocs and rename folder to "Rios"
```
Open any terminal. Go to folder and run command
```
composer install
```
This will take a minute or so. Then run command
```
php artisan key:generate

php artisan cache:clear
```
Add a virtual host
```
Go to C:\xampp\apache\conf\extra open file name "httpd-vhosts" and add this 

<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs"
    ServerName localhost
</VirtualHost>

<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/rios/public"
    ServerName rios.local
</VirtualHost>
```

```
Go to C:\Windows\System32\drivers\etc open and run as administrator file name "hosts" and add this 

127.0.0.1       localhost
127.0.0.1       rios.local
```
Restart xampp or apache.

Import database
```
C:\xampp\htdocs\rios\schema\lms.sql
```

### Authentication
```
Go to browser url rios.local/

USERNAME: admin@admin.com
PASSWORD: admin123
```

## Built With

* [Laravel](https://laravel.com/) - The PHP framework used
* [Bootstrap 4](https://getbootstrap.com/) - The front-End framework used
* [jQuery](https://jquery.com/) - JavaScript library used.
* [DataTables](https://rometools.github.io/rome/) - Table plug-in for jQuery.
* [Select2](https://select2.org/) - Select plugin for jQuery.

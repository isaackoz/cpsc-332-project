# cpsc-332-project
CSUF CPSC 332 Term Project - PHP + MySQL

This project uses the LAMP stack - Linux - Apache - MySQL - PHP

## Database:
MariaDB

## Web:
PHP


# Initial Setup
To set this up locally follow these instructions:

## Windows
N/A

## Linux
1. Install PHP 7.4
2. Install Apache2
3. Enable `pdo_mysql` in `sudo nano /etc/php/7.4/apache2/php.ini` by removing the `;` before it. (Ctrl + W to search)
4. Setup MariaDB server
5. Clone this repo into /var/www/school with `git clone [url] .`
6. Add website to apache2 (optionally add hosts file, so you can access at school.local) so dir should be `/var/www/school/web`
7. Configure permissions for `/var/www/school` so apache can access it
8. Configure composer and install it
9. Add DB credentials to `phinx.php` under development
10. Run `./vendor/bin/phinx migrate` which will create the tables, columns, etc.
11. Run `./vendor/bin/phinx seed:run` to fill the database with default data
12. Visit `local.school` in the browser and view the website
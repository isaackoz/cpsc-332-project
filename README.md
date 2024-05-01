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
1. Head to [Xampp](https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/7.4.30/xampp-windows-x64-7.4.30-1-VC15-installer.exe/download) to download an installer (7.4.3)
2. Only install MySQL under components
3. Run control panel
4. Click "Config" under Apache and select the top option (httpd.conf)
5. Under DocumentRoot and <Directory ...>, set the path to this repo and to the /web folder, i.e.  
  ```
   DocumentRoot "C:/xampp/htdocs/cpsc/web"
  <Directory "C:/xampp/htdocs/cpsc/web">
  ```
6. Save the file and then click Start under Apache
7. Start mysql and then click shell on the right of the control panel
8. Type in mysql -h localhost -u root -p and press enter (default password is blank)
9. Type in `CREATE DATABASE mydb;` and press enter. Exit shell
10. Install Composer [here](https://getcomposer.org/doc/00-intro.md#installation-windows). Stop all services and restart XAMPP control panel. Start services back up.
11. Enter shell again and cd into the repository i.e. `cd C:/xampp/htdocs/cpsc`
12. Type in `composer install` or `php composer.phar install` if the former doesn't work
13. Migrate by running the batch file from the /cpsc dir, i.e. `c:\xampp\htdocs\cpsc\vendor\bin\phinx.bat migrate`
14. Seed the db `c:\xampp\htdocs\cpsc\vendor\bin\phinx.bat seed:run`
15. Finish

## Linux
1. Install PHP 7.4
2. Install Apache2
3. Enable `pdo_mysql` in `sudo nano /etc/php/7.4/apache2/php.ini` by removing the `;` before it. (Ctrl + W to search)
4. Setup MariaDB server
5. Clone this repo into /var/www/school with `git clone https://github.com/isaackoz/cpsc-332-project.git .`
6. Add website to apache2 (optionally add hosts file, so you can access at school.local) so dir should be `/var/www/school/web`
7. Configure permissions for `/var/www/school` so apache can access it
8. Configure composer and install it
9. Add DB credentials to `phinx.php` under development
10. Run `./vendor/bin/phinx migrate` which will create the tables, columns, etc.
11. Run `./vendor/bin/phinx seed:run` to fill the database with default data
12. Visit `local.school` in the browser and view the website

# Personnel Managament App with Composer

## Description
This is my third PHP project created for study purposes. It was used raw CSS and PHP Composer library in this project and displayed tables was created using ORM doctrine package. Assigned and completed tasks:

* Create DB schema with tables and data in it with relations (in this case: 1:M relation) using Composer ORM Doctrine Package;
* Display DB schema tables data with their relations into browser using PHP;
* Create Delete and Update functionality: Delete and Update in browser should work in DB tables too;
* Create Creation functionality: It is needed to be able to create new employee and new project in browser tables, and theese data should be set in DB schema too;
* It is needed to be able to assign an employee to a project and this assigment sets in DB schema too;
* All project should be done with ORM, Composer, entities and MVC.

## Instalation
To launch this project you will need `Git Bash` or `VSCode`, `MySQL Workbench` and `Xampp` apps.

1. To clone this project, start servers and create database: 
   * Navigate to htdocs folder and with your Git Bash or via VSCode terminal type git clone `https://github.com/alinapak/personnelManComposer.git`;
   * Open Xampp and make sure that Apache and MySQL servers are on;
   * Open MySQL workbench and connect at any your connection (connection should support creating database and reading, creating, updating and deleting tables);
   * In your chosen connection manually create DATABASE named *personnel_projects* or copy this command: `CREATE DATABASE personnel_projects`;
2. Composer installation to launch this project (**if you already have Composer, skip this step**):
   * Navigate to directory, where you want to install Composer (composer.phar file path will be necessary for command line to launch this project);
   * You can install composer with your command line (copy and paste theese commands in your command line):
      * php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
      * php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
      * php composer-setup.php
      * php -r "unlink('composer-setup.php');"
3. Launch this project: 
   * Open project folder with VSCode and in your terminal type:
      * `php ../composer.phar install`;
      **NOTE** "../composer.phar" is 'composer.phar' file path, so if that file is in other place than htdocs folder, you have to specify 'composer.phar' path while typing this command.
   * For database schema generation (powershell recommended, because with Git Bash it could not work) type in terminal:
      * `vendor\bin\doctrine orm:schema-tool:update --force --dump-sql`.
4. Now you have necessary tables in your database. You also can create some data with console script:
   * Create data by using scripts:
      * For employee creation type in terminal : ` php ./create_employee.php <employee_name> <employee_surname>`;
      * For project creation type in terminal : ` php ./create_project.php <project_name>`.
   * Or you can create data when you will start to use this App in your browser.

## How to Use
After you typed in your browser search bar `localhost/personnelManComposer` you will get to home page. You can navigate via navbar to Employees or Projects Table and see data from DB that you created with console scripts descriped earlier. Now you can update, delete or also create new data via browser. 
If you haven't created data with console script, then you can simply do that with opened app and then also use update or delete settings.

## Author
This project was created by me [Alina Pakamorytė](https://www.linkedin.com/in/alina-pakamoryt%C4%97-73a66377/) 
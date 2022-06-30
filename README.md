# Personnel Managament App with Composer

## Description
This is my third PHP project created for study purposes. It was used raw CSS and PHP Composer library in this project and displayed tables was created using ORM doctrine package. Assigned and completed tasks:

* Create DB schema with tables and data in it with relations (in this case: 1:M relation);
* Display DB schema tables data with their relations into browser using PHP;
* Create Delete and Update functionality: Delete and Update in browser should work in DB tables too;
* Create Creation functionality: It is needed to be able to create new employee and new project in browser tables, and theese data should be set in DB schema too;
* It is needed to be able to assign an employee to a project and this assigment sets in DB schema too.

## Instalation
To launch this project you will need `Git Bash` or `VSCode`, `MySQL Workbench` and `Xampp` apps.

* To clone this project: Navigate to htdocs folder and with your Git Bash or via VSCode terminal type git clone https://github.com/alinapak/personnelManComposer.git;
* Open Xampp and make sure that Apache and MySQL servers are on;
* Open MySQL workbench and connect at any your connection (connection should support creating database and reading, creating, updating and deleting tables);
* In your chosen connection manually create DATABASE named personnel_projects or copy this command: `CREATE DATABASE personnel_projects`;
* Open project with VSCode and in your terminal (powershell recommended, because with Git Bash it could not work) type these commands: 
   * `php ../Composer/composer.phar dump-autoload` (you should know your composer.phar file path ) (check if it works without this command?)
   * `vendor\bin\doctrine orm:schema-tool:update --force --dump-sql` (this command won't work with Git Bash)

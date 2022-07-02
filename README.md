# Personnel Managament App with Composer

## Description
This is my third PHP project created for study purposes. It was used raw CSS and PHP Composer library in this project and displayed tables was created using ORM doctrine package. Assigned and completed tasks:

* Create DB schema with tables and data in it with relations (in this case: 1:M relation);
* Display DB schema tables data with their relations into browser using PHP;
* Create Delete and Update functionality: Delete and Update in browser should work in DB tables too;
* Create Creation functionality: It is needed to be able to create new employee and new project in browser tables, and theese data should be set in DB schema too;
* It is needed to be able to assign an employee to a project and this assigment sets in DB schema too;
* All project should be done with ORM, Composer, entities and MVC.

## Instalation
To launch this project you will need `Git Bash` or `VSCode`, `MySQL Workbench` and `Xampp` apps.

* To clone this project: Navigate to htdocs folder and with your Git Bash or via VSCode terminal type git clone https://github.com/alinapak/personnelManComposer.git;
* Open Xampp and make sure that Apache and MySQL servers are on;
* Open MySQL workbench and connect at any your connection (connection should support creating database and reading, creating, updating and deleting tables);
* In your chosen connection manually create DATABASE named personnel_projects or copy this command: `CREATE DATABASE personnel_projects`;
* Open project with VSCode and in your terminal (powershell recommended, because with Git Bash it could not work) type these commands: 
   * `php ../Composer/composer.phar dump-autoload` (you should know your composer.phar file path ) (check if it works without this command?)
   * `vendor\bin\doctrine orm:schema-tool:update --force --dump-sql` (this command won't work with Git Bash)
   * Create data by using scripts:
      * For employee creation type in terminal : ` php ./create_employee.php <employee_name> <employee_surname>`;
      * For project creation type in terminal : ` php ./create_project.php <project_name>`.
   * Or you can create data when you will start to use this App in your browser
      * Other commands nescessary???

## How to Use
After you typed in your browser search bar `localhost/personnelManComposer` you will get to home page. You can navigate via navbar to Employees or Projects Table and see data from DB that you created with console scripts descriped earlier. Now you can update, delete or also create new data via browser.
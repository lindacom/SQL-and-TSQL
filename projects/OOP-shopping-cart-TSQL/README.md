Create database in local sql server instance
---------------------------------------------
In start menu open sqlcmd.
To create a database in the commandline enter:

CREATE DATABASE LaravelDatabase GO

Create tables
---------------
To create a table in SSMS right click the database and select new query. Enter:

CREATE TABLE dbo.customers
(customerID int IDENTITY(1,1) PRIMARY KEY NOT NULL,
name varchar(255),
address varchar(max), 
postcode varchar(255) )

NPM for PHP projects
=====================

Create a node project
===========================

1. Open visual studio code. Open a terminal and navigate to the required directory (e.g cd desktop)
2. Make a new directory using the command mkdir <directoryname>

If you havent already done so on your computer:
4. download node js from nodejs.org
5. install PHP (if you haven’t already). Follow the standard instructions on http://php.net/manual/en/install.php.

In the terminal:
4. navigate into the directory you just created (cd <directoryname>)and enter the command npm init. 
  When prompted you can enter package name, description entery point - index.js or press enter to accept the default.  
  When prompted is it ok click yes.

In visual studio code: 
7. go to file > open folder and open the directory you have created. 
   N.b. you will see a node modules directory has been created and a package.json file has been created

Add dependencies
=================

express - a framework for node.js. Express router is used for registering different routes and endpoints.

In visual studio code open a terminal and install express - enter the command npm install --save express

Create files
=============
1. webserver.js - web server. requires “execphp.js” which is where PHP parsing takes place. 
defining a route that recieves all *.php requests, and runs them through the execPHP class.

2. execphp.js - this file contains a class, ExecPHP, with a single method, parseFile. This method basically takes a file, 
executes the command line PHP and calls the passed callback with the result. N.b. php path refers to the location where the php installation is saved.

3. php files - all the application files.

Create database class
----------------------

1. interfaces/DB.php
2. dbConnect.php
3. classes/mySql.php

DB connect:

```
<?php
// an interface specifies what methods a class should implement

interface DB
{
    public function connect($host, $username = '', $password);
    public function query($query);
}
?>
```

classes/mysql includes and implements the database interface

```
public function connect($username ="", $password = "", $host = "localhost", $dbname = "PHPDatabase", $options = [])
    {
     
   $this->db = new PDO("sqlsrv:Server={$host};Database={$dbname}", $username, $password);
    }
```

dbconnect:
```
<?php 

$database = $database = new Mysql();
$database->connect($username ="", $password = "", $host = "localhost", $dbname = "PHPDatabase", $options = []);
?>
```

Run the application
=====================

In the terminal run the application by entering node --use_strict webserver.js
open the browser to localhost port 3000 - http://localhost:3000/

N.b. whenever you make a change to files you need to restart the server. server.js


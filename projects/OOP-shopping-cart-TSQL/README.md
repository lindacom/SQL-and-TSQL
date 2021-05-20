Create local sql server instance
--------------------------
In start menu open sqlcmd.
To create a database in the commandline enter:

CREATE DATABASE LaravelDatabase GO

Create tables
---------------

CREATE TABLE dbo.customers
(customerID int IDENTITY(1,1) PRIMARY KEY NOT NULL,
name varchar(255),
address varchar(max), 
postcode varchar(255) )

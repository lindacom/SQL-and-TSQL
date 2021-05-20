Create local Sql Server instance
================================

Create database 
---------------

1. download sql server 2019 developer free edition from microsoft.com N.b Sql server configuration manager will also be installed 
2. Make a note of instance name, connection string and sql administrators
3. Click connectnow button
4. Create database using sqlcmd in the start menu

sql server database commandline
---------------------------------
from the start menu open sqlcmd

To create a database enter:

CREATE DATABASE LaravelDatabase
GO

To view databases enter:

EXEC sp_databases
GO

VIEWING TABLES
---------------

Listing all the tables in SQL server when using a newer version (SQL 2005 or greater) is a matter of querying the INFORMATION_SCHEMA 
views which are automatically built into SQL Server.

To view all tables enter:

SELECT * FROM INFORMATION_SCHEMA.TABLES;
GO

Create tables
-------------
6. Install or open SSMS
7. In the connect to server box enter localhost in the server name field
8. Select windows authentication from the authentication dropdown. The username should then be populated from your computer
9. Click connect
10. Expand the databases folder
11. Right click the database you have created and select new query


To create a table in SSMS right click the database and select new query. Enter:

CREATE TABLE dbo.reviews  
   (reviewID int IDENTITY(1,1) PRIMARY KEY NOT NULL,  
   customerID int NOT NULL,  
   bookTitle  varchar(255) NULL,  
   description varchar(max) NULL,
   reviews varchar(255) NULL
 )
 
 12. Execute the query by clicking the execute button 
13. Expand the tables folder. You should see the table you created
14. To add table content right click the table and select edit rows and enter data in the columns

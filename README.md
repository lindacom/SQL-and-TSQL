CREATE AZURE SQL SERVER AND SQL DATABASE

Create resource group and single database 
==========================================

Login to the portal

Select Azure SQL in the left-hand menu of the Azure portal. If Azure SQL is not in the list, select All services, then type Azure SQL in the search box. 

Select + Add to open the Select SQL deployment option page.

In the sql databases box Select Create

basics
------

Resource group: Select Create new, type myResourceGroup, and select OK.

In the Database Details section, type or select the following values:

Database name: Enter mySampleDatabase.

Server: Select Create new, enter the following values and then select Select.

Server name: Type mysqlserver; along with some numbers for uniqueness.

Server admin login: Type azureuser.

Password: Type a complex password that meets password requirements.

Location: Choose a location from the drop-down, such as West US.

Compute + storage: Select Configure database. (basic £4 per month) Select Apply.

Additional settings 
--------------------

In the Data source section, under Use existing data, select Sample.

Leave the rest of the values as default and select Review + Create at the bottom of the form.

Review the final settings and select Create.

Basics
========
Subscription
Pay-As-You-Go

Resource group
myResourceGroup

Region
(Europe) UK West

Database name
mySampleDatabase

Server
(new) mysqlserver888
servername mysqlserver888.database.windows.net

Compute + storage
Basic: 2 GB storage

Estimated cost per month
4.64 GBP

Login
azureuser

Query database
===============

On the SQL Database page for your database, select Query editor (preview) in the left menu.

Enter your login information, and select OK.

N.b. Be sure to set up firewall rules to use the public IP address of the computer you're using. A firewall rule of 0.0.0.0 enables all Azure services to pass through the server-level firewall rule and attempt to connect to a single or pooled database through the server.

Enter a query in the Query editor pane.

Select Run, and then review the query results in the Results pane.

Delete resources
================

delete them as follows:

From the left menu in the Azure portal, select Resource groups, and then select myResourceGroup.
On your resource group page, select Delete resource group.
Enter myResourceGroup in the field, and then select Delete.

Connect to resources using Sql Server Management Studio
=========================================================

Download free version of Sql Server Management Studio (SSMS) from https://docs.microsoft.com/sql/ssms/sql-server-management-studio-ssms
Open SSMS
In the connect to server box enter
Server type	Database engine
Server name	The full server name
Authentication	SQL Server Authentication
Login	Server admin account user ID
Password	Server admin account password

Query database using using Sql Server Management Studio
========================================================

In Object Explorer, right-click mySampleDatabase and select New Query.

enter a query
On the toolbar, select Execute to retrieve data 

query options
-------------
create table

drop table 

insert statement - used to add new rows of data to a table in the database.

Select statement -  used to fetch the data from a database table which returns data in the form of result table

update statement

delete statement - used to delete the existing records from a table.

Clauses - where (using comparison or logical operators like >, <, =, LIKE, NOT, etc.), like (using wildcards - The percent sign represents zero, one, or multiple characters. The underscore represents a single number or character. ), order by (ascending or descending), group by and distinct

table join options
-------------------

There are different types of joins available in MS SQL Server -

INNER JOIN - Returns rows when there is a match in both tables.

LEFT JOIN - Returns all rows from the left table, even if there are no matches in the right table.

RIGHT JOIN - Returns all rows from the right table, even if there are no matches in the left table.

FULL JOIN - Returns rows when there is a match in one of the tables.

SELF JOIN - This is used to join a table to itself as if the table were two tables, temporarily renaming at least one table in the MS SQL Server statement.

CARTESIAN JOIN - Returns the Cartesian product of the sets of records from the two or more joined tables.

Create stored procedures using Sql Server Management Studio
========================================================

Go to programmability > stored procedures folder




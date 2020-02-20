Sql Server Management Studio (SSMS)
===================================
An explanation of the folder structure in SSMS.

Encrypt a table column
=======================

You may encrypt a column e.g. credit card details or password.

In object explorer pane right click the database and select tasks > encrypt columns to open the wizard
On the introduction page click next
On the column selection screen select the table and column you want to encrypt. Choose an encryption type e.g. deterministic and click next
On the master key configuration screen select key store provider e.g. windows certificate store and click next
On the run settings screen select how you would like to proceed e.g. proceed to finish now and click next
View the choices on the summary screen and click finish
The results screen shows the status of the performing encryption operations task

When the task has completed, in object explorer pane right click the table and select top 1000 rows.  You will see that the column data has now been encrypted

Linked servers
==============

Useful when you have two servers in your environment and you want to link one to the other. You can link servers in code or through explorer.
1. Connect to the instance
2. Create stored procedure - enter a server name and a server product e.g. 

EXEC sp_linkserver
@server = 'server\server'

N.b. you also need to enter login and password details

3. Execute the stored procedure

The linked server will be created in server > linked servers folder

Deleting a linked server
------------------------

To delete a linked server right click the name and select delete. Alternatively you can run a stored procedure to delete the linked server eg. 

EXEC sp_DropServer
@server = 'servername'

N.b. you can also create a link to Excel or Access

Synonyms
========

Synonyms enable you to access the string (i.e. servername.databasename.schemaname.tablename) by just using e.g. dbo.mytable.  To create a synonym

1. Right click the folder and select new synonym
2. Enter a name and schema (e.g. dbo), database name, table schema (e.g. dbo), object type and object name. N.b. if table name changes you need to drop the synonym
3. On the permission screen add users so they can access the synonym

You can query the synonym e.g. select * from [dbo].[mytable]

Triggers
========

Triggers can be used to fire an event after a record has been inserted for example.  The trigger folder is located in programmability > database triggers

1. Right click the folder and select create new trigger
2. at the CREATE TRIGGER step enter a name for the trigger.  At the ON point enter table name.  At the after step enter event e.g. insert, update
3. in the BEGIN step enter your statement

e.g. DECLARE @customerid int
SET @customerid = select customerid from INSERTED
UPDATE customers
SET Lastupdated = GETDATE()
WHERE customerid = customerid

Now when you go to the table and change data the trigger is fired and will enter a system date in the Lastupdated column (as per the 
instruction in the SET section of the trigger)

Functions
=========

The functions folder is located in programmability > functions. There are various functions subfolders - table-valued, scalar-valued, aggregate, system. 

Scalar-valued functions
-----------------------

1. Right click the folder and select create new
2. Enter a name for the function and enter parameter. In the return step enter a data type e.g. INT
In the BEGIN step enter a query N.b. you can right click the area and open query designer to build a query.

Assemblies
==========

Used for linking .net application to TSQL for example.

Creatae a DLL
Create an assembly
Create an SQL server CLR stored procedure from the assembly

1. Enable CLR - enable CLR sp_configure 'clr enabled'; 1. Execute the command
2. Create an assembly. Enter name and in the FROM step enter the location of the dll. Enter permission sets e.g. SAFE. Execute the assembly.
3. Create a stored procedure. Enter a name and external name referencing the assembly, the class within the assembly and the method within the class. Execute the stored procedure.

Types
=====

The types folder is located in programmability > types. There are various types - user defined data types

Types are used for creating tables with column names using pre defined data types.

1. Right click the folder to create a type
2. Enter a name for the type. In the FROM step enter a data type e.g. Varchar

Query store
===========

A query store shows the metrics for your queries.  You first need to enable query store.  You can then right click the query under the folder and view it.


Sql Server Management Studio (SSMS)
===================================
An explanation of the folder structure in SSMS.

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


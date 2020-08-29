
echo database fields as checkbox list
---------------------------------------

  echo '
        
         <input type="checkbox" id="'.$row["lastname"].'" value="'.$row["lastname"].'">
         <label for="'.$row["lastname"].'">'.$row["firstname"].' '.$row["lastname"].'</label><br>
         
        
        
        
        
        ';
        
        Declaring, setting and selecting variables
===========================================

A variable is in memory temporary storage. There are two types of variable - scalar (one value per variable) and table.

1. Declare variable - define with an @ symbol and define the data type e.g. DECLARE @tom INT. N.b. It is possible to declare multiple variables at once.  The variables can be different data types.  Just separate them with a comma.
2. Set the variable e.g. @tom = 5

3. print the variable e.g. PRINT @tom or select the variable e.g. SELECT @tom

Variables are only available in the current session. Using the GO command releases the variable (batch terminator).

N.b. you cannot declare variables more than once without using GO.

N.b. both SELECT (assign from a query) and SET (assign from a funtion or literal value) can be used for variable assignment.

Variables can be overwritten.

Declaring, opening, fetching, closing and deallocating a cursor
================================================================

A cursor is the object that allows us to access the data row by row from the result set. 

There are six types of cursor

Forward - Cannot scroll backwards. Can only fetch next. forward only static and forward only dynamic.

Static - Produces a copy of the result set which is not sensitive to any changes (e.g. update, delete, insert). Are scrollable (e.g. fetch first, last, prior, next, relative, absolute (e.g. absolute 1 returns first record) A static cursor could be used when you only want fecords from a certain point in time.

Dynamic - sensitive to data changes. produces modified data from source while the cursor is open. Are scrollable (e.g. fetch first, last, prior, next, relative). N.b. cannot use absolute with dynamic cursors.

Keyset - order of rows is fixed. Key changes in base table won't be visible in key table. Next key changes will be updated while cursor is open. Are scrollable (e.g. fetch first, last, prior, next, relative). Nb. if the table does not have a unique index cursor will change to static cursor.

Local - limited to the batch
Global - limited to the connection

To declare a cursor type enter the type followed by FOR (i.e. STATIC FOR) after declaring the cursor 

PART ONE

1. USE table - select the table to use
2. DECLARE cur CURSOR - declare the cursor
3. GO
4. Specify the type of cursor (optional)
5. OPEN cur - open the cursor
6. END
7. GO - terminates the batch

PART TWO

1. CREATE
2. AS
3. FETCH NEXT FROM cur - fetch the records from the cursor. Nb. you can also fetch into variables.
4. WHILE (@@fetch_status = 0) - keep fetching records
5. BEGIN
6. PRINT
7. FETCH NEXT - return records from the cursor
8. END - end the loop
9. GO
10. CLOSE - close the cursor
11. DEALLOCATE - deallocate the cursor, remove from memory.

N.b. if you do not declare the cursor type the default type will be used.  The default type is determined by the database and can be seen by right clicking the database, select properties, go to the options screen and see the default cursor field.


Queries
========

query to find tables with constraint settings
----------------------------------------------

Select * from information_schema.TABLE_CONSTRAINTS

Stored procedures
==================

Create a stored procedure to insert a record 
---------------------------------------------

-- =======================================================
-- Create Stored Procedure Template for Azure SQL Database
-- =======================================================
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:      <Author, , Name>
-- Create Date: <Create Date, , >
-- Description: <Description, , >
-- =============================================
CREATE PROCEDURE dbo.stored

AS
BEGIN
    -- SET NOCOUNT ON added to prevent extra result sets from
    -- interfering with SELECT statements.
    SET NOCOUNT ON

    -- Insert statements for procedure here
   INSERT INTO CUSTOMER (customerId, customerName, review)
VALUES ('3', 'Tom', 'I am happy');
END
GO



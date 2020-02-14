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

Queries
========

query to find tables with constraint settings
----------------------------------------------

Select * from information_schema.TABLE_CONSTRAINTS

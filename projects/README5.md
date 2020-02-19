Dates
========

formatting dates
-----------------

convert date to ddmmyy format
convert (char(8), orderDate, 3)
N.b. clicking on the convert text and pressing F1 will bring up the help page with other formats. (or click help menu and select how do I and perform search
N.b. enter char 10 and change 3 to 103 to display four digit year

Calculating dates
-------------------

To calculate day of the week and day of the month enter

DATENAME(DW, orderDate) + ' ' +
DATENAME(DD, orderDate) + ' ' +
DATENAME(MM, orderDate) + ' ' +
DATENAME(YY, orderDate) + ' ' +

Calculate time between dates
-----------------------------

To get rough time (does not calculate exact month only year)

DATEADD(YY, DATEDIFF(YY, orderDate, GETDATE()), orderDate)


To get exact time

CASE
WHEN DATEADD(YY, DATEDIFF(YY, orderDate, GETDATE()), orderDate) > GETDATE()
THEN DATEDIFF(YY, orderDate, GETDATE()) -1
ELSE DATEDIFF(YY, orderDate, GETDATE())
END

Conversions
============

N.b. style parameter can't be used in cast you need to use convert

CAST function
----

To convert date format in date of birth colum to a new format in a new converteddob column

SELECT TOP (1000) 
       [customerName]
      ,[id]
      ,[DateOfBirth],
	  CAST(DateOfBirth as nvarchar) as ConvertedDOB
  FROM [dbo].[CUSTOMER]

Nb. you can also specify the length in brackets after the word nvarchar eg. (5) takes off five characters and will display Dec 3


CONVERT function
--------

First select target date type (length is optional) then name of source column (style is optional and is for varchar or nvarchar only)

See also date and time styles - https://docs.microsoft.com/en-us/sql/t-sql/functions/cast-and-convert-transact-sql?view=sql-server-ver15

Data type precedence

Implicit conversion -When performing an operation on two data types which don't match SQl server will try to do a cast conversion

precedence - sql server determines which data type to convert first in order of precedence (e.g. float is above decimal).  Converts to the same data type before performing operation

Working with XML
==================

If you have a table with ID column and XML data colum and the XML data colum has xml (e.g. from a comment forum) such as

<Record ID="2" Machine="3"><start>Nine</start><number ID="4" Details="yes"><time>2013-01-02</time></number></record>

To extract the data from the XML into separate columns you would need a query such as 


SELECT ID
, XMLData
, n.b.value('(@ID)(1)', 'SMALLINT') AS RecordID
, n.b.value('(@Machine)(1), 'SMALLINT') AS RecordMachine
, N.B.VALUE('(sTART)(1)', 'varchar(10)') as Start
, n2.b.value('(@ID)(1)', 'SMALLINT') AS NumberID
, n2.b.value('(@Details)(1)', 'VARCHAR(10)') AS NumberDetails
, n2.b.value('(Time)(1)', 'DATE') AS (Time)
FROM XMLTABLE XT
CROSS APPLY XT.XMLDATA.nodes('/Record') AS n(b)
CROSS APPLY xt.XMLData.nodes('/Record/Number') AS n2(b)


N.b. the cross apply gives the format for the query in the select section. It accesses the record tab and the number tag (which is within the record tag and contains record id and machine and start), and the number tag
N.b. if a column name in the xml contains = you need to use the @ symbol in the select statement otherwise just type the column name

Working with Json
=================

Import json file into SQL server
---------------------------------

DECLARE @employeedetails VARCHAR(MAX)

SELECT @employeedetails -
BulkColumn
FROM OPENROWSET(BULK 'C:\users\pathtojsonfile.json', SINGLE_BLOB) JSON

Select query
------------

to convert a date to json enter

select getdate() as date for json path

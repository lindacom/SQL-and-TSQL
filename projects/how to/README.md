MySql - how to
================


Create a table example
-----------------------

CREATE TABLE Persons (
    PersonID int,
    LastName varchar(255),
    FirstName varchar(255),
    Address varchar(255),
    City varchar(255),
    PRIMARY KEY(PersonID)
);

Nb. you can use certain table constraints when creating a table such as primary key, foreign key, check, default

FOREIGN KEY (PersonID) REFERENCES Persons(PersonID)

 CHECK (Age>=18)
 
 City varchar(255) DEFAULT 'London'
 
 N.b. SQL server uses identity (e.g. int IDENTITY(1,1) PRIMARY KEY) instead of auto increment

Alter a table examples
-----------------------

Add column
-----------
ALTER TABLE Customers
ADD Email varchar(255);

Delete column
--------------
ALTER TABLE Customers
DROP COLUMN Email;

Update a record 
----------------

UPDATE Customers
SET ContactName = 'Alfred Schmidt', City= 'Frankfurt'
WHERE CustomerID = 1;

Change a data type
-----------------

ALTER TABLE BOOKS
ALTER COLUMN category varchar(255);

Rename a column
-----------------
sp_rename 'REVIEWS.product_id', 'productId', 'COLUMN';

Insert into a table examples
==========================

insert one record
--------------------
INSERT INTO CUSTOMER (customerId, customerName, review)
VALUES ('2', 'Tom', 'I am happy');

Insert multiple records
-----------------------
INSERT INTO ORDERS (id, customerId, orderDate) 
VALUES ('10308', '2', '1996-09-18'),
 ('10309', '37', '1996-09-19'),
 ('10310', '77', '1996-09-20');
 
 Insert data from one table to another
 -------------------------------------
 N.b. you can insert data from one table to an existing table without affecting existing records as follows
 
 INSERT INTO table2
SELECT * FROM table1
WHERE condition;

Insert query using parameters
-----------------------------

// prepare and bind

$stmt = $connect->prepare("INSERT INTO tbl_customer (CustomerName, review) VALUES (?, ?)");       
$stmt->bind_param("ss", $CustomerName, $review);

// set parameters and execute

$CustomerName = "Jake";
$review = "hello";
$stmt->execute();

echo "Inserting a new row into table";

$stmt->close();

Delete a table
===============

delete table
------------

DROP TABLE Shippers;

delete table data only
----------------------

TRUNCATE TABLE table_name;

Statements
====================

Select
-------

SELECT MIN(price) AS SmallestPrice
FROM BOOKS;

SELECT * FROM CUSTOMER
WHERE CustomerName LIKE 'a%';

N.b. alternatively you can use 

ending with an a (LIKE '%a';), 

an or in any position (LIKE '%or%';), 

r in the second position (LIKE '_r%';), 
starting with 
-------------

starts with a and at least three characters in length (LIKE 'a__%';), 

starts with a and ends with o (LIKE 'a%o';), 

starts with b, s or p (LIKE '[bsp]%';),

does not start with an a (NOT LIKE 'a%';)

starting with a b or c (LIKE '[a-c]%';)

not starting with b s or p (LIKE '[!bsp]%';)

containing
----------

containing the pattern es (LIKE '%es%';),

any character followed by ondon (LIKE '_ondon';),

any character in between l n and on  (LIKE 'L_n_on');

Between
-------

SELECT * FROM BOOKS
WHERE price BETWEEN 10 AND 20;

SELECT * FROM Orders
WHERE OrderDate BETWEEN #01/07/1996# AND #31/07/1996#;

random records
---------------

SELECT TOP 3 * FROM BOOKS
   WHERE featured ='featured'

  
   order by newid()
   
    Nb. newid() is a function to return random results

Combine four columns as one alias example
---------------------------------

SELECT CustomerName, Address + ', ' + PostalCode + ' ' + City + ', ' + Country AS Address
FROM Customers; 

or for mysql use

SELECT CustomerName, CONCAT(Address,', ',PostalCode,', ',City,', ',Country) AS Address
FROM Customers;

N.b. SQL aliases are used to give a table, or a column in a table, a temporary name for the duration of the query.

Give tables an alias example
---------------------

SELECT o.OrderID, o.OrderDate, c.CustomerName
FROM Customers AS c, Orders AS o
WHERE c.CustomerName="Around the Horn" AND c.CustomerID=o.CustomerID;

TSQL
=====

JOIN
====

inner join (relationship customer id)
---------------------------------------

 SELECT ORDERS.id, CUSTOMER.customerName, ORDERS.orderDate
FROM ORDERS
INNER JOIN CUSTOMER ON ORDERS.customerID=CUSTOMER.customerID

Left join (relationship product id)
------------------------------------

SELECT PRODUCTS.productName, ORDERS.OrderId
FROM PRODUCTS
LEFT JOIN ORDERS ON PRODUCTS.productId = ORDERS.productId
ORDER BY PRODUCTS.productName

Full join (relationship category id)
-------------------------------------

 SELECT BOOKS.categoryId, BOOKS.title, BOOKCATEGORY.id, BOOKCATEGORY.category
FROM BOOKS
FULL JOIN BOOKCATEGORY
ON BOOKS.categoryId = BOOKCATEGORY.Id

N.b. mySQL does not recognise full join.  instead you can emulate this using the following

SELECT books.categoryId, books.title, bookcategory.id, bookcategory.category
FROM books
LEFT JOIN bookcategory
ON books.categoryId = bookcategory.id
UNION
SELECT books.categoryId, books.title, bookcategory.id, bookcategory.category
FROM books
RIGHT JOIN bookcategory
ON books.categoryId = bookcategory.id

How to use joins
-----------------

inner join - records with matching values in both orders and customer table

left (outer) join - all records in the products table and matching records in the orders table

right (outer) join - all records from the customer table and matching records from the orders table

full (outer) join - all records with a match in either the orders table or the customer table

Union
-------

SELECT description FROM BOOKCOMMENTS
UNION ALL
SELECT description FROM REVIEWS;

Group
-----

SELECT COUNT(id), category
FROM BOOKS
GROUP BY category;

Having
-----

SELECT COUNT(likes), booktitle
FROM REVIEWS
GROUP BY booktitle
HAVING COUNT(likes) > 5
ORDER BY COUNT(likes) DESC;

Select into
-----------

SELECT * INTO MYORDERS
FROM ORDERS
WHERE customerId = 2;

N.b. to copy data from one table into another new table

Case
----

SELECT orderId, quantity,
CASE
    WHEN Quantity > 5 THEN "This order qualifies for free delivery"
    WHEN Quantity = 5 THEN "Order one more to qualify for free delivery"
    ELSE "The delivery charge for under 6 items is £1.99"
END AS QuantityText
FROM ORDERS;

Merge
=====

You can perform delete, update and insert all in one statement.  If you want to merge data from a source table into a target table use the fomular like follows

MERGE StudentTarget AS T
USING StudentSource AS S
ON T.ID = S.ID
WHEN MATCHED THEN
UPDATE SET T.NAME = S.NAME
WHEN NOT MATCHED BY TARGET THEN
INSERT (ID, NAME) VALUES (S.ID, S.NAME)
WHEN NOT MATCHED BY SOURCE THEN 
DELETE

N.b. the statement is mergin on the id field of both tables, 

when the id matches then update the target table with data from the source table, 

when the target table does not match then update the target table with data from the source table.

When the target table contains an id that is not in the source table the data will be deleted.

Date types
===========

MySQL comes with the following data types for storing a date or a date/time value in the database:

DATE - format YYYY-MM-DD
DATETIME - format: YYYY-MM-DD HH:MI:SS
TIMESTAMP - format: YYYY-MM-DD HH:MI:SS
YEAR - format YYYY or YY
SQL Server comes with the following data types for storing a date or a date/time value in the database:

DATE - format YYYY-MM-DD
DATETIME - format: YYYY-MM-DD HH:MI:SS
SMALLDATETIME - format: YYYY-MM-DD HH:MI:SS
TIMESTAMP - format: a unique number

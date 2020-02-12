MySql
======

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

Insert into a table example
==========================

INSERT INTO CUSTOMER (customerId, customerName, review)
VALUES ('2', 'Tom', 'I am happy');

INSERT INTO ORDERS (id, customerId, orderDate) 
VALUES ('10308', '2', '1996-09-18'),
 ('10309', '37', '1996-09-19'),
 ('10310', '77', '1996-09-20');

Statement examples
==========

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

JOIN
====

inner join (relationship customer id)
---------------------------------------

 SELECT ORDERS.id, CUSTOMER.customerName, ORDERS.orderDate
FROM ORDERS
INNER JOIN CUSTOMER ON ORDERS.customerID=CUSTOMER.customerID

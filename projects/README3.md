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

Insert into a table example
==========================

INSERT INTO CUSTOMER (customerId, customerName, review)
VALUES ('2', 'Tom', 'I am happy');

Statement examples
==========

SELECT MIN(price) AS SmallestPrice
FROM BOOKS;

SELECT * FROM CUSTOMER
WHERE CustomerName LIKE 'a%';

N.b. alternatively you can use ending with an a (LIKE '%a';), an or in any position (LIKE '%or%';), r in the second position (LIKE '_r%';), starts with a and at least three characters in length (LIKE 'a__%';), starts with a and ends with o (LIKE 'a%o';), does not start with an a (NOT LIKE 'a%';)

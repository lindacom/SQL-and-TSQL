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

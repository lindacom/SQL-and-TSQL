views and Stored procedures
==============================

views - stores select views as if they were tables. e.g. database has personal information. Rather than chane the permissions on the table you can create a view that just shows information
without the personal information. This:

1. helps with security 
2. hides compleity of statement that is being run
3. is single point of change (when several queries are using the view)

N.b. a stored procedure does not duplicate data  It is just a partial view.


A stored procedure - is a pre-compiled piece of code. Similar to macro.  Group of statemets that you want to run as a single thing.

1. Improves security as instead of adding queries to your code you can put query in stored procedure and reference the stored procedure in your code. This prevents injection attack.
2. Stored procedures are clearly defined and generally faster than running a select statement.


Create a view
--------------

```
use Northwind;
create view offinfo
as select employeeID, name, officeadd, officePhone
from eployees
go

```

N.b. every column in the view has to have a name

to access the view:

```
select * from dbo.offinfo
```

To modify the view ( e.g. to get extra select columns) use the alter statement

```
use Northwind;
go
alter view dbo.vNames
as 
select firstName + ' ' + lastName as fullName, city, country
from dbo.employees;
go

select * from dbo.vNames
```

N.b. you cannt use order by with a view (unless using TOP) as the order cannot be specified in the createion of a view but can by the user of the view
i.e. in the select all from view statement

N.b. use go before and after the create/alter view statement



Create stored procedure in Sql Server
=======================================

1. Stored proceudres are saved in database > programmability > stored procedures (expand the folder to see system stored procedures and other stored procedures)
2. to create a stored procedure Right click stored procedures folder and select new > stored procedure
3. in the create statement enter a name for the stored procedure. N.b built in stored procedures start with sp_ so do not use this naming convention
4. In the begin statement write the statement
5. to run a stored procedure enter exec then the stored procedure name at the end of the file

N.b. you can pass parameters (variables) to stored procedures. They are defined just before the add using the @ symbol followed by variable name followed by type

e.g. @city varchar(20)

```
use Northwind;
go 
alter proc dbo.uspNames
@city varchar(20)
as
begin
select firstName, lastName
from dbo.employees
where city = @city;

select companyName
from dbo.suppliers
where city = @city;
end;
go 

exec dbo.uspNames @city = 'seattle'
```



Naming convention
------------------

The stored procedure name should start with dbo. You can then put sp which stands for stored procedure. You can then follow it with the table name. You can then follow it with 
a description of what it does e.g. create procedure dbo.spPeople_GetAll.

N.b. don't put _ in the name after sp as underscore is reserved for system procedures.

Stored procedure code
-----------------------

create procedure name
as
begin
select query
end

```
create procedure dbo.spPeople_GetAll
as
begin
  select id FirstName, LastName
  from dbo.People
end
```

N.b. use set nocount on; after the begin in the statement so that you dont return the number of rows affected as that is a duplicate of the result set.

N.b. after the create statement you can enter parameters that can be passed in.  Parameters should start with an @ symbol and include type and maximum length. e.g. @FirstName varchar(50)



```
create procedure dbo.spPeople_GetByFirstName
    @FirstName nvarchar(50)
as
begin
  select id FirstName, LastName
  from dbo.People
  where FirstName = @FirstName;
end
```

Click execute to save the stored procedure.Nb if you make changes to the procedure and want to save it you need to change the word create to alter.

N.b when adding more than one parameter seperate them with a comma.
N.b to add a default value for a parameter set it e.g. @FirstName nvarchar(50) = ''

Transactions
------------
If you want to enter a transaction in the stored procedure statemet it means the procedure needs to fully happen otherwise rollback. after the begin statement enter begin trans.

Executing stored procedure
--------------------------
Enter the stored procedure name to execute it:

Right click the database and select new query
enter exec <storedprocedure name>
  
  N.b you may need to do ctrl + shift + r to refresh so that the system can find the stored procedure.
  
  To run the procedure passing in one variable enter e.g exec dbo.spPeople_GetByFirstName 'Mary'
  To run the procedure passing in more than one variable  e.g first name and last name enter exec dbo.spPeople_GetByFirstName 'Mary' 'Black'
  
  Database > security > roles
  ===========================
  
  You can create a role in a stored procedure e.g. create role dbStoredProcedureAccess. Click execute to create the role 
  You can give permissions to a role e.g. grant execute to dbStoredProcedureAccess. Click execute to apply the permission
  You can give the role to a user account by going to the server - security > logins - right click and select new login.  Add the login name and password .  In the sample mapping menu select the database and select the role.  Click ok. 
  
  Roles relate to a database and are located in databae > security > roles. 
  
  N.b even if the user does not have access to view the database table they can still execute the stored procedure if they have permission

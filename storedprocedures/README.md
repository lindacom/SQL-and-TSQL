Stored procedures
=====================
A stored procedure is a pre-compiled piece of code. 
Improves security as instead of adding queries to your code you can put query in stored procedure and reference the stored procedure in your code. This prevents injection attack.
Stored procedures are clearly defined and generally faster than running a select statement.

Create stored procedure in Sql Server
=======================================

Go to database > programmability > stored procedures (expand the folder to see system stored procedures and other stored procedures)
Right click stored procedures folder and select new > stored procedure

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

A stored procedure is a pre-compiled piece of code. Improves security as instead of adding queries to your code you can put query in stored procedure and reference the stored
procedure in your code.

Naming convention
------------------

The stored procedure name should start with dbo. You can then put sp which stands for stored procedure. You can then follow it with the table name. You can then follow it with 
a description of what it does e.g. create procedure dbo.spPeople_GetAll.

N.b. dono't put _ in the name after sp as underscore is reserved for system procedures.

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

Run the stored procedure to save it

Executing stored procedure
--------------------------
Enter the stored procedure name to execute it:

Right click the database ad select new query
enter exec <storedprocedure name>
  
  N.b you may need to do ctrl + shift + r to refresh so that the system can find the stored procedure.

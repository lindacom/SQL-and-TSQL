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

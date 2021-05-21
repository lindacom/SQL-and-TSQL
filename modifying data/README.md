insert - add ew rows
update - modify xitin rows
delete - remove rows

Create a table
-------------

1. define field and type. fields are sparated by comma

```
use Northwind;

go

create table dbo.workers
(
workerID int primary key not null identity (1,1),
fname varchar(30) not null,
info varchar(200) null
);
go

```
2. go to databas and refresh explorer
3. expand the tables folder to see the newly created table

N.b. enterig # befor table name creates a temporary table which is removed when the query windo is closed.

Insert data
--------------

 ```
 insert into dbo.workers (fname, info)
 values ('fred', he is a manager');
 
 select * from dbo.workers
 ```
 
 To add multiple rows to a table at once :
 
 ```
 
insert into dbo.workers (fname, info)
values
('doris', 'she is a temp');
('derek', 'he is a client');

```

insert (copying) data from other tables:

```
insert into dbo.workers(fname)
select firstName from dbo.employees;
```

update data
-------------

Update - uses the WHERE clause. N.b i where is not used in the statement then all of the records will be updated

```
update dbo.workers
set info = 'nothig to say'
where info is null;

select * from bo.workers
```

Delete data
-----------

```
delete dbo.workers
where workerID = 2;
```

N.b. when records are delted ids are not reused.

insert, update and delete statements are nown as transactions.

You can combine these transactons into a single transaction that needs to succeed

put between a begin tran and a commit tran

rollback tran is like clicking cancel.

N.b. if commit has not run then the transaction is still running so you can commit or rollback

N.b. transaction creates a lock on the table which stops others using the table therefore only use transaction without running commit or rollback when
using test databases not in production.


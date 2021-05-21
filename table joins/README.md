Using multiple tables
======================
foreign key - referential integrity - you cannot assign id tht does not exist in another table and 
you cannot delete a key that is being used by another table

Database diagrams in SSMS
---------------------------

1. In SSMS expand the dataases folder > expand database diagrams folder > right clickdatabase diagrams folder and select new database diagram.
2. a list of tables is show. Ctrl + click a table to add a few tables then click add. Close add table box. N.b. right click any line between tables and click properties
3. look at common column between tables. e.g. customer talbe ad order table may have common column customer ID
4. you can save or print the diagram. 
5. Right click the background to add another table to the diagram

N.b. square next to table structure means the table is linked to itse.f  e.g. in an employee table an employee reports to a manager who is an employee
him/herself. so you would refer to the same table twice if you want to find the employe and their manager

composite primary key - where a table has two primary keys. this means the combination of two coluns is unique i.e. they are not unique on their own

Join types
============
1. inner join. N.b. the word inner is optional. you can just use join
2. left join
3. right join
4. full outer join
5. outer join
6. cross join

Join is part of the FROM statement. 

N.b. a join that is written on its own means inner join.

Venn diagrams can be used to represet the join types and the data they return.

Inner join
-----------

```
select c.companyName, o.orderDate
from dbo.customers as c
inner join dbo.orders as o on 
c.customerID = o.customerID;
```

returns all customers with orders 

N.b. you need to prefix table names to columns to distinguish between them so you know which table they are coming from. 
Alternatively you can use an alias and prefix the column name with the alias

Outer joins
----------

left outer join:

returns all customers whether or not they have orders

N.b. the customer row with no orders will just show null
N.b. you can either write left join or left outer join in the statemet
N.b it matters the order in which you put the tables

right outer join:

In a people table right joining a houses table will return all houses whether or not they have people livig in them

N.b. if you switch the able names in the from statement you are effctively changing the statement from left join to right join or vice versa.

Full outer join:
In a people table full outer joining a houses table will return all people (with or without houses) and all houses (with or without people)

N.b. you can enter full outer join or full join in the statement

cross join

N.b. cross join does not use the ON statement

cross join returns everybody's order against every single customer which will produce very large results. This is known as cartesian producst

cross join is rarely used.  it is useful for:
creating a large data of inormation for testing purposes
creating football leagues where every player plays eery player

N.b there is no real relatioship between the data

```
selec c.customerName, o.orderDate
from dbo.customers as c
cross join dbo.orders as o;
```

Joining more than two tables
----------------------------
e.g.
customer table is related to order table on customer id
order table is related to order details table on order id
order details table is related to products tableon product id

N.b if you use inner join on all tables then some information will be mising.  Instead use left join and follow the same join type all the way through

When joining more than to tables you need to use correlation name (table alias)

```
select P.ProductName, C.companyName, o.orderDate, od.quantity, od.unitPrice
from dbo.customers as c
left join dbo.orders as o
on c.customerID = o.customerID
left join db.[order details] as od
on od.orderID = o.orderID
left join dbo.products as P 
on p.productID = od.productID

```

self join:

```
select e.lastName as employee
m.astName as manager
from dbo.employees as e
inner join dbo.employees as m
on e.reportsTo = m.employeeID;

```

Union:

union - amalgamates results (rows) into one (whereas join merges columns)

adding multiple select statements together

```
select companyName, country, phone from dbo.customers
UNION
select lastName, counry, homePhone from dbo.employees
UNION
select companyName, country, phone from dbo.suppliers
```

Nb. must have equal numbr of columns in the select statement to use union

N.b. column names are taken from the first select statement however you can use an alias name intead

N.b. semi colon is not required at the end of each statement as by using union you are createing one statement

N.b. use column with similar types of information (e.g. name and company name) otherwise you will have a mixture of data in the columns.


Union all:

N.b. union sorts data but union al does not.  Union hides duplicate rows

union all - shows duplicates and does not sort them.  Union all takes less rocessing time as it does not have to sort records in order to look 
for duplicates

N.b. use union all rather than union unless you want to get rid of duplicates

Intersect
---------

intersect - row that exists in both sets wil be returned.  This is similar to inner join.

```
select city from dbo.customers
intersect
select city from dbo.suppliers
```

An intersect takes less time to process than an inner join

Except
-------
except - returns rows from tble one that do not appear in table two. This is similar to left join ie. not including interseption

```
selct city from dbo.cutomers
except
select city from dbo.suppliers;
```



returns cities that have customers but no supplirs






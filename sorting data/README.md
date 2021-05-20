DISTINCT - eliminates duplicates
TOP - limit results

order by statement
------------------
e.g. order by city;

```
order by city desc;
```

You can sort on many fields up to 16 in any order statement

```
order by country desc, city asc;
```

You can define the column to sort in by ordinal position of the select statementbut not best practice as column positions may change.

e.g. select name, address, postcode from dbo.customers
order by 2;

This will order by address

N.b. you cannot use a declared column that was declared in a select statement in where statement 
but can in order by statement due to the order in which sql server processes the statement - FROM, WHERE, GROUP BY, SELECT ad the ORDER BY.
i.e. it has ot bee defined yet

Duplicates
-----------
DISTINCT - unique. Sorts column and returns unique values
GROUP BY 

```
select distict country from dbo.customrs;
```

```
select country from dbo.customers group by country;
```

```
select distinct country, city from dbo.customers 
```
returns distinct combination of secified columns

return specified number of rows
--------------------------------

```
select top 10 * from dbo.customers;
```
N.b. to get last 10 you need to use top statement and return in descending order

```
select to 10 percent * from dbo.customers;
```
returns percentage of rows

```
select top 4 with ties * from dbo.customers;
```
returns top 4 plus any others with the same data

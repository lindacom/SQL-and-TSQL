Aggregate functions - summarises values (SUM, AVG, AX, MIN, COUNT)
GROUP BY
HAVING

Sum
----

```
Select sum(freight) as sumF from dbo.orders
```

In SSMS go to help > view help

You can highlight the function e.g. sum and press the F1 key to go to help page for the function

```
select sum(freight) as sumF,
avg(freight) as avgF,
min(freight) as minF,
mas(freight) as masF
from dbo.orders;
```

```
select count(*) from dbo.employees;
```

counts rows in table

```
select count(region) from dbo.employees;
```
N.b. does not count null entries

Before writing query check table to see if it allows null values therefore use coalesce instead

```
avg (colesce(freight, 0)) as avgF,
```

group by
--------

select statement structure:
SELECT 
FROM 
WHERE 
GROUP BY 
HAVING 
ORDER BY

a pneumonic to remember this is sweaty, feet, will, generally, have, odour.

n.B. MIN ON TEXT FIELD WILL GIVE FIRST ONE ALPHABETICALLY
ma used on a text field will give ast one alphabetically
on dates it will give earliest or latest date

To get subtotals groupby whatever you want sub totals on

```
select customerID, sum(freight) as sumf,
avg(freight) as avgF,
min(freight) as minF,
max(freight) as maxF
from dbo.orders
group by customerID
```

N.b. you cannot put aggregate on where clause e.g where sum(freight) > 5000
If you want to filter on an aggregate use HAVING instead

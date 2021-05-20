N.b. quotes are not needed for numbers only dates, text

where clause
------------
e.g. 

```
select * from dbo.customers where city = 'London';
```

```select * from dbo.customer where city = 'London' or city = 'paris';
```

N.b if you have lots of or use in instead e.g.

```
select * from dbo.customers where city in ('londo', 'paris', 'berlin');
```

Also available is not in

dates
-----

N.b. for dates use universal format yyyymmdd in quotes e.g.

```where date >= '19990702'; 
```
N.b. this only includes up to 00.00 hours

```
where date between '19990702' and '19990731';
```
N.b. and including

N.b. order of precedence AND is processed before OR

 e.g where id = 7 or id = 8 and rice > 30

N.b. this will not return price > 30 as it does the and first therefore you need to add brackets

```
where (id=7 or id=8) and price > 30;
```

Null
----
Null - unknow value. Any calculation with a null will return null
N.b. you cannot use = to retrieve null (e.g where price = null). Use is null instead.

```
where region is null;
```
```
where region is not null;
```

In calculations use is null function with brackets, field name and second parameter.

```
city + '' + is null (region, ' ') + ' ' + country as place
```
N.b. alternative to using is null funtion is to use coalesce function.

Coalesce - unknown becomes known

wildcards
---------

when you use wildcards you need to use like or not like

```
where city like 'L%';
```
zero or more letters after L

```
where city like 'L_ _';
```
returns city with two characters after L. N.b. add more _ after each nuber of characters required

Yo can also combine them

```
where city like 'L_%';
```
One or more


Range operator
-------------

'L[aeiou]%'; - starts with L and second letter is any single vowel in the range


```
where city like 'L[a-eo]%
```
returns anythig a-e or an o

```
where city like 'L[^a-eo]%';
```
returns any character not in the range

N.b. shift + 6 creates the carat symbol

%sales% - returns anything with sales anywhere in it

N.b. best practice to use positive sounding filters rather than negative  not i.e. !
negative does not use idex (i.e. non sargable)

sargable - search argument






Checking performance
---------------------
1. In SSMS toolbar go to query > include actual execution plan 
2. run query
3. click execution plan tab

when a query runs it goes through the folowing:
1. parse
2. resolve
3. execution plan
4. optimise

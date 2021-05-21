Common functions
===============
common functions - perform a calculation.  You can pass parameters to a function

functions include:

1. sum
2. avg
3. max
4. min
5. coalesce
6. substring
7. left

There are different types of function:

1. text functions
2. date functions
3. data conversion functions

go - similar to a new paragrap. create alter and drop require that they are the only statement in the batch therefore adding go before and after the statement fixes the problem.

You can find a library of built in functions at database > programmability > functions > systems functions
Text functions
--------------

substring:

the structure is column, starting at character, return umber of characters

```
select substring(firstName, 1, 3) + ' ' + lastName
from dbo.employes
```

left:

left - similar to substring but always starting at character one

```
select left(firsName, 1) + ' '  + lastname
from dbo.employees
```

upper, lower and reverse:

These are all used in the same way

```
select upper(firstName) + ' ' + lastName
from dbo.employees
```

ltrim and rtrim:

ltrim and rtrim - removes spaces from beginning or end

replace - structure is field, word to replace, replacement word

N.b. to use mor than one function you need to nest it

```

select uppr(reverse(firstName)) + ' ' + lastName
from dbo.employees

```

charindex - looks for exact match and returns where in the string it is.

Date functions
----------------

date functions are built in 

dateTime:

```
select getdate();
```
returns year month and day

```
select GETUTCDATE();  
```

date diff structure is datepart(e.g. minutes, hours), firs date, comparison date

```
select orderID, datediff(day, requiredDate, rderDate)
from dboorders
```

year:

year - selects the year from the date e.g. year(orderDate)

day:

day - selects te day from the date e.g. day(orderDate)

month: 
month - selects the month from the date e.g. month(orderDate)

N.b. months are numerical.

N.b. when working with null use coalsce instead of is null

Conversion functions
----------------------

canot add togethr characters of different types e.g. int + string therefore you need to use a conversion function

convert:
The structure is convert structure target type, expression

```
select convert(varchar, 1) + 'a';
```

cast:

```
select cast(1 as varchar) + 'a';
```

Both of the above statements return 1a

convert date:

```
select convert(varchar, getdate());
```

This returns the month, day, year and time

```
//   month/day/year

select convert(varchar, getdate(), 101);

//  day/monthyear
select convert(varchar, getdate(), 103);

// month day, year
select convert(varchar, getdate(), 107);

// time
select convert(varchar, getdate(), 108);
```
```
select datename(weekday, getdate());
```
returns week name

N.b. convert will return an error if date does not exist

try_convert() will return null
 also available are try_parse and try_convert

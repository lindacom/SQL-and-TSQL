Dates
========

formatting dates
-----------------

convert date to ddmmyy format
convert (char(8), orderDate, 3)
N.b. clicking on the convert text and pressing F1 will bring up the help page with other formats. (or click help menu and select how do I and perform search
N.b. enter char 10 and change 3 to 103 to display four digit year

Calculating dates
-------------------

To calculate day of the week and day of the month enter

DATENAME(DW, orderDate) + ' ' +
DATENAME(DD, orderDate) + ' ' +
DATENAME(MM, orderDate) + ' ' +
DATENAME(YY, orderDate) + ' ' +

Calculate time between dates
-----------------------------

To get rough time (does not calculate exact month only year)

DATEADD(YY, DATEDIFF(YY, orderDate, GETDATE()), orderDate)


To get exact time

CASE
WHEN DATEADD(YY, DATEDIFF(YY, orderDate, GETDATE()), orderDate) > GETDATE()
THEN DATEDIFF(YY, orderDate, GETDATE()) -1
ELSE DATEDIFF(YY, orderDate, GETDATE())
END

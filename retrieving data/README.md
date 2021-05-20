Relational database - relate tables.  A relational database has:
primary key - a unique key in table
foreign key - link to primary key in another table

Retrieving data
-----------------

In SSMS:
1. in he menu click new query button
2. in the menu click available databases dropdown and select a database. Alternatively enter use <databasename> at the top of the query
3. Enter query in the screen. (Enter dbo. to see a list of tables and click on the table name to select it)
4. Click the tick button to parse code before executing (if required). This will check that the code is ok. N.b if there is an error double click
  the error message to be taken to where in the code the error is
5. Click the execute button to execute the code
  
Concatination
---------------
Concatination - to combine fields. Use string concatination operator +
e.g. select firstname + lastname from tablename;

Alias
------
To add a column name to the result use as (alias) e.g.
select firstname + lastname as fullname from tablename;
N.b. if you want to have a space in the alias name you need to put the alias in square brackets. 
N.b works in objct names, table names etc but not data

Order of calculation
---------------------
BODMAS is a pneumonic for the order in which calculations  are performed:

Brackets
Orders of - to the power of
Division
Multiplication
Addition
Subtract

To specify order of calculation you can surround in brackets e.g.
select product, price * (stock + order) as sales from dbo.products;

N.b. in SSMS tools > options > text editor > all languages you can add line numbers next to code or turn off word wrap





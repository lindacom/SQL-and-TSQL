importing table from mysql to sql server
===========================================

in mysql:

1. select table 
2. go to export and in the format field select file type csv for MS excel
3. click go button

in ssms:

1. right click on databae
2. select tasks > import flat file
3. click next
4. select file to be imported
5. click next
6. in preview data screen click next
7. in modify columns screen  click next
8. in the summary screen click finish
9. refresh object explorer
10. navigate to databse > tables 
11. right click the newly created table and select select top 1000 rows to view the data

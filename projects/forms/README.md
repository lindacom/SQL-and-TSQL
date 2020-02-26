Form action
===========

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  
So, the $_SERVER["PHP_SELF"] sends the submitted form data to the page itself, instead of jumping to a different page. This way, the user will get error messages on the same page as the form.

$_SERVER["PHP_SELF"] exploits can be avoided by using the htmlspecialchars() function.

The htmlspecialchars() function converts special characters to HTML entities. This means that it will replace HTML characters like < and > with &lt; and &gt;. This prevents attackers from exploiting the code by injecting HTML or Javascript code (Cross-site Scripting attacks) in forms.
  
  
SQL injection
==============
To protect a web site from SQL injection, you can use SQL parameters.

insert into statement in php
-------------------------------

$stmt = $dbh->prepare("INSERT INTO Customers (CustomerName,Address,City)
VALUES (:nam, :add, :cit)");
$stmt->bindParam(':nam', $txtNam);
$stmt->bindParam(':add', $txtAdd);
$stmt->bindParam(':cit', $txtCit);
$stmt->execute();

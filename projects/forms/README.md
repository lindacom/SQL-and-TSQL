Form security
==============

1. Validate data input (ie. using regex) and use password encryption
2. Sanitize url parameters
3. Use variables to store sanitized data for reuse
4. Store form token in user's session 

Password security and encrption
-----------------
1. Use one way encryption, use salt string to increase security. enter the script

password_hash($password, password_BCRYPT)

password_verify($password, $existing_hash)

2. Set password requirements (length, alphanumeric characters 
3. Get the user to enter the passowrd twice
4. authentication - lock account after 3 failed password attepts
5. password reset token - ask security questions or access email address to send email with new password or send emi to user with a reset token (request username and generate unique token - don't let theuser know whether account exits or not), email ul to user that contains a token, url shoud grant access to set new password - the original password will still work util the password has been reset n.b. you need to use an emailer to send out the email.

Form action
-----------

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  
So, the $_SERVER["PHP_SELF"] sends the submitted form data to the page itself, instead of jumping to a different page. This way, the user will get error messages on the same page as the form.

$_SERVER["PHP_SELF"] exploits can be avoided by using the htmlspecialchars() function.

The htmlspecialchars() function converts special characters to HTML entities. This means that it will replace HTML characters like < and > with &lt; and &gt;. This prevents attackers from exploiting the code by injecting HTML or Javascript code (Cross-site Scripting attacks) in forms.

File upload abuse
-----------------
For a file to accept uploads it should have <form enctype multipart/form-data> and it should have <input type="file">

To avoid upload abuse 

1. set quntity, file type, access to files, require user authenitcation, limit size, use hidden input, upload to a temp location, set file permissions (check mime type file extension, image dimensions, inspect file contents)
2. Sanitise filename (or replace filename with a new name). Filename should contain special characters
3. relocate file fro temp location to a secure location

For more information see http:/php.net/manual/en/ref.filesystem.php

Form token
-----------
Store form token in user's session to be able to ee that the data came from the form. To do this add a hidden field to the form with the form token value. Compare the session form token with the submitted form token. (csrf token)

Store sanitized data
------------------------
Label variables to store santized data for reuse (or use associative arrays)

Session and cookies
---------------------

Cookies - set, encrypt, sign - put non sensitive data only in cookies.  Set cookies with expiration date, path, http ony cookies, domain, secure. Eter settings as variables and then set the cookie.

Sessions - sessions are more secure than cookie. A session id is sent to the browser. Sesion id hould only com rom http only cookie (use SSL and secure cookies).  It is a good ide to regenerate session identifier on login and epire and remove sessions to increase security.

  
  
SQL injection
==============
To protect a web site from SQL injection, you can use SQL parameters. (Three commands enable users to perform code injection eval () (turns string into php so avoid usig this command), includ file and require file)

Sanitize url parameters
-----------------------
When working with dynamic data you should sanitize url parameters for security. (this adds % to spaces for example)
e.g. use my_sql_real_escape_string to santise data. Us prepared statements to specify input

How to insert into statement in php
-------------------------------

$stmt = $dbh->prepare("INSERT INTO Customers (CustomerName,Address,City)
VALUES (:nam, :add, :cit)");
$stmt->bindParam(':nam', $txtNam);
$stmt->bindParam(':add', $txtAdd);
$stmt->bindParam(':cit', $txtCit);
$stmt->execute();

Keep code secure
-----------------

N.b if you don't have an index php file in each directory then the server will display a full list of files in the directory.

N.b. when a url is first accessed in a browser it is a GET request.  When the user perfors a form submit it is a POST request.

N.b. remote system eecution - the following commands allow you to access the underlying operating system - exec, passthru, popen, proc_open, shell_exec, backtick symbol, sysem

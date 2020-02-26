<?php

if(isset($_POST['Login'])) { 
$username = $_POST['txtuser']; //txtuser is the name in the form field
$password = $_POST['txtpass']; //txtpass is the name in the form field
$username = stripslashes($username); //this removes the formatting
$password = stripslashes($password);

//check the username, password entries in your database table. you need to change the name signup to the name of your table and make sure you have the username and password fields in your table
$checkuser = "SELECT * FROM tbl_customer WHERE CustomerName ='$username' AND password ='$password' ";

 
 
$run = mysqli_query($connect, $checkuser);
if (mysqli_num_rows($run)>0) {
$_SESSION['user_name'] = $username;

header('Location:http://text.com/test.php?username=' .
$_SESSION['user_name']);
//the header location takes the user to my homepage on successful login.  you can change this to the page you want them to go to in your website
}
else{
echo "Username and/or password do not match! Try again!";

}
}
mysqli_close($connect);
?>

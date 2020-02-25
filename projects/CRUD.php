<?php

//Establishes the connection - this CRUD example is from the microsoft tutorial - need to change table names below.
$connect = mysqli_connect("shost", "database", "password", "table");



//Insert Query

$stmt = $connect->prepare("INSERT INTO tbl_customer (CustomerName, review) VALUES (?, ?)");       
     
$stmt->bind_param("ss", $CustomerName, $review);
$CustomerName = "Jake";
$review = "hello";
$stmt->execute();

/* $getResults= mysqli_query($connect, $tsql, $params);
$rowsAffected = msql_affected_rows($getResults); */

echo "Inserting a new row into table";




//Update Query

$stmt = $connect->prepare("UPDATE tbl_customer SET review = ? WHERE CustomerName = ?");
$stmt->bind_param("ss", $review, $CustomerName);
$CustomerName = "Nikita";
$review = "This is my second review";
$stmt->execute();

echo "Updating review for user ";






//Delete Query


$stmt = $connect->prepare("DELETE FROM tbl_customer WHERE CustomerName = ?");
$stmt->bind_param("s", $CustomerName);

$CustomerName  = "Mike";

$stmt->execute();

echo "Deleting user";


$stmt->close();


//Read Query

$stmt= "SELECT CustomerId, CustomerName, review FROM tbl_customer";
$result = $connect->query($stmt);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["CustomerId"]. " - Name: " . $row["CustomerName"]. " " . $row["review"]. "<br>";
    }
} else {
    echo "0 results";
}
$connect->close();

?>

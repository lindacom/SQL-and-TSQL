<?php
	$connect = mysqli_connect("host", "database", "password", "username");

	// Check For Submit
	if(isset($_POST['submit'])){
		// Get form data
		$comment = mysqli_real_escape_string($connect, $_POST['comment']);
              $booktitle = mysqli_real_escape_string($connect, $_POST['booktitle']);
		
             $query = "INSERT INTO reviews(description, booktitle) VALUES('$comment', '$booktitle')";

		if(mysqli_query($connect, $query)){
			echo 'Your review has been submitted and you will soon be redirected to the library landing page';
header('Refresh: 5;url=http://mysite.com');
		} else {
			echo 'ERROR: '. mysqli_error($connect);
		}
	}
?>

<?php
if (isset($_SESSION["user"])) {
    echo "<p>Welcome back, " . $_SESSION["user"] . "!<br>";
    echo '<a href="process.php?action=logout">Logout</a></p>';
}
else {
?>
  <form action="process.php?action=login" method="post">
  ENTER THE REST OF THE FORM TAGS
  
  <?php
}
?>

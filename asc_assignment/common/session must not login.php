<?php

// Check if the user is logged in (customer_id is set in the session)
if (isset($_SESSION['customer_id'])) {
  // If the user is logged in, display "You must log out first" message
  echo '<p>You Have Log In !</p>';
  // Redirect them to a different page (e.g., homepage or any other page)
  header('Location:Login Main Page.php'); // Change "index.php" to the desired page URL
  exit();
}
?>
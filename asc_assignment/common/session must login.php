<?php

// Check if the user is logged in (customer_id is set in the session)
if (isset($_SESSION['customer_id'])) {
  echo '<p>Welcome, ' . $_SESSION['customer_id'] . '!</p>';
} else {
  // If the user is not logged in, display "Please Login First" message
  echo "<script>alert('Please Login First');window.location.href='Login.php';</script>";
  exit();
}
?>
<div class="navbar">
  <ul>
    <?php
    // Display different menu items based on the session status (logged in or not)
    if (isset($_SESSION['customer_id'])) {
      // Display user-specific menu items if logged in
      echo '<li><a href="Login Main Page.php">Main Page</a></li>';
      echo '<li><a href="#">Welcome, ' . $_SESSION['customer_id'] . '</a></li>';
      echo '<li><a href="Change Password.php">Change Password</a></li>';
      echo '<li><a href="Delete Account.php">Delete Account</a></li>';
      echo '<li><a href="action/logout-customer.php">Log Out</a></li>';
    } else {
      // Display general menu items if not logged in
      echo '<li><a href="Main Page.php">Main Page</a></li>';
      echo '<li><a href="Sign Up.php">Sign Up</a></li>';
      echo '<li><a href="Login.php">Login</a></li>';
      echo '<li><a href="Staff Login.php">Staff Login</a></li>';
    }
    ?>
    <li><a href="Contact Us.php">Contact Us</a></li>
    <li><a href="Search.php">Search</a></li>
  </ul>
</div>

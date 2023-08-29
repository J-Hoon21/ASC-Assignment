<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ASC E-Book - Staff Main Page</title>
  <link rel="stylesheet" href="../common/css/Main Page CSS.css">
</head>
<body>
<?php
// Start the session
session_start();
 include '../common/staff navigation bar.php';
?>

  <div class="content">
    <header>
      <h1>ASC E-Book - Staff Main Page</h1>
    </header>

    <main>
      <h2>Welcome, Staff!</h2>
      <p>Here you can perform various tasks:</p>
      <ul>
        <li><a href="Add Book.php">Add new book</a></li>
        <li><a href="View Book.php">View book</a></li>
        <li><a href="View Contacts.php">View contacts</a></li>
		<li><a href="Staff Create.php">Add new staff</a></li>
		<li><a href="Change Password.php">Change Password</a></li>
		<li><a href="Delete Account.php">Delete Account</a></li>
		<li><a href="action/logout.php">Logout</a></li>
      </ul>
    </main>

    <footer>
      <p>&copy; 2023 ASC E-Book. All rights reserved.</p>
    </footer>
  </div>
</body>
</html>
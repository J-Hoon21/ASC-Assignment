<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ASC E-Book - Change Password</title>
   <link rel="stylesheet" href="common/css/Main Page CSS.css">
  <style>
    /* CSS styles to align the input boxes */
    form {
      display: flex;
      flex-direction: column;
      max-width: 300px;
      margin: 0 auto;
    }

    .form-group {
      margin-bottom: 15px;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input[type="password"] {
      width: 100%;
      padding: 8px;
      font-size: 14px;
    }

    button[type="submit"] {
      padding: 10px;
      background-color: #5C6AC4;
      color: #fff;
      border: none;
      cursor: pointer;
      font-size: 16px;
    }
  </style>
</head>
<body>
<?php
	// Start the session
	session_start();
	// Include the navigation bar
	include 'common/navigation bar.php';
?>

 <div class="content">
    <header>
      <h1>ASC E-Book</h1>
    </header>

    <main>
	  
      <h2>Change Password</h2>
      <form action="action/changepass-customer.php" method="post">
        <div class="form-group">
          <label for="current_password">Current Password:</label>
          <input type="password" id="old_password" name="old" required>
        </div>

        <div class="form-group">
          <label for="new_password">New Password:</label>
          <input type="password" id="new_password" name="new" required>
        </div>

        <div class="form-group">
          <label for="confirm_password">Confirm New Password:</label>
          <input type="password" id="confirm_password" name="confirm" required>
        </div>

        <button type="submit">Change Password</button>
      </form>
    </main>

    <footer>
      <p>&copy; 2023 ASC E-Book. All rights reserved.</p>
    </footer>
  </div>
</body>
</html>

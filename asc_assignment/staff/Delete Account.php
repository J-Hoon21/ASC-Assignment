<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ASC E-Book - Delete Account</title>
  <link rel="stylesheet" href="../common/css/Main Page CSS.css">
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
 include '../common/navigation bar.php';
 include '../common/session must login.php';
?>

  <div class="content">
    <header>
      <h1>ASC E-Book</h1>
    </header>

    <main>
      <h2>Delete Account</h2>
      <form action="action/deleteaccount-staff.php" method="post">
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required>
        </div>

        <button type="submit">Delete Account</button>
      </form>
    </main>

    <footer>
      <p>&copy; 2023 ASC E-Book. All rights reserved.</p>
    </footer>
  </div>
</body>
</html>

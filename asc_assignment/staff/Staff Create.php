<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ASC E-Book - Login</title>
  <link rel="stylesheet" href="../common/css/Main Page CSS.css">
  <style>
    /* CSS styles to align the input boxes */
    form {
      display: flex;
      flex-direction: column;
</style>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ASC E-Book - Sign Up</title>
   <link rel="stylesheet" href="common/css/Main Page CSS.css">
</head>
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

    input[type="text"],
    input[type="email"],
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
  <div class="navbar">
    <ul>
      <li><a href="#sign-up">Sign Up</a></li>
      <li><a href="#login">Login</a></li>
      <li><a href="#staff-login">Staff Login</a></li>
      <li><a href="#contact-us">Contact Us</a></li>
      <li><a href="#search">Search</a></li>
    </ul>
  </div>

  <div class="content">
    <header>
      <h1>ASC E-Book</h1>
    </header>

    <main>
      <h2>Sign Up</h2>
      <form action="action/create-staff.php" method="post""> <!-- Point the form to create-customer.php -->
        <div class="form-group">
          <label for="username">Username:</label>
          <input type="text" id="username" name="username" required>
        </div>

        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required>
        </div>

        <div class="form-group">
          <label for="confirm_password">Confirm Password:</label>
          <input type="password" id="confirm_password" name="confirm_password" required>
        </div>

        <button type="submit"  name="submit" type="submit">Sign Up</button>
      </form>
    </main>

    <footer>
      <p>&copy; 2023 ASC E-Book. All rights reserved.</p>
    </footer>
  </div>
</body>
</html>
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

    input[type="email"],
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
  <div class="navbar">
    <ul>
      <li><a href="#sign-up">Sign Up</a></li>
      <li><a href="#login">Login</a></li>
      <li><a href="#staff-login">Staff Login</a></li>
      <li><a href="#contact-us">Contact Us</a></li>
      <li><a href="#search">Search</a></li>
    </ul>
  </div>

  <div class="content">
    <header>
      <h1>ASC E-Book</h1>
    </header>

    <main>
      <h2>Staff Login</h2>
      <form action="staff/action/login-staff.php" method="post">
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required>
        </div>

        <button type="submit">Login</button>
      </form>
    </main>

    <footer>
      <p>&copy; 2023 ASC E-Book. All rights reserved.</p>
    </footer>
  </div>
</body>
</html>
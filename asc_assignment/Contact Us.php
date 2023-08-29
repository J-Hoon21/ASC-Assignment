<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ASC E-Book - Contact Us</title>
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

    input[type="text"],
    input[type="email"],
	input[type="tel"],
    textarea {
      width: 100%;
      padding: 8px;
      font-size: 14px;
    }

    textarea {
      resize: vertical; /* Allow vertical resizing of the textarea */
    }

    input[type="file"] {
      margin-top: 5px;
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
 include 'common/navigation bar.php';
?>

  <div class="content">
    <header>
      <h1>ASC E-Book</h1>
    </header>

    <main>
      <h2>Contact Us</h2>
      <form action="action/contact.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" required>
        </div>

        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required>
        </div>
		
		<div class="form-group">
		<label for="contact">Contact Number:</label>
		<input type="tel" id="contact" name="contact" pattern="[0-9]+" required>
		<small>Only numeric values are allowed.</small>
		</div>
		
		<div class="form-group">
          <label for="email">Subject:</label>
          <input type="text" id="subject" name="subject" required>
        </div>

        <div class="form-group">
          <label for="message">Message:</label>
          <textarea id="message" name="message" rows="5" required></textarea>
        </div>

        <!-- Add input field for uploading files -->
        <div class="form-group">
          <label for="file">Optional: Upload File (PDF only):</label>
          <input type="file" id="file" name="file" accept=".pdf">
        </div>

        <button type="submit"  name="submit" type="submit">Submit</button>
      </form>
    </main>

    <footer>
      <p>&copy; 2023 ASC E-Book. All rights reserved.</p>
    </footer>
  </div>
</body>
</html>
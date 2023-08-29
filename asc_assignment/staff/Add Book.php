<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ASC E-Book - Add Book</title>
  <link rel="stylesheet" href="../common/css/Main Page CSS.css">
  <style>
    /* CSS styles to align the input boxes */
    form {
      display: flex;
      flex-direction: column;
      max-width: 500px; /* Adjust the max-width to your preference */
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
    input[type="date"] {
      width: 100%;
      padding: 10px; /* Adjust the padding to your preference */
      font-size: 14px;
    }

    textarea {
      width: 100%;
      padding: 10px; /* Adjust the padding to your preference */
      font-size: 14px;
    }

    .custom-file-upload {
      border: 1px solid #ccc;
      display: inline-block;
      padding: 6px 12px;
      cursor: pointer;
      background-color: #5C6AC4;
      color: #fff;
      font-size: 16px;
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
    <!-- Navigation links for staff -->
  </div>

  <div class="content">
    <header>
      <!-- Header for the add book page -->
    </header>

    <main>
      <h2>Add Book</h2>
      <form action="action/book-add.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="book_cover">Book Cover:</label>
          <!-- Input for book cover image -->
          <label class="custom-file-upload">
            <input type="file" id="book_cover" name="book_cover" accept="image/*">
            Upload Image
          </label>
        </div>

        <div class="form-group">
          <label for="book_name">Book Name:</label>
          <input type="text" id="book_name" name="book_name" required placeholder="Enter the book name">
        </div>

        <div class="form-group">
          <label for="book_author">Author:</label>
          <input type="text" id="book_author" name="book_author" required placeholder="Enter the author name">
        </div>

        <div class="form-group">
          <label for="book_publish">Publish Date:</label>
          <input type="date" id="book_publish" name="book_publish" required>
        </div>

        <div class="form-group">
          <label for="book_genre">Genre:</label>
          <input type="text" id="book_genre" name="book_genre" required placeholder="Enter the book genre">
        </div>

        <div class="form-group">
          <label for="book_language">Language:</label>
          <input type="text" id="book_language" name="book_language" required placeholder="Enter the book language">
        </div>

        <div class="form-group">
          <label for="book_summary">Summary:</label>
          <textarea id="book_summary" name="book_summary" rows="10" required placeholder="Enter the book summary"></textarea>
        </div>
        <button type="submit"   name="submit" type="submit">Add Book</button>
      </form>
    </main>

    <footer>
      <p>&copy; 2023 ASC E-Book. All rights reserved.</p>
    </footer>
  </div>
</body>
</html>
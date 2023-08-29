<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book - ASC E-Book</title>
    <link rel="stylesheet" href="../common/css/Main Page CSS.css">
</head>
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
<body>
<?php
// Start the session
session_start();
include '../common/navigation bar.php';
include '../common/session must not login.php';

if (isset($_GET['book_id'])) {
    $bookId = $_GET['book_id'];

    // Fetch book data based on bookId (replace with your fetch logic)
    require "action/conn.php";
    $sql = "SELECT * FROM book WHERE book_id = '$bookId'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $book = $result->fetch_assoc();

        $bookCover = "../" . $book['book_cover']; // Prepend "../" to the book cover URL
        $bookName = $book['book_name'];
        $bookAuthor = $book['book_author'];
        $bookPublishDate = $book['book_publish_date'];
        $bookGenre = $book['book_genre'];
        $bookLanguage = $book['book_language'];
        $bookSummary = $book['book_summary'];
    } else {
        echo "No book found with the provided ID.";
        exit(); // Stop further execution if book is not found
    }
} else {
    echo "No book ID provided.";
    exit(); // Stop further execution if book ID is not provided
}
?>

<div class="content">
    <header>
        <h1>ASC E-Book</h1>
    </header>

    <main>
        <h2>Edit Book</h2>
        <form action="action/book-modify.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="book_id" value="<?php echo $bookId; ?>">
            
            <div class="form-group">
                <label for="book_cover">Book Cover:</label>
				<img src="<?php echo $bookCover; ?>" alt="Book Cover" width="300"><br>
				<input type="file" id="book_cover" name="book_cover" accept="image/*">
				</label>
				</div>
            
            <div class="form-group">
                <label for="book_name">Book Name:</label>
                <input type="text" id="book_name" name="book_name" value="<?php echo $bookName; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="book_author">Author:</label>
                <input type="text" id="book_author" name="book_author" value="<?php echo $bookAuthor; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="book_publish">Publish Date:</label>
                <input type="date" id="book_publish" name="book_publish" value="<?php echo $bookPublishDate; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="book_genre">Genre:</label>
                <input type="text" id="book_genre" name="book_genre" value="<?php echo $bookGenre; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="book_language">Language:</label>
                <input type="text" id="book_language" name="book_language" value="<?php echo $bookLanguage; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="book_summary">Summary:</label>
                <textarea id="book_summary" name="book_summary" rows="10" required><?php echo $bookSummary; ?></textarea>
            </div>
            
            <button type="submit" name="submit">Save Changes</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2023 ASC E-Book. All rights reserved.</p>
    </footer>
</div>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASC E-Book - View Books</title>
    <link rel="stylesheet" href="../common/css/Main Page CSS.css">
	<link rel="stylesheet" href="../common/css/Table CSS.css">
</head>
<body>
<?php
// Start the session
session_start();
include '../common/navigation bar.php';
include '../common/session must not login.php';
?>

  <div class="content">
    <header>
      <h1>ASC E-Book</h1>
    </header>

    <main>
      <h2>View Books</h2>
      <form action="" method="GET">
        <label for="search">Search:</label>
        <input type="text" id="search" name="q" value="<?php echo isset($_GET['q']) ? $_GET['q'] : ''; ?>">
        <button type="submit">Search</button>
      </form>

      <table>
        <thead>
          <tr>
            <th>Book Cover</th>
            <th>Book Name</th>
            <th>Book Author</th>
            <th>Publish Date</th>
            <th>Genre</th>
            <th>Language</th>
            <th>Summary</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
             require "action/conn.php";
            // Fetch book data from the database based on search query
            if (isset($_GET['q'])) {
                $search_query = $_GET['q'];
                $sql = "SELECT * FROM book WHERE 
                        book_id LIKE '%$search_query%' OR
                        book_name LIKE '%$search_query%' OR
                        book_author LIKE '%$search_query%' OR
                        book_publish_date LIKE '%$search_query%' OR
                        book_genre LIKE '%$search_query%' OR
                        book_language LIKE '%$search_query%' OR
                        book_summary LIKE '%$search_query%'";
            } else {
                // If no search query is provided, fetch all book information
                $sql = "SELECT * FROM book";
            }

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // Generate the HTML for each book
              while ($book = $result->fetch_assoc()) {
                echo "<tr data-book-id='" . $book['book_id'] . "'>";
				echo "<td><img src='../" . $book['book_cover'] . "' alt='Book Cover' width='100'></td>";
                echo "<td>" . $book['book_name'] . "</td>";
                echo "<td>" . $book['book_author'] . "</td>";
                echo "<td>" . $book['book_publish_date'] . "</td>";
                echo "<td>" . $book['book_genre'] . "</td>";
                echo "<td>" . $book['book_language'] . "</td>";
                echo "<td>" . $book['book_summary'] . "</td>";
                echo "<td><a href='Edit Book.php?book_id=" . $book['book_id'] . "'>Edit</a></td>";
                echo "<td><a href='action/book-delete.php?book_id=" . $book['book_id'] . "'>Delete</a></td>";
                echo "</tr>";
              }
            } else {
              echo "<tr><td colspan='9'>No books found in the database.</td></tr>";
            }

            // Close the database connection
            $conn->close();
          ?>
        </tbody>
      </table>
    </main>

    <footer>
      <p>&copy; 2023 ASC E-Book. All rights reserved.</p>
    </footer>
  </div>

</body>
</html>

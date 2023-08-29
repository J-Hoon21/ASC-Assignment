<?php
// Function to generate the HTML for book details
function generateBookHTML($book) {
  $book_cover = $book["book_cover"];
  $book_name = $book["book_name"];
  $book_author = $book["book_author"];
  $book_publish = $book["book_publish_date"];
  $book_genre = $book["book_genre"];
  $book_language = $book["book_language"];
  $book_summary = $book["book_summary"];

  $html = '<div class="book-info">';
  $html .= '<img src="' . $book_cover. '" alt="Cover">';
  $html .= '<h2>Name: ' . $book_name . '</h2>';
  $html .= '<p>Author: ' . $book_author . '</p>';
  $html .= '<p>Publish Date: ' . $book_publish . '</p>';
  $html .= '<p>Genre: ' . $book_genre . '</p>';
  $html .= '<p>Language: ' . $book_language . '</p>';
  $html .= '<p>Summary: ' . $book_summary . '</p>';
  $html .= '</div>';
  return $html;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ASC E-Book</title>
  <link rel="stylesheet" href="common/css/Main Page CSS.css">
</head>
<body>
<?php
// Start the session
session_start();
 include 'common/navigation bar.php';
 include 'common/session must not login.php';
?>

  <div class="content">
    <header>
      <h1>ASC E-Book</h1>
    </header>

    <main>
      <div class="book-container">
        <?php
          // db_connection.php
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "asc_assignment";

          // Create connection
          $conn = new mysqli($servername, $username, $password, $dbname);

          // Check connection
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

          // Get the page number from the URL query string (if provided)
          $page = isset($_GET['page']) ? intval($_GET['page']) : 1;

          // Calculate the starting index for the books to display
          $start_index = ($page - 1) * 6;

          // Fetch book data from the database with a LIMIT clause
          $sql = "SELECT * FROM book LIMIT $start_index, 6";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // Generate the HTML for each book
            while ($book = $result->fetch_assoc()) {
              echo generateBookHTML($book);
            }
          } else {
            echo "No books found in the database.";
          }

          // Close the database connection
          $conn->close();
        ?>
      </div>

      <!-- Pagination Links -->
      <div class="pagination">
        <?php
          // Display pagination links
          if ($page > 1) {
            echo '<a href="?page=' . ($page - 1) . '">Previous</a>';
          }

          // Check if there are more books to display on the next page
          $conn = new mysqli($servername, $username, $password, $dbname);
          $sql_next_page = "SELECT * FROM book LIMIT " . ($start_index + 6) . ", 1";
          $result_next_page = $conn->query($sql_next_page);
          if ($result_next_page->num_rows > 0) {
            echo '<a href="?page=' . ($page + 1) . '">Next</a>';
          }

          // Close the database connection
          $conn->close();
        ?>
      </div>
    </main>

    <footer>
      <p>&copy; 2023 ASC E-Book. All rights reserved.</p>
    </footer>
  </div>
</body>
</html>
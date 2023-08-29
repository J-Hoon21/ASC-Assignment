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
  $html .= '<img src="' . $book_cover . '" alt="Cover">';
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
<?php
// Search function to fetch matching books
function searchBooks($searchQuery) {
     // Connect to the database
    require "action/conn.php";

    // Prepare the search query (make it safe for database use)
    $safeSearchQuery = mysqli_real_escape_string($conn, $searchQuery);

    // Query to fetch books matching the search criteria
    $sql = "SELECT * FROM book
            WHERE book_name LIKE '%$safeSearchQuery%'
            OR book_author LIKE '%$safeSearchQuery%'
            OR book_genre LIKE '%$safeSearchQuery%'
            OR book_language LIKE '%$safeSearchQuery%'";

    // Execute the SQL query
    $result = $conn->query($sql);

    // Check if any matching books were found
    if ($result->num_rows > 0) {
        $books = array();
        while ($row = $result->fetch_assoc()) {
            $books[] = $row;
        }
        // Close the database connection
        $conn->close();
        return $books;
    } else {
        // Close the database connection
        $conn->close();
        return array(); // Empty array to indicate no matching books found
    }
}

// Check if the search form is submitted (and $_POST["search"] is set)
if (isset($_POST["search"])) {
    $searchQuery = $_POST["search"];
    $searchResults = searchBooks($searchQuery);
} else {
    $searchResults = array(); // Empty array to display all books initially
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="common/css/Main Page CSS.css">
</head>
<body>
  <?php
    // Include the navigation bar and session handling code
    include 'common/navigation bar.php';
    include 'common/session must not login.php';
  ?>

  <div class="content">
    <header>
      <h1>ASC E-Book</h1>
    </header>

    <main>
      <!-- Search Form -->
      <form method="post">
        <input type="text" name="search" placeholder="Search by name, author, genre, or language">
        <button type="submit">Search</button>
      </form>

      <!-- Book Results -->
      <div class="book-container">
        <?php
          // Display search results if available
          if (!empty($searchResults)) {
              foreach ($searchResults as $book) {
                  echo generateBookHTML($book);
              }
          } else {
              echo "No matching books found.";
          }
        ?>
      </div>
    </main>

    <footer>
      <!-- Footer content -->
    </footer>
  </div>
</body>
</html>

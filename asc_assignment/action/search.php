<?php
// Function to search for books
function searchBooks($searchQuery) {
    // Connect to the database
    require "conn.php";

    // Prepare the search query to avoid SQL injection
    $searchQuery = mysqli_real_escape_string($conn, $searchQuery);

    // SQL query to search for books
    $sql = "SELECT * FROM book
            WHERE book_name LIKE '%$searchQuery%'
            OR book_author LIKE '%$searchQuery%'
            OR book_genre LIKE '%$searchQuery%'
            OR book_language LIKE '%$searchQuery%'";

    // Execute the SQL query
    $result = mysqli_query($conn, $sql);

    // Check if there are any matching books
    if (mysqli_num_rows($result) > 0) {
        // Fetch and return the books
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        // No matching books found
        return array();
    }
}
?>

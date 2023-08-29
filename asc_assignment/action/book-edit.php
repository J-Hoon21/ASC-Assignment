<?php
// Check if the form is submitted (and $_POST["submit"] is set)
if (isset($_POST["submit"])) {
    // Connect to the database
    require "conn.php";

    // Store data submitted via the form
    $bookId = $_POST["book_id"];
    $bookName = $_POST["book_name"];
    $bookAuthor = $_POST["book_author"];
    $bookPublish = $_POST["book_publish"];
    $bookGenre = $_POST["book_genre"];
    $bookLanguage = $_POST["book_language"];
    $bookSummary = $_POST["book_summary"];

    // Update the book details in the database
    $sql = "UPDATE books SET
            book_name = '$bookName',
            book_author = '$bookAuthor',
            book_publish_date = '$bookPublish',
            book_genre = '$bookGenre',
            book_language = '$bookLanguage',
            book_summary = '$bookSummary'
            WHERE book_id = '$bookId'";

    // Execute the SQL query
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Book details updated successfully.');</script>";
    } else {
        echo "<script>alert('Failed to update book details. Please try again later.');</script>";
    }
}
?>

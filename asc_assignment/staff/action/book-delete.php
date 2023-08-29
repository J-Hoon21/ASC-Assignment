<?php
// Check if the book ID is provided via GET request
if (isset($_GET["book_id"])) {
    // Connect to the database
    require "conn.php";

    // Get the book ID from the GET request
    $bookId = $_GET["book_id"];

    // Query to get the book cover image filename from the database
    $sql = "SELECT book_cover FROM book WHERE book_id = '$bookId'";
    $result = mysqli_query($conn, $sql);
    
    // Check if the book exists in the database
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $bookCoverFilename = $row["book_cover"];

        // Check if the book cover is used by other books
        $coverUsageSql = "SELECT COUNT(*) AS num_books FROM book WHERE book_cover = '$bookCoverFilename'";
        $coverUsageResult = mysqli_query($conn, $coverUsageSql);
        $coverUsageRow = mysqli_fetch_assoc($coverUsageResult);
        $numBooksUsingCover = $coverUsageRow["num_books"];

        // Show an alert with the appropriate message based on the number of books using the cover
        if ($numBooksUsingCover == 1) {
			echo "<script>alert('Number of books using this cover: $numBooksUsingCover');</script>";
            echo "<script>alert('Book and cover deleted successfully.');window.location.href='your_books_list_page.php';</script>";
        } else {
			echo "<script>alert('Number of books using this cover: $numBooksUsingCover');</script>";
            echo "<script>alert('Book deleted successfully.');window.location.href='your_books_list_page.php';</script>";
        }

        // Delete the book from the database
        $deleteSql = "DELETE FROM book WHERE book_id = '$bookId'";
        if ($conn->query($deleteSql) == TRUE) {
            if ($numBooksUsingCover == 1) {
                // Delete the book cover image from the file system if it's the last book using this cover
                $upload_directory = "../../"; // Relative to the root of your website
                $bookCoverFilePath = $upload_directory . $bookCoverFilename;

                if (file_exists($bookCoverFilePath)) {
                    unlink($bookCoverFilePath);
                }
            }
        } else {
            echo "<script>alert('Failed to delete the book. Please try again later.');window.location.href='your_books_list_page.php';</script>";
        }
    } else {
        echo "<script>alert('Book not found.');window.location.href='your_books_list_page.php';</script>";
    }
} else {
    echo "<script>alert('Invalid request.');window.location.href='your_books_list_page.php';</script>";
}
?>

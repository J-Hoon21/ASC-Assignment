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

    // File Upload Handling for Book Cover
    $unique_filename2 = ""; // Default value

    if ($_FILES["book_cover"]["error"] === UPLOAD_ERR_OK) {
        $allowedExtensions = array("jpg", "jpeg", "png", "gif");
        $file = $_FILES["book_cover"];
        $fileName = $file["name"];
        $fileTmpName = $file["tmp_name"];
        $fileError = $file["error"];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // Check if the file is an image
        if (!in_array($fileExtension, $allowedExtensions)) {
            die("<script>alert('Book Image upload failed. Only JPG, JPEG, PNG, and GIF images are allowed.');window.history.go(-1);</script>");
        }

        // Set the upload directory
        $upload_directory = "../../files/img/"; // Relative to the root of your website

        // Generate a unique filename to prevent conflicts
        $unique_filename = $upload_directory . $fileName;
        $unique_filename2 = "files/img/" . $fileName;

        // Move the uploaded file to the destination folder
        if (!move_uploaded_file($fileTmpName, $unique_filename)) {
            die("<script>alert('Book Image upload failed. Please try again.');window.history.go(-1);</script>");
        }
    }

    // SQL query to update book data in the database
    $sql = "UPDATE book SET 
            book_name = '$bookName', 
            book_author = '$bookAuthor', 
            book_publish_date = '$bookPublish', 
            book_genre = '$bookGenre', 
            book_language = '$bookLanguage', 
            book_summary = '$bookSummary'";

    // Update book cover only if a new image is chosen
    if (!empty($unique_filename2)) {
        $sql .= ", book_cover = '$unique_filename2'";
    }

    $sql .= " WHERE book_id = '$bookId'";

    // Execute the SQL query
    if ($conn->query($sql) === TRUE) {
        // Display success message if book modification is successful
        echo "<script>alert('Book modified successfully.');</script>";
    } else {
        // Display error message if book modification fails
        echo "<script>alert('Failed to modify the book. Please try again later.');</script>";
		 echo "<p>SQL Query: $sql</p>";
    }
}
?>

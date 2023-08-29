<?php
// Check if the form is submitted (and $_POST["book_name"] is set)
if (isset($_POST["submit"])) {
    // Connect to the database
    require "conn.php";

    // Store data submitted via the form
    $bookName = $_POST["book_name"];
    $bookAuthor = $_POST["book_author"];
    $bookPublish = $_POST["book_publish"];
    $bookGenre = $_POST["book_genre"];
    $bookLanguage = $_POST["book_language"];
    $bookSummary = $_POST["book_summary"];

    // File Upload Handling for Book Cover
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
    } else {
        $unique_filename = ""; // No file uploaded, set to empty string
    }
	

		// Generate the new book_id
			$sql1 = "SELECT book_id 
             FROM book
             ORDER BY book_id 
             DESC LIMIT 1;";
			$results = mysqli_query($conn, $sql1);
			$row = mysqli_fetch_assoc($results);

		// Increment contact_id by one
			$num = intval(substr($row['book_id'], 2)) + 1;
			$newBookId = "BK" . str_pad($num, 6, "0", STR_PAD_LEFT);
			
    // SQL query to insert book data into the database
    $sql = "INSERT INTO book (book_id, book_name, book_author, book_publish_date, book_genre, book_language, book_summary, book_cover)
            VALUES ('$newBookId','$bookName', '$bookAuthor', '$bookPublish', '$bookGenre', '$bookLanguage', '$bookSummary', '$unique_filename2')";

    // Execute the SQL query
    if ($conn->query($sql) === TRUE) {
        // Display success message if book addition is successful
        echo "<script>alert('Book added successfully.');</script>";
    } else {
        // Display error message if book addition fails
        echo "<script>alert('Failed to add the book. Please try again later.');</script>";
    }
}
?>

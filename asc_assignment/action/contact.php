<?php
// If the form is submitted (and $_POST["submit"] is set)
if (isset($_POST["submit"])) {
    // Connect to the database
    require "conn.php";

    // Store data submitted via the form
    $name = $_POST["name"];
    $email = $_POST["email"];
    $contact_number = $_POST["contact"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // File Upload Handling
    if ($_FILES["file"]["error"] === UPLOAD_ERR_OK) {
        $allowedExtensions = array("pdf");
        $file = $_FILES["file"];
        $fileName = $file["name"];
        $fileTmpName = $file["tmp_name"];
        $fileError = $file["error"];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // Check if the file is a PDF
        if (!in_array($fileExtension, $allowedExtensions)) {
            die("<script>alert('File upload failed. Only PDF files are allowed.');window.history.go(-1);</script>");
        }

        // Set the upload directory
        $upload_directory = "../files/pdf/"; // Relative to the root of your website
		
       // Generate a unique filename to prevent conflicts
         $unique_filename = $upload_directory . hash('sha256', $fileName);
        
        // Move the uploaded file to the destination folder
        if (!move_uploaded_file($fileTmpName, $unique_filename)) {
            die("<script>alert('File upload failed. Please try again.')</script>");
        }
    } else {
        $unique_filename = ""; // No file uploaded, set to empty string
    }
    
    // Generate the new contact_id
    $sql1 = "SELECT contact_id 
             FROM contact
             ORDER BY contact_id 
             DESC LIMIT 1;";
    $results = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($results);

    // Increment contact_id by one
    $num = intval(substr($row['contact_id'], 2)) + 1;
    $newContactId = "CN" . str_pad($num, 6, "0", STR_PAD_LEFT);

    // SQL query to insert contact form data into the database
    $sql = "INSERT INTO contact (contact_id, contact_name, contact_number, contact_email, contact_subject, contact_message, contact_file, contact_status) 
            VALUES ('$newContactId', '$name', '$contact_number', '$email', '$subject', '$message', '$unique_filename', 'Pending')";

    // Execute the SQL query
    if ($conn->query($sql) === TRUE) {
        // Display success message if message submission is successful
        echo "<script>alert('Message sent successfully.');window.history.go(-1);</script>";
    } else {
        // Display error message if message submission fails
        echo "<script>alert('Message sending failed. Please try again later.');window.history.go(-1);</script>";
    }
} else {
    // If the form is not submitted, print the contents of $_POST (for testing purposes)
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
}
?>
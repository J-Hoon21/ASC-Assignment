<?php
// If the form is submitted
if (isset($_POST["submit"]) || isset($_POST["completed"])) {
    // Connect to the database
    require "conn.php";

    // Store data submitted via the form
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Check if the "Completed" button is clicked
    $status = "Pending"; // Default status is Pending
    if (isset($_POST["completed"])) {
        $status = "Viewed";
    }

    // File Upload Handling (your existing file upload code here)

    // Generate the new contact_id
    // Your existing code to generate the new contact_id here

    // SQL query to insert contact form data into the database
    $sql = "INSERT INTO contact (contact_id, contact_number, contact_email, contact_subject, contact_message, contact_file, contact_status) 
            VALUES ('$newContactId', '$name', '$email', '$subject', '$message', '$unique_filename', '$status')";

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

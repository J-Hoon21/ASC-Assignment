<?php
// Check if the form is submitted (and $_POST["submit"] is set)
if (isset($_POST["submit"])) { 
    // Connect to the database
    require "conn.php"; 
	
    // Store data submitted via the form
    $name = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password2 = $_POST["confirm_password"];

    // Check if the passwords match
    if ($password === $password2) {
        // Check if the email already exists in the database
        $sql_check_email = "SELECT * FROM staff WHERE staff_email = '$email'";
        $result_check_email = mysqli_query($conn, $sql_check_email);
        
        if (mysqli_num_rows($result_check_email) > 0) {
            // Display an error message if the email already exists
            echo "<script>alert('Email already exists. Please use a different email.');window.location.href='../Sign Up.php';</script>";
        } else {
            // Generate the new staff_id
            $sql1 = "SELECT staff_id 
                     FROM staff
                     ORDER BY staff_id 
                     DESC LIMIT 1;";
            $results = mysqli_query($conn, $sql1); // Check if there is a result

            // Increment staff id by one
            $row = mysqli_fetch_assoc($results);
            $num = intval(substr($row['staff_id'], 2)) + 1;
            $newStaffId = "ST" . str_pad($num, 6, "0", STR_PAD_LEFT);

            // Hash the password for security (requires PHP 5.5+)
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // SQL query to insert staff data into the database
            $sql = "INSERT INTO staff (staff_id, staff_name, staff_email, staff_password) 
                    VALUES ('$newStaffId', '$name', '$email', '$hashedPassword');";

            // Execute the SQL query
            if ($conn->query($sql) === TRUE) {
                // Display success message if account creation is successful
                echo "<script>alert('Account is Created Successfully');window.history.go(-1);</script>";
            } else {
                // Display error message if account creation fails
                echo "<script>alert('Failed to create the Account');</script>";
            }
        }
    } else {
        // Display an error message if passwords do not match
        echo "<script>alert('Passwords do not match');window.history.go(-1);</script>";
    }
} else {
    // Redirect to the sign-up page if the form is not submitted
    header("Location: ../Sign Up.php");
    exit();
}
?>
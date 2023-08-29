<?php
// Check if the form is submitted (and $_POST["password"] is set)
if (isset($_POST["password"])) { 

    // Connect to the database
    require "conn.php"; 

    // Retrieve the customer's hashed password from the database based on their email
    session_start();
    $customer_id = $_SESSION["customer_id"];
    $sql_check_password = "SELECT customer_password FROM customer WHERE customer_id = '$customer_id';";
    $result_check_password = mysqli_query($conn, $sql_check_password);
    $row = mysqli_fetch_assoc($result_check_password);

    // Get the password submitted via the form
    $password = $_POST["password"];
    // Check if the password matches the stored hashed password
    if (password_verify($password, $row["customer_password"])) {
        // Delete the customer account from the database
        $sql_delete_customer = "DELETE FROM customer WHERE customer_id = '$customer_id';";
        if (mysqli_query($conn, $sql_delete_customer)) {
            // Account deletion successful
            session_unset(); // Unset all session variables
            session_destroy(); // Destroy the session
            echo "<script>alert('Account deleted successfully.'); window.location.href='../login.php';</script>";
        } else {
            // Account deletion failed
            echo "<script>alert('Failed to delete account. Please try again later.');window.history.go(-1);</script>";
        }
    } else {
        // Password doesn't match
        echo "<script>alert('Invalid password. Please enter the correct password.');window.history.go(-1);</script>";
    }
} else {
    // Redirect to the delete account page if the form is not submitted
    header("Location: ../deleteaccount.php");
    exit();
}
?>

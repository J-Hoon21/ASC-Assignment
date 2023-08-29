<?php
session_start();
$id = $_SESSION['customer_id'];
$old_pass = $_POST["old"];
$new_pass = $_POST["new"];
$con_pass = $_POST["confirm"];

if ($new_pass != $con_pass) {
    echo "<script>alert('Passwords do not match');window.history.go(-1);</script>";
    exit();
}

require "conn.php";
$sql_check = "SELECT customer_id, customer_password FROM customer WHERE customer_id = '$id';";
$result = mysqli_query($conn, $sql_check);
$row = mysqli_fetch_assoc($result);

if (mysqli_num_rows($result) > 0) {
    if (password_verify($old_pass, $row["customer_password"])) {
        // Hash the new password for security (requires PHP 5.5+)
        $hashedNewPassword = password_hash($new_pass, PASSWORD_DEFAULT);

        $sql = "UPDATE customer
                SET  customer_password = '$hashedNewPassword'
                WHERE  customer_id = '$id';";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Password Successfully Updated');window.history.go(-1);</script>";
        } else {
            echo "<script>alert('Failed to Update Password');window.history.go(-1);</script>";
        }
    } else {
        echo "<script>alert('Please enter the correct current password');window.history.go(-1);</script>";
    }
} else {
    echo "<script>alert('User ID not found');window.history.go(-1);</script>";
}
?>
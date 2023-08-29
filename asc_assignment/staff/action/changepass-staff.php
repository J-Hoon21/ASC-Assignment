<?php
session_start();
$id = $_SESSION['staff_id'];
$old_pass = $_POST["old"];
$new_pass = $_POST["new"];
$con_pass = $_POST["confirm"];

if ($new_pass != $con_pass) {
    echo "<script>alert('Passwords do not match');window.location.href='../interface/ChangePassword.php';</script>";
    exit();
}

require "conn.php";
$sql_check = "SELECT staff_id, staff_password FROM staff WHERE staff_id = '$id';";
$result = mysqli_query($conn, $sql_check);
$row = mysqli_fetch_assoc($result);

if (mysqli_num_rows($result) > 0) {
    if (password_verify($old_pass, $row["staff_password"])) {
        // Hash the new password for security (requires PHP 5.5+)
        $hashedNewPassword = password_hash($new_pass, PASSWORD_DEFAULT);

        $sql = "UPDATE staff
                SET  staff_password = '$hashedNewPassword'
                WHERE  staff_id = '$id';";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Password Successfully Updated');window.location.href='../interface/ChangePassword.php';</script>";
        } else {
            echo "<script>alert('Failed to Update Password');window.location.href='../interface/ChangePassword.php';</script>";
        }
    } else {
        echo "<script>alert('Please enter the correct current password')</script>";
    }
} else {
    echo "<script>alert('User ID not found');window.location.href='../interface/ChangePassword.php';</script>";
}
?>
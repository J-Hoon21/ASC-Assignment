<?php
// step 1: Initialize the session
session_start();
if (isset($_SESSION['staff_id'])) {
    echo ("<script>alert('You Have Log In As Staff!')</script>");
    die("<script>;window.history.go(-1);</script>");
}
if (isset($_SESSION['staff'])) {
    echo ("<script>alert('You Must Logout As Customer First!')</script>");
    die("<script>;window.history.go(-1);</script>");
}

// Get the information from the form & $_POST[''] refers to your input object names
$email = $_POST['email'];

// step 2: do connection to the database
include "conn.php"; // link the conn.php info to here

// step 3: select and compare user from the database whether the user exists or not (since this is select)
$sql = "SELECT staff_id, staff_password FROM staff WHERE staff_email ='$email'";
$login = mysqli_query($conn, $sql);
$staff = mysqli_fetch_assoc($login); //#########USE ' OR 1=1 --' to SQL Injection pentest ##############

if (!$staff) {
    die("<script>alert('User not exist. Please input correct Email and Password');window.history.go(-1);</script>");
} else {
    // Verify the password using password_verify()
	$password = $_POST['password'];
    $hashedPassword = $staff['staff_password'];
    if (password_verify($password, $hashedPassword)) {
        echo ("<script>alert('Login Successful!')</script>");

        // Storing customer_id in the session variable
        $_SESSION['staff_id'] = $staff['staff_id'];

        // Delay the redirection by a few seconds (adjust the value as needed)
        echo ("<script>setTimeout(function() { window.location.href = '../Staff Main Page.php'; }, 3000);</script>");
    } else {
        echo ("<script>alert('Incorrect Password. Please try again.');window.history.go(-1);</script>");
    }
}
mysqli_close($conn);
?>
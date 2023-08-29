<?php
session_start();
// destroy the session
session_destroy();
echo ("<script>alert('Logout Successful!')</script>");
header("location: ../../Main Page/login.php");
?>
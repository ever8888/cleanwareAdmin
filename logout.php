<?php
// Initialize the session
session_start();
session_destroy();
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.

 
// Redirect to login page
header("location: login.php");
exit;
?>
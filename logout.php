<?php
session_start();
session_unset();
header("Location: login1.php"); // Redirecting To Login Page
?>
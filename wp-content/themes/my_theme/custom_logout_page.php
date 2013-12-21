<?php
/*
Template name: Custom Logout Page
*/
session_start();
$_SESSION['is_login'] = false;
header("Location:/agent-login");
exit;
?>

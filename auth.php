<?php
session_start();
if(!isset($_SESSION["session_id"])) header("Location: auth-login.php");
?>

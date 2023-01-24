<?php 
//logout.php
session_id($_SESSION['session_id']);
session_start();
session_destroy();
header('location:auth-login.php');
?>
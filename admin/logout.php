<?php 
include 'inc/header.php';

session_start();
session_destroy();
header('Location: login.php');
exit;

include 'inc/footer.php'; 
?>

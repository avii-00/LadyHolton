<?php

$conn = mysqli_connect('localhost','root','','evaluation_08') or die('connection failed');

session_start();
session_unset();
session_destroy();

header('location:login.php');

?>
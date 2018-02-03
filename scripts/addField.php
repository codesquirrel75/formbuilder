<?php

session_start();  // start session

$field = $_POST['field'];

array_push($_SESSION['form']['pages'][$_SESSION['selectedPage']]['sections'][$_SESSION['selectedSection']]['fields'], $field);
header("Location:../index.php");

?>
<?php
session_start();  // start session

$valueIndex = $_POST['valueIndex'];

echo $valueIndex;

array_splice($_SESSION['form']['pages'][$_SESSION['selectedPage']]['sections'][$_SESSION['selectedSection']]['fields'][$_SESSION['selectedField']]['values'], $valueIndex, 1);



header("Location:../index.php"); 

?>
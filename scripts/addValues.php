<?php
session_start();  // start session

$name = $_POST['name'];
$value = $_POST['value'];
$arr = array('name'=>$name, 'value'=>$value);

array_push($_SESSION['form']['pages'][$_SESSION['selectedPage']]['sections'][$_SESSION['selectedSection']]['fields'][$_SESSION['selectedField']]['values'], $arr);



header("Location:../index.php");  

?>
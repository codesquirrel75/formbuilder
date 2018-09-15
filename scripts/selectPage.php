<?php

session_start();  // start session

$_SESSION['selectedPage'] = $_POST['pageIndex'];
$_SESSION['pageIndex'] = array_search($_POST['pageIndex'],array_keys($_SESSION['form']['pages']));
$_SESSION['selectedField'] = $_SESSION['form']['pages'][$_SESSION['selectedPage']]['sections'][$_SESSION['selectedSection']]['fields'][0];
$_SESSION['selectedSection'] = key($_SESSION['form']['pages'][$_SESSION['selectedPage']]['sections']);

header("Location:../index.php");

?>
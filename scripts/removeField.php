<?php
session_start();  // start session

array_splice($_SESSION['form']['pages'][$_SESSION['selectedPage']]['sections'][$_SESSION['selectedSection']]['fields'], $_SESSION['fieldIndex'], 1);

reset($_SESSION['form']['pages'][$_SESSION['selectedPage']]['sections'][$_SESSION['selectedSection']]['fields']);

if($_SESSION['form']['pages'][$_SESSION['selectedPage']]['sections'][$_SESSION['selectedSection']]['fields'] >= 0)
{
	$_SESSION['selectedfield'] = 'field1';
}

header("Location:../index.php");


?>
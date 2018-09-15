<?php
session_start();  // start session

$ruleIndex = $_POST['ruleIndex'];

array_splice($_SESSION['form']['pages'][$_SESSION['selectedPage']]['sections'][$_SESSION['selectedSection']]['fields'][ $_SESSION['selectedField']]['field_Rules'], $ruleIndex, 1);

header("Location:../index.php");  

?>
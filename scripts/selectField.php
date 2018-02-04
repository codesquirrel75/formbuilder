<?php

session_start();  // start session

$_SESSION['selectedField'] = $_POST['index'];
$_SESSION['fieldIndex'] = array_search($_POST['index'],array_keys($_SESSION['form']['pages'][$_SESSION['selectedPage']]['sections'][$_SESSION['selectedSection']]['fields']));

header("Location:../index.php");

?>
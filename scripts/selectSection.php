<?php

session_start();  // start session

$_SESSION['selectedSection'] = $_POST['sectionIndex'];
$_SESSION['sectionIndex'] = array_search($_POST['sectionIndex'],array_keys($_SESSION['form']['pages'][$_SESSION['selectedPage']]['sections']));
$_SESSION['selectedField'] = 'field1';

header("Location:../index.php");

?>
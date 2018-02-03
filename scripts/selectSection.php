<?php

session_start();  // start session

$_SESSION['selectedSection'] = $_POST['sectionIndex'];
$_SESSION['sectionIndex'] = array_search($_POST['sectionIndex'],array_keys($_SESSION['form'][$_SESSION['selectedPage']]));

header("Location:../index.php");

?>
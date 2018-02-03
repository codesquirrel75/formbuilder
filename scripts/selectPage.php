<?php

session_start();  // start session

$_SESSION['selectedPage'] = $_POST['pageIndex'];
$_SESSION['pageIndex'] = array_search($_POST['pageIndex'],array_keys($_SESSION['form']));

header("Location:../index.php");

?>
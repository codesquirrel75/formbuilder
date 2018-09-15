<?php
session_start();  // start session
$newName = $_POST['header'];

$_SESSION['form']['pages'][$_SESSION['selectedPage']]['sections'][$_SESSION['selectedSection']]['sectionName'] = $newName;

header("Location:../index.php");





?>
<?php
session_start();  // start session
$newName = $_POST['newName'];

$_SESSION['form']['pages'][$_SESSION['selectedPage']]['pageName'] = $newName;



header("Location:../index.php");





?>
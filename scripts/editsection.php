<?php
session_start();  // start session
$newHeader = $_POST['header'];

$_SESSION['form'][$_SESSION['pageSelected']][$newHeader] = $_SESSION['form'][$_SESSION['pageSelected']][$_SESSION['sectionSelected']];
unset($_SESSION['form'][$_SESSION['pageSelected']][$_SESSION['sectionSelected']]);


header("Location:../index.php");





?>
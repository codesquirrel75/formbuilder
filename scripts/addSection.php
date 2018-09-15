<?php

session_start();  // start session

include 'functions.php';

$sectionNumber = sectionNumber();

$_SESSION['form']['pages'][$_SESSION['selectedPage']]['sections'] ['section' . $sectionNumber] = array('sectionName'=>'section ' . $sectionNumber, 'fields'=>array());

header("Location:../index.php");

?>
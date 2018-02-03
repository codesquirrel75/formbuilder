<?php

session_start();  // start session

include 'functions.php';

$pageNumber = pageNumber();


$_SESSION['form']['pages']['page' . $pageNumber] = array('pageName'=>'page ' . $pageNumber, 'sections'=>array('section1'=>array('sectionName'=>'section 1', 'fields'=>array())));

header("Location:../index.php");

?>



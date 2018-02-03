<?php

session_start();  // start session

$pageNumber = sizeof($_SESSION['form']) + 1;
while(isset($_SESSION['form']['page' . $pageNumber]))
{
	$pageNumber = $pageNumber + 1;
}

$_SESSION['form']['page' . $pageNumber]['section1']['fields'] = array();

header("Location:../index.php");

?>
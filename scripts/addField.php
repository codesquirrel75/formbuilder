<?php

session_start();  // start session

include 'functions.php';

$type = $_POST['field'];
$fieldNumber = fieldNumber();
$properties = array('fieldName'=>'<input type="text" placeholder="Field ' . $fieldNumber . '" size="15" name="fieldName"> ', 'fieldType'=>$type);

if($type == "text")
{
	$var = array('blubergub'=>'Flubers', 'visible'=>'True');
	$properties = array_merge($properties, $var);
}

if($type == "statictext")
{

}
if($type == "numeric")
{

}
if($type == "photo")
{

}
if($type == "optionlist")
{

}
if($type == "yesnona")
{

}

$_SESSION['form']['pages'][$_SESSION['selectedPage']]['sections'][$_SESSION['selectedSection']]['fields']['field' . $fieldNumber] = $properties;

header("Location:../index.php");

?>
<?php

session_start();  // start session

include 'functions.php';

$type = $_POST['field'];
$fieldNumber = fieldNumber();
$properties = array('fieldName'=>'Field Name', 'fieldType'=>$type, 'fieldKey'=>'FieldKey', 'hideFieldLabel'=>False, 'hidden'=>False);

if($type == "listselector")
{
	$var = array('hintText'=>'Hint Text', 'allowMultiSelection'=>True, 'fieldRules'=>'Field Rules', 'required'=>False, 'captureTimeStamp'=>False, 'values'=>'Values');
	$properties = array_merge($properties, $var);
}
if($type == "text")
{
	$var = array('blubergub'=>'Flubers', 'visible'=>'True');
	$properties = array_merge($properties, $var);
}

if($type == "statictext")
{
	$var = array('blubergub'=>'Flubers', 'visible'=>'True');
	$properties = array_merge($properties, $var);
}
if($type == "numeric")
{
	$var = array('blubergub'=>'Flubers', 'visible'=>'True');
	$properties = array_merge($properties, $var);
}
if($type == "photo")
{
	$var = array('blubergub'=>'Flubers', 'visible'=>'True');
	$properties = array_merge($properties, $var);
}
if($type == "optionlist")
{
	$var = array('blubergub'=>'Flubers', 'visible'=>'True');
	$properties = array_merge($properties, $var);
}
if($type == "yesnona")
{
	$var = array('blubergub'=>'Flubers', 'visible'=>'True');
	$properties = array_merge($properties, $var);
}

$_SESSION['form']['pages'][$_SESSION['selectedPage']]['sections'][$_SESSION['selectedSection']]['fields']['field' . $fieldNumber] = $properties;

header("Location:../index.php");

?>
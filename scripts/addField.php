<?php

session_start();  // start session

include 'functions.php';

$type = $_POST['field'];
$fieldNumber = fieldNumber();
$properties = array('fieldLabel'=>'<input type="text" placeholder="Field ' . $fieldNumber . '" size="15" name="fieldName"> ', 'fieldType'=>$type, 'field_Key'=>'key', 'hide_Field_Label'=>False, 'hidden'=>False, 'exclude_From_Reports'=>False,);

if($type == "text")
{
	$var = array('default_Value'=>'default', 'hint_Text'=>'hint', 'enforce_Min/max'=>False, 'minimum_Length'=>'min', 'maximum_Length'=>'max', 'fieldRules'=>'rules', 'required'=>False, 'enabled'=>False, 'capture_Time_Stamp'=>False, 'secure'=>False,);
	$properties = array_merge($properties, $var);
}
if($type == "listselector")
{
	$var = array('allow_Multi_Selection'=>False, 'field_Rules'=>'rules', 'required'=>False, 'enabled'=>False, 'capture_Time_Stamp'=>False, 'values'=>'values',);
	$properties = array_merge($properties, $var);
}
if($type == "statictext")
{
	$var = array('default_Value'=>'default', 'field_Rules'=>'rules', 'enabled'=>False, 'exclude_On_Sync'=>False,);
	$properties = array_merge($properties, $var);
}
if($type == "numeric")
{
	$var = array('default_Value'=>'default', 'field_Rules'=>'rules', 'enabled'=>False, 'exclude_On_Sync'=>False,);
	$properties = array_merge($properties, $var);
}
if($type == "photo")
{
	$var = array('photo_Caption_Overlay'=>'caption', 'hint_Text'=>'hint', 'photo_Library_Enabled'=>False, 'camera_Enabled'=>False, 'time_stamp_On_Image'=>False, 'allow_Annotation'=>False, 'gps_Tagging'=>False, 'photo_Quality'=>'quality', 'maximum_Hight'=>50, 'maximum_Width'=>50, 'exclude_On_Sync'=>False);
	$properties = array_merge($properties, $var);
}
if($type == "optionlist")
{
	$var = array('number_Of_Columns_For_Phones'=>'phone', 'number_Of_Columns_For_Tablets'=>'tablet', 'memory_Field'=>'memory', 'excludeOnSync'=>False,);
	$properties = array_merge($properties, $var);
}
if($type == "yesnona")
{
	$var = array('allow_N/A'=>'allow', 'default_Value'=>'default', 'field_Rules'=>'rules', 'required'=>False, 'enabled'=>False,);
	$properties = array_merge($properties, $var);
}

$_SESSION['form']['pages'][$_SESSION['selectedPage']]['sections'][$_SESSION['selectedSection']]['fields']['field' . $fieldNumber] = $properties;

header("Location:../index.php");

?>
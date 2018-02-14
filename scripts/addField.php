<?php

session_start();  // start session

include 'functions.php';

$type = $_POST['field'];
$fieldNumber = fieldNumber();
$properties = array('fieldLabel'=>'<input type="text" placeholder="Field ' . $fieldNumber . '" size="15" name="fieldName"> ', 'fieldType'=>$type, 'field_Key'=>'key', 'alert_Type'=>'alert', 'hide_Field_Label'=>'hide', 'hidden'=>'hidden', 'exclude_From_Reports'=>'exclude',);

if($type == "text")
{
	$var = array('default_Value'=>'default', 'hint_Text'=>'hint', 'enforce_Min/max'=>'enforce', 'minimum_Length'=>'min', 'maximum_Length'=>'max', 'fieldRules'=>'rules', 'required'=>'required', 'enabled'=>'enabled', 'capture_Geo_Location'=>'geo', 'capture_Time_Stamp'=>'time', 'secure'=>'secure',);
	$properties = array_merge($properties, $var);
}
if($type == "listselector")
{
	$var = array('allow_Multi_Selection'=>'multi', 'field_Rules'=>'rules', 'required'=>'required', 'enabled'=>'enabled', 'capture_Time_Stamp'=>'stamp', 'values'=>'values',);
	$properties = array_merge($properties, $var);
}
if($type == "statictext")
{
	$var = array('default_Value'=>'default', 'field_Rules'=>'rules', 'enabled'=>'enabled', 'exclude_On_Sync'=>'sync', 'alert_Type'=>'alert',);
	$properties = array_merge($properties, $var);
}
if($type == "numeric")
{
	$var = array('default_Value'=>'default', 'field_Rules'=>'rules', 'enabled'=>'enabled', 'exclude_On_Sync'=>'sync',);
	$properties = array_merge($properties, $var);
}
if($type == "photo")
{
	$var = array('photo_Caption_Overlay'=>'caption', 'hint_Text'=>'hint', 'photo_Library_Enabled'=>'library', 'camera_Enabled'=>'camera', 'time_stamp_On_Image'=>'stamp', 'allow_Annotation'=>'annotation', 'gps_Tagging'=>'gps', 'photo_Quality'=>'quality', 'maximum_Hight'=>'max hight', 'maximum_Width'=>'max width', 'capture_Geo_Location'=>'geo', 'capture_Time_Stamp'=>'time', 'exclude_On_Sync'=>'sync',);
	$properties = array_merge($properties, $var);
}
if($type == "optionlist")
{
	$var = array('number_Of_Columns_For_Phones'=>'phone', 'number_Of_Columns_For_Tablets'=>'tablet', 'memory_Field'=>'memory', 'capture_Geo_Location'=>'geo', 'captureTimeStamp'=>'time', 'excludeOnSync'=>'sync',);
	$properties = array_merge($properties, $var);
}
if($type == "yesnona")
{
	$var = array('allow_N/A'=>'allow', 'default_Value'=>'default', 'field_Rules'=>'rules', 'required'=>'required', 'enabled'=>'enabled', 'capture_Geo_Location'=>'geo', 'capture_Time_Stamp'=>'time',);
	$properties = array_merge($properties, $var);
}

$_SESSION['form']['pages'][$_SESSION['selectedPage']]['sections'][$_SESSION['selectedSection']]['fields']['field' . $fieldNumber] = $properties;

header("Location:../index.php");

?>
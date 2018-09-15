<?php

session_start();  // start session

$when = $_POST['when'];
$value = $_POST['value'];
$performAction = $_POST['performAction'];
$otherwisePerform = $_POST['otherwisePerform'];
$onFieldOrSection = $_POST['onFieldOrSection'];
$arr = array('when'=>$when, 'value'=>$value, 'performAction'=>$performAction, 'otherwisePerform'=>$otherwisePerform, 'onFieldOrSection'=>$onFieldOrSection);

array_push($_SESSION['form']['pages'][$_SESSION['selectedPage']]['sections'][$_SESSION['selectedSection']]['fields'][$_SESSION['selectedField']]['field_Rules'],array('when'=>$when, 'value'=>$value, 'performAction'=>$performAction, 'otherwisePerform'=>$otherwisePerform, 'onFieldOrSection'=>$onFieldOrSection));

header("Location:../index.php");  

?>
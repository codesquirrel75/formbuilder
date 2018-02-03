<?php

session_start();  // start session

array_splice($_SESSION['form']['pages'][$_SESSION['selectedPage']]['sections'],$_SESSION['sectionIndex'],1);

 reset($_SESSION['form']['pages'][$_SESSION['selectedPage']]['sections']);
 
$_SESSION['selectedSection'] = key($_SESSION['form']['pages'][$_SESSION['selectedPage']]['sections']);

header("Location:../index.php");


?>
<?php

session_start();  // start session

array_splice($_SESSION['form']['pages'],$_SESSION['pageIndex'],1);

 reset($_SESSION['form']['pages']);
 
$_SESSION['selectedPage'] = key($_SESSION['form']['pages']);

header("Location:../index.php");


?>
<?php

session_start();  // start session

array_splice($_SESSION['form'],$_SESSION['pageIndex'],1);

 reset($_SESSION['form']);
 
$_SESSION['selectedPage'] = key($_SESSION['form']);

header("Location:../index.php");


?>
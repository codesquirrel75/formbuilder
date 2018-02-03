<?php

session_start();  // start session

$_SESSION['selectedField'] = $_POST['index'];

header("Location:../index.php");

?>
<?php
session_start();  // start session

$_SESSION['form']['formName'] = $_POST['formName'];

header("Location:../index.php");


?>
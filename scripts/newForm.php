<?php
session_start();  // start session

unset($_SESSION['form']);

header("Location:../index.php");
?>
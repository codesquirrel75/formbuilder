<?php
session_start();  // start session


$formName = $_POST['formName'];

if($formName > '')
{
$_SESSION['form']['formName'] = $formName;
}

$filename = $_SESSION['form']['formName'] . ".xml";
$file = fopen("../forms/" . $filename, "w") or die("Sorry didn't do it!");
$form = $formName . "/n";
foreach($_SESSION['form']['pages'] as $key=>$page)
{
	$form = $form + $key . "=" . $page . "/n";
}
fwrite($file, $form);
fclose($file);	

header("Location:../index.php");
?>


	
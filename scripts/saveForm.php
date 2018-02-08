<?php
session_start();  // start session

?>


<?php

$filename = $_SESSION['form']['formName'] . ".xml";

if (!in_array($filename, (scandir("../forms")))) 
{
	
	$file = fopen("../forms/" . $filename, "w") or die("Sorry didn't do it!");
	$form = "I'm the form";
	fwrite($file, $form);
	fclose($file);
}
else
{
	
}

//header("Location:../index.php");
?>


		
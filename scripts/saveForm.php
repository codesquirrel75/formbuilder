<?php
session_start();  // start session

include("saveFunctions.php");

$formName = $_POST['formName'];

if($formName > '')
{
$_SESSION['form']['formName'] = $formName;
}

$filename = $_SESSION['form']['formName'] . ".html";

$file = fopen("../forms/" . $filename, "w") or die("<h1>Sorry couldn't open that file!</h1>");

$form = '<!DOCTYPE html>
		<html>

		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">

			<title>FRC Event</title>

			<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		</head>

		<body><div class="alert alert-info"><strong>' . $formName . "</strong></div>\n" ;

foreach($_SESSION['form']['pages'] as $key=>$page)
{
	$form = $form . '<hr>' . "\n";
	foreach ($_SESSION['form']['pages'][$key]['sections'] as $key2 => $section) {
		
		$form = $form . "<hr><strong>" . $section['sectionName'] . "</strong>\n";
		foreach ($_SESSION['form']['pages'][$key]['sections'][$key2]['fields'] as $key3 => $field) {
			
			if($field['fieldType'] === "numeric")
			{
				
				$form = $form . numericInput() . "\n";
			}
			elseif ($field['fieldType'] === "listselector") 
			{	
				$form = $form . listSelector(). "\n";
			}
			elseif ($field['fieldType'] === "text") 
			{
				$form = $form . textInput(). "\n";
			}
			elseif ($field['fieldType'] ==="yesnona") 
			{
				$form = $form . yesNoNa(). "\n";
			}
			elseif ($field['fieldType'] ==="statictext") 
			{
				$form = $form . staticText(). "\n";
			}
			elseif ($field['fieldType'] ==="optionlist") 
			{
				$form = $form . optionList(). "\n";
			}

			
		}
	}
}

$form = $form . ' <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>' . "\n";

//echo $form;

fwrite($file, $form);
fclose($file);	

header("Location:../index.php");
?>


	
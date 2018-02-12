<?php
session_start();  // start session


$formName = $_POST['formName'];

if($formName > '')
{
$_SESSION['form']['formName'] = $formName;
}

$filename = $_SESSION['form']['formName'] . ".xml";

$file = fopen("../forms/" . $filename, "w") or die("Sorry didn't do it!");
$form = $formName . "\n" ;
foreach($_SESSION['form']['pages'] as $key=>$page)
{
	$form = $form . $page['pageName'] . "\n";
	foreach ($_SESSION['form']['pages'][$key]['sections'] as $key2 => $section) {
		$form = $form . "<" . $section['sectionName'] . ">\n";
		foreach ($_SESSION['form']['pages'][$key]['sections'][$key2]['fields'] as $key3 => $field) {
			$form = $form . $field['fieldName'] . "\n";
		}
	}
}

fwrite($file, $form);
fclose($file);	

header("Location:../index.php");
?>


	
<?php

$forms = scandir("../forms");

foreach ($forms as $form) {
	$formToPrint = substr($form, 0, strpos($form, "."));

	if(strlen($formToPrint) > 0)
	{
		echo $formToPrint . "<br>";
	}
}


?>
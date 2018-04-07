<?php

session_start();  // start session

$field = $_SESSION['form']['pages'][$_SESSION['selectedPage']]['sections'][$_SESSION['selectedSection']]['fields'][$_SESSION['selectedField']] ;
print_r($field);
echo "<hr>";
print_r($_POST);

foreach ($field as $key => $value) 
{
	if(array_key_exists($key, $_POST))
	{
		if($_POST[$key] == 'on')
		{
			$_SESSION['form']['pages'][$_SESSION['selectedPage']]['sections'][$_SESSION['selectedSection']]['fields'][$_SESSION['selectedField']][$key] = True;
		}
		else
		{
			$_SESSION['form']['pages'][$_SESSION['selectedPage']]['sections'][$_SESSION['selectedSection']]['fields'][$_SESSION['selectedField']][$key] = $_POST[$key];
		}
	}
	elseif ($value == True)
	{
		if(!is_array($value) && !is_string($value))
		{
			$_SESSION['form']['pages'][$_SESSION['selectedPage']]['sections'][$_SESSION['selectedSection']]['fields'][$_SESSION['selectedField']][$key] = False;			
		}
		
	}
}

echo "<hr>";
print_r($_SESSION['form']['pages'][$_SESSION['selectedPage']]['sections'][$_SESSION['selectedSection']]['fields'][$_SESSION['selectedField']]);

header("Location:../index.php");


?>
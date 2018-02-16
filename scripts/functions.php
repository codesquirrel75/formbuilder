<?php


function pageNumber()
{
	$pageNumber = 1;

	if(!isset($_SESSION['form']))
	{
		$pageNumber = 1;
	}
	else
	{
		while(array_key_exists('page'. $pageNumber, $_SESSION['form']['pages']))
		{
			$pageNumber = $pageNumber +1;
		}		
	}
	return $pageNumber;
}

function sectionNumber()
{
	$sectionNumber = 1;

	if(!isset($_SESSION['form']))
	{
		$sectionNumber = 1;
	}
	else
	{
		while(array_key_exists('section'. $sectionNumber, $_SESSION['form']['pages'][$_SESSION['selectedPage']]['sections']))
		{
			$sectionNumber = $sectionNumber +1;
		}		
	}

	return $sectionNumber;
}

function fieldNumber()
{
	$fieldNumber = 1;

	if(!isset($_SESSION['form']))
	{
		$fieldNumber = 1;
	}
	else
	{
		while(array_key_exists('field'. $fieldNumber, $_SESSION['form']['pages'][$_SESSION['selectedPage']]['sections'][$_SESSION['selectedSection']]['fields']))
		{
			$fieldNumber = $fieldNumber +1;
		}		
	}

	return $fieldNumber;
}

function getPropertyInput($property)
{
	$outPut = '';
	$field = $_SESSION['form']['pages'][$_SESSION['selectedPage']]['sections'][$_SESSION['selectedSection']]['fields'][$_SESSION['selectedField']];
	
	
	if(is_string($field[$property]))
	{
		$value = $field[$property];
		$outPut = "<input type='textbox' size='15' name='" . $property . "' value='" . $value . "'/>";	
	}
	
	if(is_bool($field[$property]))
	{
		$outPut = "<input type='checkbox' name='" . $property . "'/>";
	}
	if(is_numeric($field[$property]))
	{
		$outPut = "<input type='number' name='" . $property . "' />";
	}
	return $outPut;
}

?>
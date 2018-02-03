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

?>
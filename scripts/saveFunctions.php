<?php


function optionList()
{
	$optionList = '<h3>Selection title AKA the Question:</h3>
		<select class="btn btn-lg btn-block btn-primary">
			<option>select me</option>
			<option>No Select me</option>
		</select>' ;

	return $optionList;
}

function listSelector()
{
	$listSelector = '<h3>Option List Question:</h3>
		<input type="radio" name="list1" value="selection1">Selection 1
		<input type="radio" name="list1" value="selection2">Selection 2
		<input type="radio" name="list1" value="selection3">Selection 3
	
		<h2>List Selector multi selector</h2>
		<input type="checkbox" name="list2" value="check1">Check 1
		<input type="checkbox" name="list2" value="check2">Check 2';

	return $listSelector;
}

function numericInput()
{
	$numericInput = '<h3>Numeric input Question:</h3>
		<input type="Numeric" name="number">';
	
	return $numericInput;
}

function staticText()
{
	$staticText = '<h3>I am static text.</h3>';

	return $staticText;
}

function textInput()
{
	$textInput = '<h3>Text input Question:</h3>
		<input type="text" name="text" required="true">';

	return $textInput;
}

function yesNoNa()
{
	$yesNoNa = '<h3>Yes/No/NA Question:</h3>
		Yes<input type="radio" name="yes/no" value="yes">
		No<input type="radio" name="yes/no" value="No">
		NA<input type="radio" name="yes/no" value="NA">';

	return $yesNoNa;
}

 



?>
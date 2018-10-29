<?php


function optionList($args)
{
	$optionList = '<div id="ol' . $args['fieldName'] . '" hidden><h3>' . $args['fieldName'] . '</h3>';
	echo $args['fieldName'];

	$optionList = $optionList . '<select class="btn btn-lg btn-block btn-primary">';
	foreach ($args['values'] as $key => $value) 
	{
		
			$optionList = $optionList . '<option>' . $value['name'] . '</option>';
			print_r($value);
			
	}
		$optionList = $optionList . '</select></div>' ;
		echo "<p>";
		echo $optionList;
		echo "</p>";

	/*$optionList = '<h3>' . $args[fieldName] . '</h3>';
		'<select class="btn btn-lg btn-block btn-primary">
			<option>select me</option>
			<option>No Select me</option>
		</select>' ;

	return $optionList;
	*/
}

function listSelector($args)
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

function numericInput($args)
{
	$numericInput = '<h3>Numeric input Question:</h3>
		<input type="Numeric" name="number">';
	
	return $numericInput;
}

function staticText($args)
{
	$staticText = '<h3>I am static text.</h3>';

	return $staticText;
}

function textInput($args)
{
	$textInput = '<h3>Text input Question:</h3>
		<input type="text" name="text" required="true">';

	return $textInput;
}

function yesNoNa($args)
{
	$yesNoNa = '<h3>Yes/No/NA Question:</h3>
		Yes<input type="radio" name="yes/no" value="yes">
		No<input type="radio" name="yes/no" value="No">
		NA<input type="radio" name="yes/no" value="NA">';

	return $yesNoNa;
}

 



?>
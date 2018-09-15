<?php

function pageNumber()
{
	if(!isset($form2))
	{
		return 1;
	}
	else
	{
		return count($form2['pages']) + 1;
	}
}

function sectionNumber()
{
	if(!isset($form2))
	{
		return 1;
	}
	else
	{
		return count($form2['pages']['page']['sections']) + 1;
	}
}

$form3 = $page = array('name' => 'page1', array('name' =>'section1' ,'description'=>'this is a section',$fields = array('field' =>array() , ) ) );

$form2 = array('formName'=>'form' . (sizeof(scandir('../forms'))-1), 'pages'=>array('page' . pageNumber() =>array('pageName'=>'page' . pageNumber(), 'sections'=>array('section' . sectionNumber() =>array('sectionName'=>'section' . sectionNumber(), 'fields'=>array())))));

$form = array('formName'=>'form' . (sizeof(scandir('../forms'))-1),'page'=>array('pageName'=>'page1','section'=>array('sectionName'=>'section1', 'description'=>'', 'fields'=>array())));

print_r($form2);
echo "<br>";

echo sizeof($form2['pages']);
echo array_search('page1',$form2['pages']['page1']);

//print_r($form2);
//echo "<br>";
//print_r($form3);
//echo "<br>";
//print($form3['page']['pageName']);




echo "<hr>";

function addNumber($a,$b)
{
	return $a + $b;
}

$num = addNumber(6,7);

echo "<strong style='color:Blue'>" . $num . "</strong>";

?>

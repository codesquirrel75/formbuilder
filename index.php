<?php
session_start();  // start session

//  functions to set page and section numbers
include 'scripts/functions.php';


// Check for the page setup array
if(!isset($_SESSION['form']['pages']))
{
	$_SESSION['form'] = array('formName'=>'form' . (sizeof(scandir('forms'))-2), 'pages'=>array('page' . pageNumber() =>array('pageName'=>'page' . pageNumber(), 'sections'=>array('section' . sectionNumber() =>array('sectionName'=>'section' . sectionNumber(), 'fields'=>array())))));

	$_SESSION['selectedPage'] = key($_SESSION['form']['pages']);
	$_SESSION['pageIndex'] = array_search($_SESSION['selectedPage'],array_keys($_SESSION['form']['pages']));
	$_SESSION['selectedSection'] = key($_SESSION['form']['pages'][$_SESSION['selectedPage']]['sections']);
	$_SESSION['sectionIndex'] = array_search($_SESSION['selectedSection'],array_keys($_SESSION['form']['pages'][$_SESSION['selectedPage']]['sections']));

}

// Check for Session selectedField
if(!isset($_SESSION['selectedField']))
{
	// initialize Session selectedField
	$_SESSION['selectedField'] = 'field1';
}


//  Check for Session selectedPage
if(!isset($_SESSION['selectedPage']))
{
	//  initialize Session selectPage
	$_SESSION['selectedPage'] = 'page1';
	
}

// Check for selected section
if(!isset($_SESSION['selectedSection']))
{
	//  initialize Session selectedSection
	$_SESSION['selectedSection'] = 'section1';
	
}


// Check for empty pages
if(sizeof($_SESSION['form']['pages']) == 0)
{
	$_SESSION['form']['pages'] = array('page1'=>array('pageName'=>'page 1', 'sections'=>array('section1'=>array('sectionName'=>'section 1', 'fields'=>array()))));
	
}

// Check for empty sections
if(sizeof($_SESSION['form']['pages'][$_SESSION['selectedPage']]['sections']) == 0)
{
	$_SESSION['form']['pages'][$_SESSION['selectedPage']]['sections'] = array('section1'=>array('sectionName'=>'section 1', 'fields'=>array()));
	
}

if(!array_key_exists($_SESSION['selectedField'], $_SESSION['form']['pages'][$_SESSION['selectedPage']]['sections'][$_SESSION['selectedSection']]['fields']))
{
	$_SESSION['selectedField'] = key( $_SESSION['form']['pages'][$_SESSION['selectedPage']]['sections'][$_SESSION['selectedSection']]['fields']);
}

// Set field Index
$_SESSION['fieldIndex'] = array_search($_SESSION['selectedField'],array_keys($_SESSION['form']['pages'][$_SESSION['selectedPage']]['sections'][$_SESSION['selectedSection']]['fields']));






// Check for Session fields variable
if(!isset($_SESSION['form']['pages'][$_SESSION['selectedPage']]['sections'][$_SESSION['selectedSection']]['fields']))
{
 	// initialize Session fields as an empty array
 	echo "fields isn't set";
}


$forms = scandir("forms");
$formName = $_SESSION['form']['formName'];


//   Testing outputs 



/*
echo "<strong>size of page sections</strong>";
print_r($_SESSION['form']);


echo "<br>";
echo $_SESSION['selectedField'];

echo "<br>";
print_r($_SESSION['form']);


echo "<br>";
print_r($_SESSION['form']['pages'][$_SESSION['selectedPage']]['sections'][$_SESSION['selectedSection']]['fields']);


echo $_SESSION['fieldIndex'];
echo key($_SESSION['form']['pages'][$_SESSION['selectedPage']]['sections'][$_SESSION['selectedSection']]['fields']);
*/

//  End Testing

?>


<!DOCTYPE html>
<html>
	<head>

		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Form Builder</title>

		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


		
	</head>
	

	<BODY>

<!-- Start of Nav Bar -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  		<a class="navbar-brand" href="#" style="color:Turquoise">
	  			<img src="pics/logo.jpg" width="50" height="50" alt=""> <strong style="font-size:40px;">FORM BUILDER</strong>
	  		</a>
	  		<div class="container">
	  		<!--
		  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    		<span class="navbar-toggler-icon"></span>
		  		</button>

				 <div class="collapse navbar-collapse" id="navbarSupportedContent">
				    <ul class="navbar-nav mr-auto">
				      <li class="nav-item active">
				        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="#">Link</a>
				      </li>
				      <li class="nav-item dropdown">
				        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				          Dropdown
				        </a>
				        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
				          <a class="dropdown-item" href="#">Action</a>
				          <a class="dropdown-item" href="#">Another action</a>
				          <div class="dropdown-divider"></div>
				          <a class="dropdown-item" href="#">Something else here</a>
				        </div>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link disabled" href="#">Disabled</a>
				      </li>
				    </ul>
				</div>
			   <Button type="button" class="fa fa-plus-square-o btn btn-success"></Button>
			-->
			</div>
	</nav>
<!-- End of Nav Bar -->


<!-- Start of container-fluid  -->
	<div class="container container-fluid">
		<div class="row">
			<div class="col-md-12">

<!-- Start of Forms Tool bar  -->
				
				<div class="alert alert-secondary" role="alert">
					<div class="container">
						<div class="row">
							<div class="col-md-5">
								<div class="container">
									<div class="row">	
										<div class="col">										
											
								 				<button type="button" class="btn" data-toggle="modal" data-target="#saveFormModal"><i class="fa fa-floppy-o"></i> Save</button>
												
												<!-- Save form Modal  -->
												<div class="modal" id="saveFormModal" tabindex="-1" role="dialog">
												  <div class="modal-dialog" role="document">
												    <div class="modal-content">
												      <div class="modal-header">
												        <h5 class="modal-title">Save</h5>
												        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
												          <span aria-hidden="true">&times;</span>
												        </button>
												      </div>
												      <div class="modal-body">
												      	<form method="post" action="scripts/saveForm.php">
												      	<?php	echo '<input type="hidden" name="formName" value="' . $_SESSION['form']['formName'] . '">' ?>
												      <?php    echo  'Save Form "<strong>' .  $_SESSION['form']['formName'] . '</strong>"?'; ?>
												      </div>
												      <div class="modal-footer">
												        <?php
												        $filename = $_SESSION['form']['formName'] . ".xml";
												        if (!in_array($filename, (scandir("forms"))))
												        {
												        	echo '<button type="submit" class="btn btn-success">Save</button>';	
												        }
												        else
												        {
												        	echo '<button type="button" class="btn btn-success" data-toggle="modal" data-target="#saveAlertModal" data-dismiss="modal">Save</button>';
												        }
												        ?>
												        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
												        </form>										        
												      </div>
												    </div>
												  </div>
												</div>
												<!-- End Save form Modal  -->

								 		</div>
								 		<div class="col">
								 			<form method="post" action="scripts/configureForm.php">
								 				<button type="submit" class="btn"><i class="fa fa-cog"></i> Configure</button>
								 			</form>
								 		</div>
								 		<div class="col">
								 			
								 				<button type="button" class="btn" data-toggle="modal" data-target="#newFormModal"><i class="fa fa-plus"></i> New</button>
								 				<div class="modal" id="newFormModal" tabindex="-1" role="dialog">
												  <div class="modal-dialog" role="document">
												    <div class="modal-content">
												      <div class="modal-header">
												        <h5 class="modal-title">Save Changes?</h5>
												        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
												          <span aria-hidden="true">&times;</span>
												        </button>
												      </div>
												      <div class="modal-body">
												        <p>Would you like to save changes to the current form?</p>
												      </div>
												      <div class="modal-footer">
												        <form method="post" action="scripts/saveForm.php">
												        	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#saveFormModal" data-dismiss="modal">Yes</button>
												        </form>
												        <form method="post" action="scripts/newForm.php">
												        	<button type="submit" class="btn btn-danger">No</button>
												        </form>
												        <form>
												        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
												        </form>										        
												      </div>
												    </div>
												  </div>
												</div>
								 			
								 		</div>
								 	</div>	
							 	</div>
							</div>
							<div class="col-md-4"> <?php echo "<strong class='alert-secondary'>" . $formName . "</strong>"; ?><button class='btn fa fa-pencil' style="color: red;" data-toggle="modal" data-target="#editFormNameModal"></button></div>

							<!-- Change Form Name Modal -->
							<div class="modal" id="editFormNameModal" tabindex="-1" role="dialog">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title">Edit Form Name</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							      	 <form method="post" action="scripts/editFormName.php">
							      <?php    echo  '<input type="textbox" name="formName" placeholder="' .  $_SESSION['form']['formName'] . '">'; ?>
							      </div>
							      <div class="modal-footer">
							       
							        	<button type="submit" class="btn btn-success">submit</button>
							        
							        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							        </form>										        
							      </div>
							    </div>
							  </div>
							</div>
							<!-- End Change Form Name Modal -->

							<div class="col-md-3">	
								<form class="form-inline my-2 my-lg-0" method="post" action="scripts/searchForms.php">
								<!-- open or preview form -->
									<div class="btn-group">

										<div class="dropdown">
											<button id="formDropDwn" type="button" class="btn btn-danger dropdown-toggle fa fa-folder" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										    open Form
											</button>
											
											<div class="dropdown-menu" aria-labelledby="formDropDwn">

											  	<?php  
											  		

											  		if(sizeof($forms) > 3)
											  		{
												  		foreach ($forms as $form) 
												  		{
															$formToPrint = substr($form, 0, strpos($form, "."));

															if(strlen($formToPrint) > 0 && $formToPrint != "index")
															{
																echo '<a class="dropdown-item" href=# onclick="setForm(' . $form . ')">' . $formToPrint . '</a>';
																
															}
														}
													}
													else
													{
														echo '<a class="dropdown-item" href="#">No Saved Forms</a>';
													}	
											  	?>
										</div>
									  
									   
									  </div>

									<div class="dropdown">
										<button id="formDropDwn" type="button" class="btn btn-outline-primary fa fa-eye dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									    preview
										</button>

										<div class="dropdown-menu" aria-labelledby="formDropDwn">

											  	<?php  
											  		

											  		if(sizeof($forms) > 3)
											  		{
												  		foreach ($forms as $form) 
												  		{
															$formToPrint = substr($form, 0, strpos($form, "."));

															if(strlen($formToPrint) > 0 && $formToPrint != "index")
															{
																
																echo '<a class="dropdown-item" onclick="window.open(\'forms/' . $form . '\', \'preview\', \'_blank\')">' . $formToPrint . '</a>';
															}
														}
													}
													else
													{
														echo '<a class="dropdown-item" href="#">No Saved Forms</a>';
													}	
											  	?>
										</div>

									</div>
									  
									  
									</div>
						 
						    	</form>

							</div>

						</div>

				    </div>

				</div>
		
<!-- End of Forms Tool bar  -->
			</div>
		</div>
		<div class="row">

<!-- Start of Operation Cards  -->
		
			<div class="col-md-4">

			<div class="container">
				<div class="row">
					<div class="col">

						<!-- Start of Card 1 (PAGES)  -->
						<div class="card text-center">
							  	<div class="card-header">
							  		<div class="container">
							  			<div class="row">
							  				<div class="col">
									  		<strong>Pages</strong>
									  		</div>
									  		<div class="col"></div>
									  		<div class="col">
										  										  										  		
											    <div class="btn-group" role="group">
											    	<form method="post" action="scripts/addPage.php">	
												  <button type="submit" class="fa fa-plus-square btn btn-outline-primary"></button>
													</form>	
													<form>
													<button type="button" class="fa fa-pencil-square-o btn btn-outline-secondary" data-toggle="modal" data-target="#editPage"></button>
												</form>
													<form method="post" action="scripts/removePage.php">
												  <button type="submit" class="fa fa-minus-square btn btn-outline-danger"></button>
													</form>
												</div>
												
											</div>
										</div>	
									</div>
								</div>
								<div class="card-body">
									<?php
										foreach($_SESSION['form']['pages'] as $key=>$page)
										{
											if($_SESSION['selectedPage'] === $key)
												{
													$type = "alert-primary";
												}
												else
												{
													$type = "alert-success";
												}

										echo 
												'<form method="post" action="scripts/selectPage.php">
										  		<input type="hidden" name="pageIndex" value="' . $key . '">
											  	<button type="submit" class="alert ' . $type . ' btn-lg btn-block text-left" role="alert" style="text-align: left;">
												  <B>' . $_SESSION['form']['pages'][$key]['pageName'] . '</B>
												</button>
											</form>';
										}	
									?>
								</div>
						</div>
						<!-- End of Card 1 (PAGES)  -->
						
					</div>
					
				</div>
				<div class="row">
					<div class="col">
						
						<!-- Start of Card 3 (SECTIONS)  -->
				<div class="card text-center">
				  	<div class="card-header">
				  		<div class="container">
				  			<div class="row">
				  				<div class="col">
						  		<strong>Sections</strong>
						  		</div>
						  		<div class="col">
						  			
						  		</div>
						  		<div class="col">
								    <div class="btn-group" role="group" aria-label="Basic example">
										<form method="post" action="scripts/addSection.php">
									  		<button type="submit" class="fa fa-plus-square btn btn-outline-primary"></button>
										</form>
										<form>
											<button type="button" class="fa fa-pencil-square-o btn btn-outline-secondary" data-toggle="modal" data-target="#editSection"></button>
										</form>
										<form method="post" action="scripts/removeSection.php">
									  		<button type="submit" class="fa fa-minus-square btn btn-outline-danger"></button>
										</form>

									</div>
								</div>
							</div>	
						</div>
					</div>
					<div class="card-body">
					  	
						<?php
								foreach($_SESSION['form']['pages'][$_SESSION['selectedPage']]['sections'] as $key=>$section)
								{
									if($_SESSION['selectedSection'] === $key)
										{
											$type = "alert-primary";
										}
										else
										{
											$type = "alert-success";
										}

								echo 
										'<form method="post" action="scripts/selectSection.php">
								  		<input type="hidden" name="sectionIndex" value="' . $key . '">
									  	<button type="submit" class="alert ' . $type . ' btn-lg btn-block text-left" role="alert" style="text-align: left;">
										  <B>' . $_SESSION['form']['pages'][$_SESSION['selectedPage']]['sections'][$key]['sectionName'] . '</B>
										</button>
									</form>';
								}	
							?>
					</div>
				</div>
<!-- End of Card 3 (SECTIONS)  -->

					</div>
				</div>
			</div>



			</div>


			<div class="col-md-4">

<!-- Start of Card 2 (FIELDS)  -->
				<div class="card text-center">
					  	<div class="card-header">
					  		<div class="container">
					  			<div class="row">
					  				<div class="col">
							  		<strong>Fields</strong>
							  		</div>
							  		<div class="col"></div>
							  		<div class="col">
							  			
							  			<form method="post" action="scripts/removeField.php">
							  				<div class="btn-group" role="group"> 	
										  		<button type="button" class="fa fa-plus-square btn btn-outline-primary" data-toggle="modal" data-target="#fieldsModal"></button>										  		
										  		<button type="submit" class="fa fa-minus-square btn btn-outline-danger"></button>
									     							
											</div>  
										</form>
										
									</div>
										
								</div>
							</div>
						</div>	
						<div class="card-body">
							<?php
								if(sizeof($_SESSION['form']['pages'][$_SESSION['selectedPage']]['sections'][$_SESSION['selectedSection']]['fields']) == 0)
								{
									echo "<div class='alert alert-warning' role='alert' style='text-align: left;'><B>No Fields selected</B>		  </div>";
								}
								else
								{
									foreach($_SESSION['form']['pages'][$_SESSION['selectedPage']]['sections'][$_SESSION['selectedSection']]['fields'] as $key=>$field)
									{
										

										$key2 = "$key";
										if($_SESSION['selectedField'] === $key2)
										{
											$type = "alert-primary";
										}
										else
										{
											$type = "alert-success";
										}

										if($field['fieldType'] == "text")
										{
											echo '
											<form method="post" action="scripts/selectField.php">
									      		<input type="hidden" name="index" value="' . $key . '">
									      		<button name="submit" value="True" type="submit" class="alert ' . $type . ' btn-lg btn-block text-left" ><h6 class="btn alert-success">ABC...</h6> Text</button>
									      	</form>
									      	';
										}
										elseif($field['fieldType'] == "listselector")
										{
											echo '
											<form method="post" action="scripts/selectField.php">
									      		<input type="hidden" name="index" value="' . $key . '">
									      		<button name="submit" value="True" type="submit" class="alert ' . $type . ' btn-lg btn-block text-left" ><i class="btn btn-success fa fa-th-list"></i> List Selector</button>
									      	</form>
									      	';
										}
										elseif($field['fieldType'] == "numeric")
										{
											echo '
											<form method="post" action="scripts/selectField.php">
									      		<input type="hidden" name="index" value="' . $key . '">
									      		<button name="submit" value="True" type="submit" class="alert ' . $type . ' btn-lg btn-block text-left" ><h6 class="btn alert-success">123...</h6> Numeric</button>
									      	</form>
									      	';
										}
										elseif($field['fieldType'] == "photo")
										{
											echo '
											<form method="post" action="scripts/selectField.php">
									      		<input type="hidden" name="index" value="' . $key . '">
									      		<button name="submit" value="True" type="submit" class="alert ' . $type . ' btn-lg btn-block text-left" ><i class="btn alert-success fa fa-camera"></i> Photo</button>
									      	</form>
									      	';
										}
										elseif($field['fieldType'] == "statictext")
										{
											echo '
											<form method="post" action="scripts/selectField.php">
									      		<input type="hidden" name="index" value="' . $key . '">
									      		<button name="submit" value="True" type="submit" class="alert ' . $type . ' btn-lg btn-block text-left" ><i class="btn btn-outline-success fa fa-bars"></i> Static Text</button>
									      	</form>
									      	';
										}
										elseif($field['fieldType'] == "optionlist")
										{
											echo '
											<form method="post" action="scripts/selectField.php">
									      		<input type="hidden" name="index" value="' . $key . '">
									      		<button name="submit" value="True" type="submit" class="alert ' . $type . ' btn-lg btn-block text-left" ><i class="btn btn-success fa fa-list-ul"></i> Option List</button>
									      	</form>
									      	';
										}
										elseif($field['fieldType'] == "yesnona")
										{
											echo '
											<form method="post" action="scripts/selectField.php">
									      		<input type="hidden" name="index" value="' . $key . '">
									      		<button name="submit" value="True" type="submit" class="alert ' . $type . ' btn-lg btn-block text-left" ><i class="btn btn-success fa fa-check-square"></i> Yes/No/NA</button>
									      	</form>
									      	';
										}


										
									}
								}
							
						  	?>
						</div>
				</div>
					
<!-- End of Card 2 (FIELDS)  -->

			</div>

<!-- Start of Card 4 (Properties)  -->
			<div class="col-md-4">
				<div class="card">
  					<div class="card-body">

  						

  						<?php
  						if(sizeof($_SESSION['form']['pages'][$_SESSION['selectedPage']]['sections'][$_SESSION['selectedSection']]['fields']) > 0)
  						{
	  						$field = $_SESSION['form']['pages'][$_SESSION['selectedPage']]['sections'][$_SESSION['selectedSection']]['fields'][$_SESSION['selectedField']] ;

	  						echo "<div class='alert alert-secondary'><strong>" . strtoupper($field['fieldType']) . "</strong></div><hr>";
							echo "<form method='post' action='scripts/updateProperties.php'>";

	  						foreach($field as $key=>$property)
	  						{
	  							if(!($key != "field_Rules" xor $key !="values" xor $key =="fieldType"))
	  							{
		  							$propertyInput = getPropertyInput($key);
		  							echo "<strong>" . strtoupper($key) . "</strong> " . $propertyInput . "<br>";
	  							}
	  							
	  						}
	  						
	  						echo "<button type='submit' class='btn' style='border-width:medium; color:white; background-color:#00adef; border-color:#29a543'>Update</button></form>";

	  						if (array_key_exists('field_Rules', $field))
	  						{
	  							echo "<hr>";
	  							echo "<button type='button' class='btn btn-secondary' data-toggle='modal' data-target='#rulesModal'>Field Rules <i class='fa fa-wrench'></i></button>  " . sizeof($field['field_Rules']) . " Rules";
	  						}
	  						if(array_key_exists('values', $field))
	  						{
	  							echo "<hr><strong>Values</strong><br><form method='post' action='scripts/addValues.php'><ul class='list-inline'>";
	  							echo "<li class='list-inline-item'><input class='form-control' type='textbox' placeholder='Name' name='name' size='8'></li><li class='list-inline-item'> <input class='form-control' type='textbox' placeholder='Value' name='value' size='8'></li><li class='list-inline-item'><button type='submit' class='btn btn-success fa fa-plus'></button></li></ul></form>";
	  						

		  						if(sizeof($field['values']) > 0)
		  						{
		  							
		  							echo "<div class='container'><div class='row'><div class='col'></div><div class='col'><strong>Name</strong></div><div class='col'><strong>Value</strong></div></div>";
		  							foreach ($field['values'] as $key => $value) 
		  							{
		  								echo "<div class='row'><div class='col'><form method='post' action='scripts/removeValue.php'><input type='hidden' name='valueIndex' value='" . $key . "'><button class='btn btn-danger fa fa-times-circle'></button></div>";						
			  							foreach ($value as $key2 => $value2) 
			  							{
			  								echo "<div class='col'>" . $value2 . "</div>";	  	
			  							}
			  							echo "</div></form><hr>";
			  						}	
		  							echo "</div>";
		  						}
	  						}

						}
  						?>
   						
					</div>
				</div>
			</div>
<!-- End of Card 4 (Properties)  -->

		</div>
		<div class="row"><div class="col-md-12"></div></div>
		<div class="row"><div class="col-md-12"></div></div>
		<div class="row"><div class="col-md-12"></div></div>
		<div class="row"><div class="col-md-12"></div></div>
		<div class="row">
			<div class="col-md-4">


			</div>	
		</div>	
		
<!-- End of Operation Cards  -->
		
	</div>
<!-- End container-fluid -->

<!-- Field Picker Modal  -->
<!-- Modal -->
<div class="modal fade" id="fieldsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Field Selection</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form method="post" action="scripts/addField.php">
      		<input type="hidden" name="field" value="listselector">
      		<button name="submit" type="submit" class="btn btn-outline-secondary btn-lg btn-block text-left"><i class="btn btn-secondary fa fa-th-list"></i> List Selector</button>
      	</form>
      	<form method="post" action="scripts/addField.php">
      		<input type="hidden" name="field" value="numeric">
      		<button name="submit" type="submit" class="btn btn-outline-secondary btn-lg btn-block text-left"><h6 class="btn btn-secondary">123...</h6> Numeric input</button>
      	</form>
      	<form method="post" action="scripts/addField.php">
      		<input type="hidden" name="field" value="optionlist">
      		<button name="submit" type="submit" class="btn btn-outline-secondary btn-lg btn-block text-left"><i class="btn btn-secondary fa fa-list-ul"></i> Option List </button>
      	</form>
      	<form method="post" action="scripts/addField.php">
      		<input type="hidden" name="field" value="photo">
      		<button name="submit" type="submit" class="btn btn-outline-secondary btn-lg btn-block text-left"><i class="btn btn-secondary fa fa-camera"></i> Photo </button>
      	</form>
      	<form method="post" action="scripts/addField.php">
      		<input type="hidden" name="field" value="statictext">
      		<button name="submit" type="submit" class="btn btn-outline-secondary btn-lg btn-block text-left"><i class="btn btn-secondary fa fa-bars"></i> Static Text </button>
      	</form>
      	<form method="post" action="scripts/addField.php">
      		<input type="hidden" name="field" value="text">
      		<button name="submit" value="True" type="submit" class="btn btn-outline-secondary btn-lg btn-block text-left" ><h6 class="btn btn-secondary"> ABC...</h6> Text</button>
      	</form>
      	<form method="post" action="scripts/addField.php">
      		<input type="hidden" name="field" value="yesnona">
      		<button name="submit" type="submit" class="btn btn-outline-secondary btn-lg btn-block text-left"><i class="btn btn-secondary fa fa-check-square"></i> Yes/NO/NA</button>
      	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
        <script type="text/javascript">
			
			function changeField(field)
			{
				document.getItemById("fieldToAdd").value = field;
			}


			function addField(field){
				fields.push(field);
				fieldNumber = fieldNumber + 1;
				
			}

			function deleteField(field){
				fields.splice(field,1);
			}

		</script>

      </div>
    </div>
  </div>
</div>
<!-- End Field Picker Modal  -->

<!-- Section Edit Modal  -->

<!-- Modal -->
<div class="modal fade" id="editSection" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Section</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="scripts/editsection.php">
      <div class="modal-body">

      	<label>Section Name</label>
      	<input type="text" name="header">
      		
      	
        
      </div>
      <div class="modal-footer">
      	<button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>        
      </div>
      </form>
    </div>
  </div>
</div>

<!-- End Section Edit Modal  -->

<!-- Page Edit Modal  -->

<!-- Modal -->
<div class="modal fade" id="editPage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Page</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="scripts/editPage.php">
      <div class="modal-body">

      	<label>Page Name: </label>
      	<input type="text" name="newName">
      		
      	
        
      </div>
      <div class="modal-footer">
      	<button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>        
      </div>
      </form>
    </div>
  </div>
</div>

<!-- End Page Edit Modal  -->

<!-- File Exists Alert Modal  -->

<div class="modal" id="saveAlertModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">File Exists</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	 The File "<?php echo $formName; ?>" Already Exists.  Would you like to save anyway?
      
      </div>
      <div class="modal-footer">
       <form method="post" action="scripts/saveForm.php">
       		<?php	echo '<input type="hidden" name="formName" value="' . $_SESSION['form']['formName'] . '">' ?>
        	<button type="submit" class="btn btn-success">YES</button>
        
        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </form>										        
      </div>
    </div>
  </div>
</div>

<!-- End File Exists Alert Modal  -->

<!-- Rules  Modal  -->

<div class="modal fade bd-example-modal-lg" id="rulesModal" tabindex="-1" role="dialog" aria-labelledby="rulesModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Field Rules</h5> - 
        <?php
        $form = $_SESSION['form'];
        $page = $_SESSION['form']['pages'][$_SESSION['selectedPage']];
        $section = $page['sections'][$_SESSION['selectedSection']];
        $field = $section['fields'][$_SESSION['selectedField']];
         echo $page['pageName'] . "/" . $section['sectionName'] . "/" . $field['fieldName']; 
         ?>
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <p>
        	<strong style="color:teal;">Note:</strong> <i style="color:teal;">Field Rules are isolated to a single field and do not support conditions on multiple fields.</i>
    	</p>
      <div class="modal-body">
        <?php
        $rules = $field['field_Rules'];

        echo '<ul class="list-inline row">
			  <li class="list-inline-item alert alert-info col" style="font-size:small">When ' . $field['fieldName'] . '</li>
			  <li class="list-inline-item alert alert-info col" style="font-size:small">Value(s)</li>
			  <li class="list-inline-item alert alert-info col" style="font-size:small">Perform Action</li>
			  <li class="list-inline-item alert alert-info col" style="font-size:small">Otherwise Perform</li>
			  <li class="list-inline-item alert alert-info col" style="font-size:small">On Field/Section</li>
			  </ul>';
		echo '<form method="post" action="scripts/addRules.php">
				<ul class="list-inline row">
				<li class="list-inline-item alert col">
					<select class="form-control" name="when" >
				      <option>Equals</option>
				      <option>Does not Equal</option>				      
				    </select>
				</li>
				<li class="list-inline-item alert col">
					<select class="form-control" name="value">';
		foreach ($field['values'] as $key => $value) {
			echo "<option>" . $value['value'] . "</option>";
		}
				
		echo	'</select>
				</li>
				<li class="list-inline-item alert col">
					<select class="form-control" name="performAction">
				      <option>Hide</option>
				      <option>Show</option>
				      <option>Required</option>
				      <option>Not Required</option>
				      <option>Enable</option>
				      <option>Disable</option>
				    </select>
				</li>
				<li class="list-inline-item alert col">
					<select class="form-control" name="otherwisePerform">
				      <option>Hide</option>
				      <option>Show</option>
				      <option>Required</option>
				      <option>Not Required</option>
				      <option>Enable</option>
				      <option>Disable</option>
				    </select>
				</li>
				<li class="list-inline-item alert col">
					<select class="form-control" name="onFieldOrSection">';
		foreach ($form['pages'] as $key => $value) 
		{
			echo "<li><option>" . $value['pageName'] . "</option></li>";
			echo "<ol>";
			foreach ($page['sections'] as $key2 => $value2) 
			{
				echo "<li><option>" . $value2['sectionName'] . "</option></li>";
				echo "<ol>";
				foreach ($section['fields'] as $key3 => $value3) 
				{
					echo "<li><option>" . $value3['fieldName'] . "</option><li>";
				}
				echo "</ol>";
			}
			echo "</ol>";
		}

		echo	    '</select>
				</li>
			 
			  </ul>';
		echo ' <ul class="list-inline row">
				<li class="list-inline-item col">
			   <button type="submit" class="btn">Add Rule <i class="fa fa-plus"></i></button>
			   </li>
			   </ul>			   
			    </form>
			    <hr>';
        if(sizeof($rules) <= 0)
        {
        	echo "No rules are currently defined for this field. Click the Add Rule button below to add a rule.";
        }
        else
        {

        	echo "<ul class='list-inline'>";
        	foreach($rules as $key=>$rule)
        	{
        		
        		echo "<li><ul class='list-inline row'>";
        		echo "<form method='post' action='scripts/removeRule.php'><input type='hidden' name='ruleIndex' value='" . $key . "'>";
        		echo "<li><button type='submit' class='fa fa-times-circle btn btn-danger'></button></li>";
        		echo "</form>";
        		foreach($rule as $key2=>$rule2)
        		{
        			echo "<li class='list-inline-item alert alert-info col' style='font-size:small'>" . $rule2 . "</li>";
        		}   
        		echo "</ul></li>";     		
        	}	
        	echo "</ul></p>";
        }



        ?>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- End Rules Modal  -->

		<!-- Page Script -->
<script type="text/javascript">
	
	function setForm(){
		document.getElementById("formDropDwn").innerHTML = "Whoop!";
		document.getElementById("viewForm").href = "forms/form1.html";
	}

</script>


<!--  Boot Strap Scripts -->		
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



	</BODY>
</html>
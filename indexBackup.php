<?php
session_start();  // start session

// Check for the page setup array
if(!isset($_SESSION['form']['page1']))
{
	$_SESSION['form']['page1']['section1']['fields'] = array();
}

// Check for Session fields variable
if(!isset($_SESSION['form']['page1']['section1']['fields']))
{
 	// initialize Session fields as an empty array
 	echo "fields isn't set";
}

// Check for Session selectedField
if(!isset($_SESSION['selectedField']))
{
	// initialize Session selectedField
	$_SESSION['selectedField'] = '';
}

//  Check for Session selectedPage
if(!isset($_SESSION['selectedPage']))
{
	//  initialize Session selectPage
	$_SESSION['selectedPage'] = key($_SESSION['form']);
}

//   Testing outputs 



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
		<!--<script src="js/formbuilder.js"></script>-->
		
	</head>
	

	<BODY>

<!-- Start of Nav Bar -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  		<a class="navbar-brand" href="#" style="color:Turquoise">
	  			<img src="pics/logo.jpg" width="50" height="50" alt=""> <strong>FORM BUILDER</strong>
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
								 			<i class="fa fa-floppy-o"></i> Save    
								 		</div>
								 		<div class="col">
								 			<i class="fa fa-cog"></i> Configure
								 		</div>
								 		<div class="col">
								 			<i class="fa fa-plus"></i> New
								 		</div>
								 	</div>	
							 	</div>
							</div>
							<div class="col-md-3"></div>
							<div class="col-md-4">	
								<form class="form-inline my-2 my-lg-0" method="post" action="scripts/searchForms.php">
								<!-- Example single danger button -->
								<div class="btn-group">
								  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								    Select Form
								  </button>
								  <div class="dropdown-menu">

								  	<?php  
								  		$forms = scandir("forms");

								  		if(sizeof($forms) > 2)
								  		{
									  		foreach ($forms as $form) 
									  		{
												$formToPrint = substr($form, 0, strpos($form, "."));

												if(strlen($formToPrint) > 0)
												{
													echo '<a class="dropdown-item" href="#">' . $formToPrint . '</a>';
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
								
						      		
						      		<button class="btn btn-outline-success my-2 my-sm-0 fa fa-folder-open" type="submit"></button>
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
								foreach($_SESSION['form'] as $key=>$page)
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
										  <B>' . $key . '</B><i class="fa fa-pencil"></i>
										</button>
									</form>';
								}	
							?>
						</div>
					</div>
<!-- End of Card 1 (PAGES)  -->

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
								if(sizeof($_SESSION['form'][$_SESSION['selectedPage']]['section1']['fields']) == 0)
								{
									echo "<div class='alert alert-warning' role='alert' style='text-align: left;'><B>No Fields selected</B>		  </div>";
								}
								else
								{
									foreach($_SESSION['form'][$_SESSION['selectedPage']]['section1']['fields'] as $key=>$field)
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

										if($field == "text")
										{
											echo '
											<form method="post" action="scripts/selectField.php">
									      		<input type="hidden" name="index" value="' . $key . '">
									      		<button name="submit" value="True" type="submit" class="alert ' . $type . ' btn-lg btn-block text-left" ><h6 class="btn alert-success">ABC...</h6> Text</button>
									      	</form>
									      	';
										}
										elseif($field == "numeric")
										{
											echo '
											<form method="post" action="scripts/selectField.php">
									      		<input type="hidden" name="index" value="' . $key . '">
									      		<button name="submit" value="True" type="submit" class="alert ' . $type . ' btn-lg btn-block text-left" ><h6 class="btn alert-success">123...</h6> Numeric</button>
									      	</form>
									      	';
										}
										elseif($field == "photo")
										{
											echo '
											<form method="post" action="scripts/selectField.php">
									      		<input type="hidden" name="index" value="' . $key . '">
									      		<button name="submit" value="True" type="submit" class="alert ' . $type . ' btn-lg btn-block text-left" ><i class="btn alert-success fa fa-camera"></i> Photo</button>
									      	</form>
									      	';
										}
										elseif($field == "statictext")
										{
											echo '
											<form method="post" action="scripts/selectField.php">
									      		<input type="hidden" name="index" value="' . $key . '">
									      		<button name="submit" value="True" type="submit" class="alert ' . $type . ' btn-lg btn-block text-left" ><i class="btn btn-outline-success fa fa-bars"></i> Static Text</button>
									      	</form>
									      	';
										}
										elseif($field == "optionlist")
										{
											echo '
											<form method="post" action="scripts/selectField.php">
									      		<input type="hidden" name="index" value="' . $key . '">
									      		<button name="submit" value="True" type="submit" class="alert ' . $type . ' btn-lg btn-block text-left" ><i class="btn btn-success fa fa-list-ul"></i> Option List</button>
									      	</form>
									      	';
										}
										elseif($field == "yesnona")
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
										<form method="post" action="addSection">
									  		<button type="submit" class="fa fa-plus-square btn btn-outline-primary"></button>
										</form>
										<form>
											<button type="button" class="fa fa-pencil-square-o btn btn-outline-secondary" data-toggle="modal" data-target="#editSection"></button>
										</form>
										<form method="post" action="removeSection">
									  		<button type="button" class="fa fa-minus-square btn btn-outline-danger"></button>
										</form>

									</div>
								</div>
							</div>	
						</div>
					</div>
					<div class="card-body">
					  	<div class="alert alert-success" role="alert" style="text-align: left;">
						  <B>Section 1</B>
						</div>
					</div>
				</div>
<!-- End of Card 3 (SECTIONS)  -->
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
      		<input type="hidden" name="field" value="text">
      		<button name="submit" value="True" type="submit" class="btn btn-outline-secondary btn-lg btn-block text-left" ><h6 class="btn btn-secondary"> ABC...</h6> Text</button>
      	</form>
      	<form method="post" action="scripts/addField.php">
      		<input type="hidden" name="field" value="statictext">
      		<button name="submit" type="submit" class="btn btn-outline-secondary btn-lg btn-block text-left"><i class="btn btn-secondary fa fa-bars"></i> Static Text </button>
      	</form>
      	<form method="post" action="scripts/addField.php">
      		<input type="hidden" name="field" value="numeric">
      		<button name="submit" type="submit" class="btn btn-outline-secondary btn-lg btn-block text-left"><h6 class="btn btn-secondary">123...</h6> Numeric input</button>
      	</form>
      	<form method="post" action="scripts/addField.php">
      		<input type="hidden" name="field" value="photo">
      		<button name="submit" type="submit" class="btn btn-outline-secondary btn-lg btn-block text-left"><i class="btn btn-secondary fa fa-camera"></i> Photo </button>
      	</form>
      	<form method="post" action="scripts/addField.php">
      		<input type="hidden" name="field" value="optionlist">
      		<button name="submit" type="submit" class="btn btn-outline-secondary btn-lg btn-block text-left"><i class="btn btn-secondary fa fa-list-ul"></i> Option List </button>
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
      <form method="post" action="scripts/editSection.php">
      <div class="modal-body">

      	<label>Section Header</label>
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


	
		
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


	</BODY>
</html>
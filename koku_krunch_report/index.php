<!DOCTYPE html>
<html lang="en">
<head>
  	<title>Report</title>
  	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  	<script src="https://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  	<style>.asteriskField{color: red;}</style>
	 <script>
		$( function() {
			$( "#datepicker" ).datepicker({ changeMonth: true, changeYear: true });
			$( "#datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
			$( "#datepicker1" ).datepicker({ changeMonth: true, changeYear: true });
			$( "#datepicker1" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
		} );
	 </script>
  	<style type="text/css">
		.asteriskField{color: red;}
	</style>
</head>

<body>
<?php
	include_once('../session.php');
	include_once("../db_connection_asterisk.php");	
?>

<?php
	include_once('../navbar.php');
	//require $_SERVER['DOCUMENT_ROOT'].'/loginphp/navbar.php';
?>
	<div class="container">
		<div class="col-sm-offset-0 col-sm-12">
		  	<div class="panel panel-primary">
			    <div class="panel-heading text-center">
			    	Nestle Report Download for KOKU KRUNCH
			    </div>
			    <div class="panel-body">
					<form class="form-inline" method="get" action="download_report.php" onSubmit="return confirm('Do you want to download in XLS?');">
						<div class="form-group">
			                <label for="">Select Agent
			                  	<span class="asteriskField">
			                      	*
			                    </span>
			                </label>
			                <div class="input-group">
			                  	<select class="form-control" id="" name="user" required="">
			                    	<option value="">-----Select Agent-----</option>
									<option value="All Agent">All Agent</option>
			                    	<?php
			                      		$sqlUser = "SELECT user_id, user, full_name FROM vicidial_users WHERE  NOT user_id = 4";
			                      		$resultUser = mysqli_query($connAsterisk, $sqlUser);

			                      		if ($resultUser->num_rows > 0) {
			                          		while($rowUser = $resultUser->fetch_assoc()) {
			                    	?>
			                           			<option value="<?php echo $rowUser["full_name"]; ?>"><?php echo $rowUser["full_name"]; ?></option>
			                    	<?php
			                          		}
			                      		} 
			                    	?>
			                    
			                  	</select>
			                </div>
		              	</div>
						<div class="form-group">
						  <label class="control-label requiredField" for="date">
							Start Date
							<span class="asteriskField">
							  *
							</span>
						  </label>
						  <div class="input-group">
							<input class="form-control" id="datepicker" name="start_date" placeholder="YYYY-MM-DD" type="text" required="" />
						  </div>
					  	</div>
					  	<div class="form-group">
						  <label class="control-label requiredField" for="date">
							End Date
							<span class="asteriskField">
							  *
							</span>
						  </label>
						  <div class="input-group">
							<input class="form-control" id="datepicker1" name="end_date" placeholder="YYYY-MM-DD" type="text" required="" />
						  </div>
					  	</div>

		              	<div class="form-group">
		                	<button class="btn btn-primary " name="submit" type="submit">Download</button>
		              	</div>
					</form>
			    </div>
		  	</div>	
	  	</div>				  
	</div>
</body>
</html>

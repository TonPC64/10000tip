<?
session_start();
?>
<html>

<head>

  <meta charset="tis-620">
  <title>Signup to 10,000TIP</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<style type="text/css">
		body{
    background-color: #C5D2E0;
}
.centered-form{
	margin-top: 60px;
}

.centered-form .panel{
	background: rgba(255, 255, 255, 0.8);
	box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
}
	</style>
</head>

<body >





 <div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Register Panel</h3>
			 			</div>
			 			<div class="panel-body">
			    		<form role="form" action="register2.php" method="POST">

			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input type="text" name="first_name" id="first_name" class="form-control input-sm" placeholder="First Name">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="Last Name">
			    					</div>
			    				</div>
			    			</div>

							<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input type="date" name="bdate" i class="form-control input-sm" >
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="radio" name="sex" value="Male">&nbsp;Male
										&nbsp;&nbsp;<input type="radio" name="sex" value="Female">&nbsp;Female
			    					</div>
			    				</div>
			    			</div>
							
							<div class="form-group">
			    				
								<textarea name="address" rows="3" cols="20" class="form-control input-sm" placeholder="Address"></textarea>
			    			</div>


			    			<div class="form-group">
			    				<input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
			    			</div>

							<div class="form-group">
			    				<input type="text" name="username" id="username" class="form-control input-sm" placeholder="Username">
			    			</div>

			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password">
			    					</div>
			    				</div>
			    			</div>

							<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="submit" value="Register" class="btn btn-info btn-block">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						
										<input type="button" value="Cancel" onclick=window.location="login.php" class="btn btn-danger btn-block">
			    					</div>
			    				</div>
			    			</div>
			    			
			    			
			    		
			    		</form>
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>








</body>
</html>
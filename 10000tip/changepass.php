<?
session_start();
?>
<html>

<head>

  <meta charset="tis-620">
  <title>Change Password</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<style type="text/css">
		body{
    background-color: #e5e5e5;
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

<?
	if($_SESSION["userid"]!=NULL){
?>



 <div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Change Pasword</h3>
			 			</div>
			 			<div class="panel-body">
			    		<form role="form" action="newpass.php" method="POST">

			    		

							<div class="form-group">
			    				<input type="password" name="opassword" id="password" class="form-control input-sm" placeholder="Old Password">
			    			</div>

			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password" id="password" class="form-control input-sm" placeholder="New Password">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirm New Password">
			    					</div>
			    				</div>
			    			</div>

							<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="submit" value="Change" class="btn btn-info btn-block">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						
										<input type="button" value="Cancel" onclick=window.location="account.php" class="btn btn-danger btn-block">
			    					</div>
			    				</div>
			    			</div>
			    			
							<?if($_GET["error"]==1){?>
							<br><font size="4" color="ff0000">*Old Password Incorrect.</font>
							<?}else if($_GET["error"]==2){?>
			    			<br><font size="4" color="ff0000">*Both Password not equal.</font>
			    			<?}else if($_GET["error"]==3){?>
							<br><font size="4" color="ff0000">*Old Password Incorrect and <br>Both Password not equal.</font>
							<?}?>

							
			    		</form>
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>

<?
	} else echo "<br><br><br><br><center><font size=\"8\"><strong>กรุณาเข้าระบบก่อน</strong></font><br><a href=\"login.php\"><font size=\"6\" >go to login page</font></a></center>";
?>




</body>
</html>
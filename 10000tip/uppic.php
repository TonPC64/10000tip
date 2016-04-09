<?
session_start();
$host="203.172.133.126";
$user="tonp";
$pass="123456";
$db="webboard";
$conn= mysql_connect($host,$user,$pass);

if(!$conn) die ("Can't connect mysql");

mysql_select_db($db,$conn) or die ("Can't connect DB");

mysql_query("SET character_set_results=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8");
$usernameId=$_SESSION["userid"];

$sql="select * from account where usernameId = '$usernameId'";
		$result= mysql_query($sql,$conn);
		$rs = mysql_fetch_array($result);
?>
<html>

<head>

  <meta charset="tis-620">
  <title>Profile <?=$rs["name"]?></title>
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
			    		<h3 class="panel-title">Add Profile Picture</h3>
			 			</div>
			 			<div class="panel-body">
			    		<form role="form" action="upload.php" method="POST" enctype="multipart/form-data">

			    			<div class="form-group">
			    				<input type="file" name="upfile"  class="form-control input-sm" accept="image/x-png, image/gif, image/jpeg, image/jpg, image/pjpeg"  >
			    			</div>

							<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="submit" value="Upload" class="btn btn-info btn-block">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						
										<input type="button" value="Cancel" onclick=window.location="account.php" class="btn btn-danger btn-block">
			    					</div>
			    				</div>
			    			</div>
			    			
			    			<?if($_GET["error"]==1){?>
							<br><font size="4" color="ff0000">*Size of file more than 4 MB. Try agin!.</font>
							<?}else if($_GET["error"]==2){?>
			    			<br><font size="4" color="ff0000">*Type of file is not Picture.</font>
			    			<?}elseif($_GET["error"]==3){?>
			    			<br><font size="4" color="ff0000">*Please select Picture.</font>
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
</html><?mysql_close($conn);?>
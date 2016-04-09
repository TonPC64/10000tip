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
  <title>Edit <?=$rs["name"]?></title>
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
			    		<h3 class="panel-title">Edit Account Panel</h3>
			 			</div>
			 			<div class="panel-body">
			    		<form role="form" action="update.php" method="POST">

			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input type="text" name="first_name" id="first_name" class="form-control input-sm" placeholder="First Name" value="<?=$rs["name"]?>">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="Last Name" value="<?=$rs["lastname"]?>">
			    					</div>
			    				</div>
			    			</div>

							<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input type="date" name="bdate" i class="form-control input-sm" value="<?=$rs["bdate"]?>">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="radio" name="sex" value="Male" <?if($rs["sex"]=="Male") echo "checked";?>>&nbsp;Male
										&nbsp;&nbsp;<input type="radio" name="sex" value="Female" <?if($rs["sex"]=="Female") echo "checked";?>>&nbsp;Female
			    					</div>
			    				</div>
			    			</div>
							
							<div class="form-group">
			    				
								<textarea name="address" rows="3" cols="20" class="form-control input-sm" placeholder="Address"><?=$rs["address"]?></textarea>
			    			</div>


			    			<div class="form-group">
			    				<input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address" value="<?=$rs["email"]?>">
			    			</div>

							

							<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="submit" value="Edit Account" class="btn btn-info btn-block">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						
										<input type="button" value="Cancel" onclick=window.location="account.php" class="btn btn-danger btn-block">
			    					</div>
			    				</div>
			    			</div>
			    			
			    			
			    		
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
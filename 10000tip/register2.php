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
						

$check=true;
$fname=$_POST["first_name"];
$lname=$_POST["last_name"];
$bdate=$_POST["bdate"];
$sex=$_POST["sex"];
$addr=$_POST["address"];
$email=$_POST["email"];
$user=$_POST["username"];
$pass=$_POST["password"];
$cpass=$_POST["password_confirmation"];

if($fname==NULL&&$lname==NULL){
$check=false;
$message.="<br>*คุณยังไม่ได้กรอกข้อมูลชื่อและนามสกุล";
}
else if($fname==NULL){
$check=false;
$message.="<br>*คุณยังไม่ได้กรอกข้อมูลชื่อ";
}
else if($lname==NULL){
$check=false;
$message.="<br>*คุณยังไม่ได้กรอกข้อมูลนามสกุล";
}

if($sex==NULL){
$check=false;
$message.="<br>*คุณยังไม่ได้เลือกเพศ";
}
if($user==NULL){
$check=false;
$message.="<br>*คุณยังไม่ได้กรอกข้อมูลชื่อผู้ใช้";
}

if($pass==NULL){
$check=false;
$message.="<br>*คุณยังไม่ได้กรอกข้อมูลรหัสผ่าน";
}

if($pass!=$cpass) {
$check=false;
$message.="<br>*รหัสผ่านทั้ง 2 ไม่ตรงกัน";
}


?>



 <div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Register Panel</h3>
			 			</div>
			 			<div class="panel-body">
			    		<form role="form" action="confirm.php" method="POST">

						<input type="hidden" name="first_name" value="<?=$fname?>">
						<input type="hidden" name="last_name" value="<?=$lname?>">
						<input type="hidden" name="bdate" value="<?=$bdate?>">
						<input type="hidden" name="sex" value="<?=$sex?>">
						<input type="hidden" name="address" value="<?=$addr?>">
						<input type="hidden" name="email" value="<?=$email?>">
						<input type="hidden" name="username" value="<?=$user?>">
						<input type="hidden" name="password" value="<?=$pass?>">

<div class="row">
<div class="col-xs-12">
<div class="form-group">          
  <table class="table table-striped" >
    <tbody>
      <tr>
        <td ><strong>First Name:</strong></td>
        <td><?=$fname?></td>

      </tr>
      <tr>
        <td><strong>Last Name:</strong></td>
        <td><?=$lname?></td>
  
      </tr>
      <tr>
        <td><strong>Birthday:</strong></td>
        <td><?=$bdate?></td>
      </tr>
	  <tr>
        <td><strong>Gender:</strong></td>
        <td><?=$sex?></td>
      </tr>
	  <tr>
        <td><strong>Address:</strong></td>
        <td><?=$addr?></td>
      </tr>
	  <tr>
        <td><strong>Email Address:</strong></td>
        <td><?=$email?></td>
      </tr>
	  <tr>
        <td><strong>Username:</strong></td>
        <td><?=$user?></td>
      </tr>
	  <tr>
        <td><strong>Password:</strong></td>
        <td><?=$pass?></td>
      </tr>

	  <?if(!$check){?>

	  <tr>
        <td colspan=2 ><strong><font size="4" color="#ff0000"><?=$message?></font></strong></td>
      </tr>

	  <?}?>
    </tbody>
  </table>
</div>
</div>
</div>
							<?if($check){?>
							<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="submit" value="Confirm" class="btn btn-info btn-block">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="button" value="Back" onclick=window.location=history.back(); class="btn btn-danger btn-block">
										
			    					</div>
			    				</div>
			    			</div>
			    			<?}else{?>
							
			    					<div class="form-group">
			    						<input type="button" value="Back" onclick=window.location=history.back(); class="btn btn-danger btn-block">
										
			    					</div>
			    				

			    			<?}?>
			    		
						

			    		</form>
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>








</body>
</html>
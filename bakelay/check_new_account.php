<?php
session_start();
$_SESSION["page"]="register";
include("connect.php");
?>
<html>
    <head>
        <title>Bakelay</title>
        <?php  include("boots.php"); ?>  
        <meta charset="utf-8">

    </head>
    <body>
        <?php  include("navbar.php"); ?> 
        <div class="container" style="padding-top: 60px;">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8  col-sm-offset-2 col-md-offset-2">
        	<div class="panel panel-default">
        		<div class="panel panel-default" style="
    border: 0px;
    
    margin-bottom: 0px;
">
        		<div class="panel-heading" style="
    height: 60px;color:#FFF;background-color:#2CE8D3;border-color:#000;
                                            
">
			    		<h3 class="panel-title" style="
    margin-top: 13px;
"><center><b>REGISTER</b></center></h3>
			 			</div>
			 			<div class="panel-body">
			    		<form role="form" action="addaccount.php" method="POST">
						<input type="hidden" name="first_name" value="<?=$_POST["first_name"]?>">
						<input type="hidden" name="last_name" value="<?=$_POST["last_name"]?>">
						<input type="hidden" name="bdate" value="<?=$_POST["bdate"]?>">
						<input type="hidden" name="tel" value="<?=$_POST["tel"]?>">
						<input type="hidden" name="address" value="<?=$_POST["address"]?>">
						<input type="hidden" name="email" value="<?=$_POST["email"]?>">
						<input type="hidden" name="username" value="<?=$_POST["username"]?>">
						<input type="hidden" name="password" value="<?=$_POST["password"]?>">

<div class="row">
<div class="col-xs-12">
<div class="form-group" style="
    margin-bottom: 0px;
">          
  <table class="table ">
    <tbody>
      <tr>
        <td><strong>First Name:</strong></td>
        <td><?=$_POST["first_name"]?></td>

      </tr>
      <tr>
        <td><strong>Last Name:</strong></td>
        <td><?=$_POST["last_name"]?></td>
  
      </tr>
      <tr>
        <td><strong>Birthday:</strong></td>
        <td><?=$_POST["bdate"]?></td>
      </tr>
	  <tr>
        <td><strong>Tel :</strong></td>
        <td><?=$_POST["tel"]?></td>
      </tr>
	  <tr>
        <td><strong>Address:</strong></td>
        <td><?=$_POST["address"]?></td>
      </tr>
	  <tr>
        <td><strong>Email Address:</strong></td>
        <td><?=$_POST["email"]?></td>
      </tr>
	  <tr>
          <?php
        $check=true;
          $sql = "select * from account where username = '".$_POST['username']."' ";
            $query = mysqli_query($conn,$sql);
            $rs= mysqli_num_rows($query);

            if($rs==0){
                $username = $_POST["username"];
            }
            else {
                $check=false;
                $username = " <font color=\"red\">Username <font color=\"black\">".$_POST['username']."</font> ถูกใช้แล้ว กรุณาเปลี่ยนใหม่</font>";
            }
          ?>
          
        <td><strong>Username:</strong></td>
        <td><?=$username?></td>
      </tr>
	  <tr>
          <?php 
              if($_POST["password_confirmation"]!=$_POST["password"]){
                $pass = "<font color=\"red\">Password ทั้งคู่ไม่ตรงกัน กรุณากรอกใหม่</font>";
                $check=false;
          }else $pass = $_POST["password"];
          ?>
        <td><strong>Password:</strong></td>
        <td><?=$pass?></td>
      </tr>

	      </tbody>
  </table>
</div>
</div>
</div>
                            <?php if($check){?><div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group" style="
    margin-bottom: 0px;
">
			    						<input type="submit" value="Confirm" class="btn btn-info btn-block btn-lg" >
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group" style="
    margin-bottom: 0px;
">
			    						<input type="button" value="Back" onclick="window.location=history.back();" class="btn btn-danger btn-lg btn-block">
										
			    					</div>
			    				</div>
			    			</div>
                            <?php }else{?>			    		
						      <div class="form-group" style="
    margin-bottom: 0px;
">
			    						<input type="button" value="Back" onclick="window.location=history.back();" class="btn btn-danger btn-lg btn-block">
										
			    					</div>
                            <?php } ?>
			    		</form>
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>
    </body>
</html>
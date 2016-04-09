<?
session_start();
?><!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">

  <title>Login</title>

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
.panel-default>.panel-heading {
  color: #FFFFFF;
  background-color: #282830;
  border-color: #000000;
  text-align: center;
  padding: 20px;
}
* {
  box-sizing: border-box;
}
fieldset {
  border: none;
  margin: 0;
}
#login-form fieldset {
  background: #fff;
  border-radius: 0 0 5px 5px;
  padding: 20px;
  position: relative;
}
a {
  color: #2C3E50;
  text-decoration: none;
}

	</style>

</head>

<body>
	<?
	if($_SESSION["userid"]!=NULL){
echo "<script langquage='javascript'>";
		echo "window.location =history.go(-1);";
		echo "</script>";	
}
	?>

<div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading" style="
    height: 60px;
">
			    		<h3 class="panel-title">LOGIN</h3>
			 			</div>
			 			<div class="panel-body">
			    		

			    			<fieldset>
			
		


      <form action="check_login.php" method="post">
		
        <input type="text" required name="username" value="<?if(isset($_COOKIE["user"])){echo $_COOKIE["user"];} else {echo"Username";}?>" onBlur="if(this.value=='')this.value='Username'" onFocus="if(this.value=='Username')this.value='' " class="form-control input-sm" style="
    padding-top: 20px;
    padding-bottom: 20px;
"> <!-- JS because of IE support; better: placeholder="Email" -->

        <input type="password" name="password" required value="Password" onBlur="if(this.value=='')this.value='Password'" onFocus="if(this.value=='Password')this.value='' " class="form-control input-sm" style="
    padding-top: 20px;
    padding-bottom: 20px;
"> <!-- JS because of IE support; better: placeholder="Password" -->
		
		<table align =center>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td><input type="checkbox" name="remember" value="check" > ให้ฉันอยู่ในระบบต่อไป </td>
		</tr>
		<tr>
			<td align=center><a href="register.php">สมัครสมาชิก</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="forget.php">ลืมรหัสผ่าน</a></td>
		</tr>
		</table>
        

        <footer class="clearfix">
			 <?php
				if($_GET["tx"]!=null){
			 ?>
			 <p><span class="info"></span><font  color="#ff0000"><strong><center>Username and Password Incorrect!</center></strong></font></a></p>
			 <?
		}
			 ?>
        </footer>

      

    </fieldset>

							
			   <div class="form-group">
			    						<input type="submit" value="LOGIN" class="btn btn-info btn-block">
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
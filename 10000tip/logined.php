<?
session_start();
?><!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">

  <title>Login</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>
  <div class="container">
 
  <div id="login-form">

    <h3>Login</h3>

    <fieldset>
			
		


      <form action="check_login.php" method="post">
		
        <input type="text" required name="username" value="<?if(isset($_COOKIE["user"])){echo $_COOKIE["user"];} else {echo"Username";}?>" onBlur="if(this.value=='')this.value='Username'" onFocus="if(this.value=='Username')this.value='' "> <!-- JS because of IE support; better: placeholder="Email" -->

        <input type="password" name="password" required value="Password" onBlur="if(this.value=='')this.value='Password'" onFocus="if(this.value=='Password')this.value='' "> <!-- JS because of IE support; better: placeholder="Password" -->
		
		<table align =center>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td><input type="radio" name="remember" value="check" ><input type="checkbox" name=""> ให้ฉันอยู่ในระบบต่อไป </td>
		</tr>
		<tr>
			<td align=center><a href="register.php">สมัครสมาชิก</a>&nbsp;&nbsp;&nbsp;&nbsp;ลืมรหัสผ่าน</td>
		</tr>
		</table>
        <input type="submit" name="submit" value="Login">

        <footer class="clearfix">
			 <?php
				if($_GET["tx"]!=null){
			 ?>
			 <p><span class="info">?</span>Username and Password Incorrect!</a></p>
			 <?
		}
			 ?>
        </footer>

      </form>

    </fieldset>

  </div> <!-- end login-form -->

</div>

</body>

</html>
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

?>
<html>

<head><title>10,000TIP</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<meta charset="utf-8">

<style type="text/css">
body{
 background-color: #C5D2E0;
}
.centered-form{
	margin-top: 80px;
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
a {
  color: #2C3E50;
  text-decoration: none;
}

	</style>
	<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
</head>

<body id="page-top" class="index">

<!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php" style="padding-top: 0px;"><img src="img/10000.png"  height="60"  ></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="index.php" style="
    padding-left: 5px;
    padding-right: 5px;
"><font size="4" >หน้าหลัก</font></a>
                    </li>
                    <li class="page-scroll">
                       <a href="addtopic.php" style="
    padding-left: 5px;
    padding-right: 5px;
"><font size="4" >ตั้งกระทู้</font></a>
                    </li>
                    <li class="page-scroll">
                        <a href="topic.php" style="
    padding-left: 5px;
    padding-right: 5px;
"><font size="4" >กระทู้ทั้งหมด</font></a>
                    </li>
					<?if($_SESSION["name"]==NULL){?>
					<li class="page-scroll">
                        <a href="login.php" style="
    padding-left: 5px;
    padding-right: 5px;
"><font size="4" >Login | Register</font></a>
                    </li>
					
					<?}else{?>
					<li class="page-scroll" style="
    width: 30px;
    height: 60px;
    padding-right: 0px;
    margin-right: 12px;
">
					<?
					$sql="select * from account where usernameId='".$_SESSION["userid"]."'";
					$resultp= mysql_query($sql,$conn);
					$rsp =mysql_fetch_array($resultp);
					if($rsp["pic"]!=NULL)  $spic="img_view.php?picid=".$rsp["usernameId"];
					else $spic="img/".$rsp["picture"];
					?>
					<a href="account.php?friend=<?=$rs["usernameId"]?>" style="
    padding-top: 14px;
"><img src="<?=$spic?>"   border="0" alt="" class="img-thumbnail" style="
    height: 32px;
    padding: 0px;
"></a>
					</li>
					<li class="page-scroll">
                        <a href="account.php" style="
    padding-right: 5px;
"><font size="4" ><?=$_SESSION["name"]?></font></a>
                    </li>
					<li class="page-scroll">
                        <a href="logout.php" onclick="return confirm('แน่ใจหรือว่าจะออกจากระบบ?')" style="
    padding-left: 5px;
   
"><font size="4" >Logout</font></a>
                    </li>
					<?}?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
	
	<?
	if($_SESSION["userid"]!=NULL){
	?>

<div class="container">
  <h2>Striped Rows</h2>         
  <table class="table table-striped">
    <thead>
      <tr>
        <th><font size="6" >ตั้งกระทู้</font></th>

      </tr>
    </thead>
    <tbody>

      <tr>
        <td>

		<form method="post" action="newtopic.php">
		<table width="100%">
		
		<tr>
			<td width="100" align="center"><strong>ชื่อกระทู้</strong></font></td>
			<td><input type="text" name="topicname" class="form-control" required></td>
		</tr>
		<tr>
			<td colspan=2><br><textarea name="detail" rows="15" cols="100" class="form-control"></textarea></td>
		</tr>

		<tr>
			<td colspan=2 align=center><br><input type="submit" name="submit" value="New Topic" class="btn btn-default" ></td>
		</tr>

		</table>
		</form>

		</td>
      </tr>

    </tbody>
  </table>
</div>

<?
	} else {?>
	

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
			 <p><span class="info">?</span>Username and Password Incorrect!</a></p>
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
<?}?>
<?mysql_close($conn);?>
</body>
<html>
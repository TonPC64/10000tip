<?
session_start();
$host="localhost";
$user="tonp";
$pass="123456";
$db="webboard";
$conn= mysql_connect($host,$user,$pass);

if(!$conn) die ("Can't connect mysql");

mysql_select_db($db,$conn) or die ("Can't connect DB");

mysql_query("SET character_set_results=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8");

if($_GET["friend"]==NULL) $usernameId=$_SESSION["userid"];
else  $usernameId=$_GET["friend"];
?>

<?
		$sql="select * from account where usernameId = '".$usernameId."'";
		$result= mysql_query($sql,$conn);
		$rs = mysql_fetch_array($result);

function checkuser($userId,$conn){
$sql = "select * from account where usernameId='$userId'";
$result= mysql_query($sql,$conn);
$rs =mysql_fetch_array($result);

return $rs["name"];
}

function checkpic($userId,$conn){
$sql = "select * from account where usernameId='$userId'";
$result= mysql_query($sql,$conn);
$rs =mysql_fetch_array($result);

return $rs["pic"];
}

function profile($userId,$conn){
$sql = "select * from account where usernameId='$userId'";
$result= mysql_query($sql,$conn);
$rs =mysql_fetch_array($result);

return $rs["picture"];
}
?>



<html>

<head><title><?=$rs["name"]?> World</title>
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
					<a href="account.php?friend=<?=$_SESSION["userid"]?>" style="
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
	if($_SESSION["userid"]!=NULL||$usernameId!=NULL){
?>
	<div class="container">
  <h2>Account</h2>
  <div class="table-responsive">          
  <table class="table table-striped" width="100%">

		<tr>
        <td colspan="2" align=center><a href="account.php?friend=<?=$usernameId?>"><font size="6"><?=$rs["name"]?>  World</font></a></td>
      </tr>

	  
	
      <tr>
        <td width="170"><center>
		<?
		if($rs["pic"]!=NULL)  $spic="img_view.php?picid=".$usernameId;
		else $spic="img/".$rs["picture"];
		?>
		
		
		<img src="<?=$spic?>" width="170" height="170" border="0" alt="" class="img-thumbnail"><br/>
		<?if($usernameId==$_SESSION["userid"]){?>
		
			<input type="button" value="เปลี่ยนรูปโปรไฟล์" class="btn btn-xs" onclick=window.location="uppic.php">
		
		<?}?>
		</center>
		<table  class="table table-striped">
		<tr>
			<td colspan="3"><strong>
			<?=$rs["name"]."&nbsp;&nbsp;&nbsp;".$rs["lastname"]?><br>
			<font size="2" ><?if($rs["email"]!=NULL){?><?=$rs["email"]?><br><?}?>
			<?="Gender : ".$rs["sex"]?><br>
			<?if($rs["address"]!=NULL){?><?=$rs["address"]?><br><?}?>
			<?if($rs["bdate"]!=NULL){?><?=$rs["bdate"]?><br><?}?></font>
			</strong></td>
		</tr>
		
		<tr>
		
		<td align=left><font size="2" color="">

		<?if($usernameId==$_SESSION["userid"]){?><input type="button" value="แก้ไขข้อมูล"  class="btn  btn-xs" onclick=window.location="editaccount.php" ><?}?>
	
		</font>
		<td>
		<td>	
		<?if($usernameId==$_SESSION["userid"]){?><input type="button" value="เปลี่ยนรหัสผ่าน"  class="btn  btn-xs" onclick=window.location="changepass.php" ><?}?>
		</td>
		
		</tr>
		
		</table>
		</td>
       <td>

		<table class="table ">
		
		<tr>
			<td>
			
			<form method="post" action="post.php">
			<table class="table table-striped">
			<tr>
			<?if($_SESSION["userid"]!=NULL||$_SESSION["permission"]=="admin"){?>
				<td style="
    padding-right: 5px;
"><strong>Update Status</strong><br><textarea name="status" rows="3" class="form-control input-sm" style="resize:none"></textarea>
			
</td><td width="30" valign="bottom" style="
    padding-left: 0px;
    width: 8px;
    padding-top: 31px;
"><input  type="submit" class="btn btn-primary btn-s" value="Post" style="
    height: 71px;
    padding-top: 6px;
    margin-top: 0px;
    padding-left: 15px;
    border-left-width: 0px;
	font-size: 25;
"></td><?}?>
			</tr>

			
			</table>
			<input type="hidden" name="friend" value="<?=$usernameId?>">
			</form>
			
			
			</td>
			
		</tr>

		<?


		$sql="SELECT * FROM status WHERE desinationId = '".$usernameId."' order by statusId desc";
				$resultstatus= mysql_query($sql,$conn);
				while($rsstatus = mysql_fetch_array($resultstatus)){?>
		<tr>
		<td colspan="2">
		<table width="100%">
				
		<?
				$sql="SELECT count(mentId) FROM commentStatus WHERE statusId = '".$rsstatus["statusId"]."'";
				$resultc= mysql_query($sql,$conn);
				$com = mysql_fetch_array($resultc);
				?>

		<tr>
		<?
		if(checkpic($rsstatus["usernameId"],$conn)!=NULL)  $spic="img_view.php?picid=".$rsstatus["usernameId"];
		else $spic="img/".profile($rsstatus["usernameId"],$conn);
		?>
		<td rowspan="2" width="55" valign="top"><a href="account.php?friend=<?=$rsstatus["usernameId"]?>"><img src="<?=$spic?>" width="70"	 border="0" class="img-thumbnail"></a></td>
		<td><font size="3" style="
    padding-left: 7px;
"><a href="account.php?friend=<?=$rsstatus["usernameId"]?>"><strong><?=checkuser($rsstatus["usernameId"],$conn)?></strong></font></td>
		
		<td align="right" colspan="2"><font size="1"><?=$com[0]." Comment"?></font></td></tr>
		
		<tr>
			<td style="
    padding-left: 13px;
"><?=$rsstatus["status"]?></td>
		</tr>
		
			<td align=right  colspan="3">
			<table width="100%" style="
    margin-top: 5px;
    background-color: #F8FBFD;
">
			<tr valign="middle">
				<td align="left"  ><font size="1"><?="(".$rsstatus["date"].",".$rsstatus["time"].")"?></font></td>
				
				<td align="right">
				
				<?if($_SESSION["userid"]==$rs["usernameId"]||$_SESSION["permission"]=="admin"){?>
				<form method="post" action="deletestatus.php" style="margin-bottom: 0px;">
				<input type="hidden" name="id" value="<?=$rsstatus["statusId"]?>">
				<input type="hidden" name="usernameId" value="<?=$usernameId?>">
				<input type="submit" value ="ลบ" class="btn btn-danger btn-xs" onclick="return confirm('แน่ใจหรือว่าจะลบ ?')">
			</form>


			<?}?>
			</td>
			</tr>
			</table>
		</td>
		</tr>

		</table>
			
		</td>
      </tr>
	  <?}?>
    
    
  </table>
  </div>
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
</body>
<html>
<?mysql_close($conn);?>
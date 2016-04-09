<?
session_start();

if($_COOKIE["remember"]!=NULL&&$_SESSION["logon"]!="logon"){
		echo "<script langquage='javascript'>";
		echo "window.location =\"remember.php\"";
		echo "</script>";
		exit();
}

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

<head><title>10,000TIP</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<meta charset="utf-8">
	<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
</head>
<style type="text/css">
	.centered-form{
	margin-top: 60px;
}
</style>
<body id="page-top " class="index " style="margin-top: 70px;">

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
	
<div class="container">    
  <table class="table table-striped" style="background-color: transparent ;">
    <tr style="background-color: transparent;" >

	<td style="
    padding-top: 0px;
"><table class="table "  style="background-color: transparent ;">
<!-- 
<tr>
<td>
<form method="post" action="post.php">
	

<table>
<tr class="table table-striped">
	<td ><a href="account.php?friend=<?=$_SESSION["userid"]?>"><img src="<?="img_view.php?picid=".$_SESSION["userid"]?>" width="50" height="50" border="0" class="img-thumbnail"></a></td>
	<td><textarea name="status" rows="" cols=""></textarea></td>
	<td><input type="submit" value="POST" class="btn btn-primary"></td>
</tr>
</table>
</form>
</td>
</tr>
	 -->		
		<tr >
		<td  >
	<!--  /////////////////////////////////////////////////////////////////////////////////////-->
		  
  <table class="table table-striped" style="
    margin-bottom: 0px;
">
    <thead>
      <tr>
        <th><font size="5" ><a href="statuslast.php">สเตตัสล่าสุด</a></font></th>

      </tr>
    </thead>
    <tbody>
	<?
		$sql = "select * from status ORDER BY (statusId) desc LIMIT 10 ";
		$result= mysql_query($sql,$conn);
		

		while($rs = mysql_fetch_array($result)){
		?>

      <tr>
        <td>
		<table width="100%">
		<?
				$sql="SELECT count(mentId) FROM commentStatus WHERE statusId = '".$rsstatus["statusId"]."'";
				$resultc= mysql_query($sql,$conn);
				$com = mysql_fetch_array($resultc);
				?>

		<tr>
		<?
		if(checkpic($rs["usernameId"],$conn)!=NULL)  $spic="img_view.php?picid=".$rs["usernameId"];
		else $spic="img/".profile($rs["usernameId"],$conn);
		?>
			<td rowspan="3" width="55" valign="top"><a href="account.php?friend=<?=$rs["usernameId"]?>"><img src="<?=$spic?>" width="50" height="50" border="0" class="img-thumbnail"></a></td>
		<td align="right" colspan="2"><font size="1"><?=$com[0]." Comment"?></font></td></tr>

		<tr >
		
			<td><strong><font size="4" ><a href="account.php?friend=<?=$rs["desinationId"]?>">
			<?if($rs["usernameId"]!=$rs["desinationId"]) echo checkuser($rs["usernameId"],$conn)." > ".checkuser($rs["desinationId"],$conn);
			else echo checkuser($rs["usernameId"],$conn);
			?>
			
			</a></font></strong></td>
		</tr>
		<tr>
			
			<td>&nbsp;&nbsp;&nbsp;<?=$rs["status"]?></td>
		</tr>
		
		<tr>
			<td align=right  colspan="2">
			<table width="100%" style="
    margin-top: 5px;
    background-color: #F8FBFD;
">
			<tr valign="middle">
				<td align="left" width="250"><font size="2"><?=$rs["name"]?></font><font size="1"><?="(".$rs["date"].",".$rs["time"].")"?></font></td>
				
				
				<td align="right">
				<?if($_SESSION["userid"]==$rs["usernameId"]||$_SESSION["permission"]=="admin"){?>
				<form method="post" action="deletestatus.php" style="margin-bottom: 0px;">
				<input type="hidden" name="id" value="<?=$rs["statusId"]?>">
				<input type="hidden" name="usernameId" value="<?=$rs["desinationId"]?>">
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
    </tbody>
  </table>

		</td>
	</tr>
<!--  /////////////////////////////////////////////////////////////////////////////////////-->

<tr >
		<td  >
		<!--  /////////////////////////////////////////////////////////////////////////////////////-->
		  
  <table class="table table-striped" style="
    margin-bottom: 0px;
">
    <thead>
      <tr>
        <th><font size="5" ><a href="topiclast.php">กระทู้ล่าสุด</a></font></th>

      </tr>
    </thead>
    <tbody>
	<?
		$sql = "select * from topic join account USING ( usernameId ) ORDER BY (topicId) desc LIMIT 5 ";
		$result= mysql_query($sql,$conn);
		

		while($rs = mysql_fetch_array($result)){
		?>

      <tr>
        <td>
		<table width="100%">
		<?
				$sql="SELECT count(commentId) FROM comment WHERE topicId = '".$rs["topicId"]."'";
				$resultc= mysql_query($sql,$conn);
				$com = mysql_fetch_array($resultc);
				?>

		<tr>
		<?
		if($rs["pic"]!=NULL)  $spic="img_view.php?picid=".$rs["usernameId"];
		else $spic="img/".$rs["picture"];
		?>
			<td rowspan="3" width="55" valign="top"><a href="account.php?friend=<?=$rs["usernameId"]?>"><img src="<?=$spic?>" width="50" height="50" border="0" class="img-thumbnail"></a></td>
		<td align="right" colspan="2"><font size="1"><?=$com[0]." Comment,  ".$rs["view"]." View"?></font></td></tr>

		<tr >
		
			<td><strong><font size="4" ><a href="topic2.php?topic=<?=$rs["topicId"]?>"><?=$rs["topicName"]?></a></font></strong></td>
		</tr>
		<tr>
			
			<td><?=substr($rs["detail"],0,271)?></td>
		</tr>
		
		<tr>
			<td align=right  colspan="2">
			<table width="100%" style="
    margin-top: 5px;
    background-color: #F8FBFD;
">
			<tr valign="middle">
				<td align="left" width="250"><font size="2"><?=$rs["name"]?></font><font size="1"><?="(".$rs["date"].",".$rs["time"].")"?></font></td>
				
				
				<td align="right">
				<?if($_SESSION["userid"]==$rs["usernameId"]||$_SESSION["permission"]=="admin"){?>
				<form method="post" action="deletetopic.php" style="margin-bottom: 0px;">
				<input type="hidden" name="id" value="<?=$rs["topicId"]?>">
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
    </tbody>
  </table>

		</td>
	</tr>
<!--  /////////////////////////////////////////////////////////////////////////////////////-->


			<tr >
		<td  >
		<!--  -->
		  
  <table class="table table-striped" >
    <thead>
      <tr>
        <th><font size="5" ><a href="topichit.php">กระทู้ฮิต</a></font></th>

      </tr>
    </thead>
    <tbody>
	<?
		$sql = "select * from topic join account USING ( usernameId ) ORDER BY (comment+view) desc LIMIT 5 ";
		$result= mysql_query($sql,$conn);
		

		while($rs = mysql_fetch_array($result)){
		?>

      <tr>
        <td>
		<table width="100%">
		
		<?
				$sql="SELECT count(commentId) FROM comment WHERE topicId = '".$rs["topicId"]."'";
				$resultc= mysql_query($sql,$conn);
				$com = mysql_fetch_array($resultc);
				?>

		<tr>
		<?
		if($rs["pic"]!=NULL)  $spic="img_view.php?picid=".$rs["usernameId"];
		else $spic="img/".$rs["picture"];
		?>
			<td rowspan="3" width="55" valign="top"><a href="account.php?friend=<?=$rs["usernameId"]?>"><img src="<?=$spic?>" width="50" height="50" border="0" class="img-thumbnail"></a></td>
		<td align="right" colspan="2"><font size="1"><?=$com[0]." Comment,  ".$rs["view"]." View"?></font></td></tr>
		<tr >
		
			<td><strong><font size="4" ><a href="topic2.php?topic=<?=$rs["topicId"]?>"><?=$rs["topicName"]?></a></font></strong></td>
		</tr>
		<tr>
			
			<td><?=substr($rs["detail"],0,271)?></td>
		</tr>
		
		<tr>
			<td align=right  colspan="2">
			<table width="100%" style="
    margin-top: 5px;
    background-color: #F8FBFD;
">
			<tr valign="middle">
				<td align="left" width="250"><font size="2"><?=$rs["name"]?></font><font size="1"><?="(".$rs["date"].",".$rs["time"].")"?></font></td>
				<td align="right">
				<?if($_SESSION["userid"]==$rs["usernameId"]||$_SESSION["permission"]=="admin"){?>
				<form method="post" action="deletetopic.php" style="margin-bottom: 0px;">
				<input type="hidden" name="id" value="<?=$rs["topicId"]?>">
				<input type="submit" value ="ลบ" class="btn btn-danger btn-xs" onclick="return confirm('แน่ใจหรือว่าจะลบ ?')">
			</form>
			<?}?>
			</td>
			</tr>
			</table>
			
			
			</td>
		</tr>
		
<!--  /////////////////////////////////////////////////////////////////////////////////////-->

		</table>
		</td>
      </tr>
	  <?}?>
    </tbody>
  </table>

		</td>
	</tr>





	</table>
	</td>
	<td style="width: 170;">
	 <table class="table table-striped" >
	<thead>
	<tr>
	<th><center><font size="5" color="">เพื่อนแนะนำ</font></center></th>
	</tr>
	</thead>
	<tbody>
	<?

	$sql="SELECT * FROM account ORDER BY RAND() LIMIT 12 ";
	$result= mysql_query($sql,$conn);
	while($rs =mysql_fetch_array($result)){
	
	?>
	<tr>
		<td align="center"><?
		if($rs["pic"]!=NULL)  $spic="img_view.php?picid=".$rs["usernameId"];
		else $spic="img/".$rs["picture"];
		?>
		<a href="account.php?friend=<?=$rs["usernameId"]?>"><img src="<?=$spic?>" width="100" height="100" border="0" alt="" class="img-thumbnail"></a><br>
		<a href="account.php?friend=<?=$rs["usernameId"]?>" style="color:#2C3E50;"><strong><font size="2"><?=$rs["name"]."&nbsp;&nbsp;".$rs["lastname"]?></a></font><br/></strong></td>
	</tr>
	<?}?>
	</tbody>
	</table>
	</td>
	</tr>
  </table>
</div>
<?mysql_close($conn);?>
</body>
</html>
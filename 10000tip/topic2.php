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
$topicId=$_GET["topic"];
$submit=$_POST["submit"];
date_default_timezone_set("Asia/Bangkok");

if($submit!=NULL){

$sql = "select max(commentId) from comment";
$result= mysql_query($sql,$conn);
$rs =mysql_fetch_array($result);

$commentId=$rs[0]+1;
$countComment=$_POST["cc"];
if($commentId<10) $commentId ="0000".$commentId;
else if($commentId<100) $commentId ="000".$commentId;
else if($commentId<1000) $commentId ="00".$commentId;
else if($commentId<10000) $commentId ="0".$commentId;
else if($commentId<100000) $commentId ="".$commentId;

$userId=$_SESSION["userid"];
$commentbox=$_POST["commentbox"];
$commentbox = str_replace("<script>","",$commentbox);
$commentbox = str_replace("</script>","",$commentbox);
$commentbox = str_replace("ควย","ค_ย",$commentbox);
$date=date("Y-m-d");
$time=date("H:");
$time.=date("i")+5;
$time.=date(":s");
$ip=$_SERVER["REMOTE_ADDR"];
$sql = "insert into comment values ('$commentId','$userId','$commentbox','$topicId','$date','$time','$ip')";
mysql_query($sql,$conn);

$sql = "UPDATE  `webboard`.`topic` SET  `comment` =  '$countComment' WHERE  `topic`.`topicId` =  '$topicId'";
mysql_query($sql,$conn);
}

$sql = "select * from topic join account USING ( usernameId )  where topicId='$topicId'";
$result= mysql_query($sql,$conn);
$rs =mysql_fetch_array($result);

$view=$rs["view"]+1;

if($submit!==NULL){

}else{

$sql = "UPDATE  `webboard`.`topic` SET  `view` =  '$view' WHERE  `topic`.`topicId` =  '$topicId'";
mysql_query($sql,$conn);
}

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

<head><title> <?=$rs["topicName"]?> </title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<meta charset="utf-8">
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
if($rs[0]!=null){
	$detail = wordwrap($rs["detail"], 8, "\n", false);
?>

<div class="container">
  <h2>Striped Rows</h2>         
  <table class="table" >
    
      <tr>
		<?
		if(checkpic($rs["usernameId"],$conn)!=NULL)  $spic="img_view.php?picid=".$rs["usernameId"];
		else $spic="img/".profile($rs["usernameId"],$conn);
		?>
		<td rowspan="2" width="90" style="padding-top: 20px;" valign="top"><a href="account.php?friend=<?=$rs["usernameId"]?>"><img src="<?=$spic?>" width="70" height="70" border="0" class="img-thumbnail"></a></td>
        <th><font size="6" ><?=$rs["topicName"]?></font></th>

      </tr>
    
  
      <tr>
        <td colspan="3">
		<table width="100%">
		<tr>
			<td ><?=$detail?></td>
		</tr>
		<tr>
			<td align="right"><table width="100%">
			<tr valign="middle">
				<td align="left"><font size="2"><?=$rs["name"]?></font><font size="1"><?="(".$rs["date"].",".$rs["time"].")"?></font></td>
			<!-- 
				
			<?if(true){?>
			<td align="right" width = "30">
				<?if($_SESSION["userid"]==$rs["usernameId"]||$_SESSION["permission"]=="admin"){?>
				<input type="submit" value ="บันทึกการแก้ไข" class="btn btn-primary btn-xs" name="save">
			<?}?>
			</td>
			
			<?}else if(false){?>
				<td align="right" width = "30">
				<?if($_SESSION["userid"]==$rs["usernameId"]||$_SESSION["permission"]=="admin"){?>
				<input type="button" value ="แก้ไข" class="btn btn-primary btn-xs" name="edit">
			<?}?>
			</td>
			<?}?>
 -->
				<td align="right" width = "30">
				<?if($_SESSION["userid"]==$rs["usernameId"]||$_SESSION["permission"]=="admin"){?>
				<form method="post" action="deletetopic.php" style="margin-bottom: 0px;">
				<input type="hidden" name="id" value="<?=$rs["topicId"]?>">
				<input type="submit" value ="ลบ" class="btn btn-danger btn-xs" onclick="return confirm('แน่ใจหรือว่าจะลบ ?')">
			</form>
			<?}?>
			</td>
			</tr>
			</table></td>
		</tr>
		
		</table>
		</td>
      </tr>
   
  </table>
</div>



<div class="container">       
  <table class="table table-striped">
    <thead>
      <tr>
        <th><font size="5" >Comment</font> <br>
		<?
				$sql="SELECT count(commentId) FROM comment WHERE topicId = '".$rs["topicId"]."'";
				$resultc= mysql_query($sql,$conn);
				$com = mysql_fetch_array($resultc);
				$v=$rs["view"]+1;
				?>
				<font size="2"><?="Have ".$com[0]." comments and ".$v." views"?></font>
		</th>
		<?$cc=$com[0]+1;?>
      </tr>
    </thead>
    <tbody>

	<?
		$sql = "SELECT * FROM `comment` c join topic t where c.topicId = t.topicId and t.topicId =  '$topicId' ORDER BY (commentId)";
		$result= mysql_query($sql,$conn);
		while($rss =mysql_fetch_array($result)){
	?>
      <tr>
        <td>

		<table width="100%">
		<tr>
		<?
		$newtext = wordwrap($rss[2], 8, "\n", false);
		?>
		<?
		if(checkpic($rss[1],$conn)!=NULL)  $spic="img_view.php?picid=".$rss[1];
		else $spic="img/".profile($rss[1],$conn);
		?>
			<td rowspan="2" width="55"  valign="top"><a href="account.php?friend=<?=$rss[1]?>"><img src="<?=$spic?>" width="50" height="50" border="0" class="img-thumbnail"></a></td>
			<td colspan="2"><?=$newtext?></td>
		</tr>

		<tr>
			<td align=left colspan="2"><font size="2" ><?=checkuser($rss[1],$conn)?></font><font size="1" ><?=" (".$rss[5].",".$rss[4].")"?></font></td>
			<td align=right>
			<?if($_SESSION["userid"]==$rs["usernameId"]||$_SESSION["permission"]=="admin"){?>
			<form method="post" action="deletecomment.php" style="margin-bottom: 0px;">
				<input type="hidden" name="id" value="<?=$rss["commentId"]?>">
				<input type="hidden" name="topicid" value="<?=$rss["topicId"]?>">
				<input type="submit" value ="ลบ" class="btn btn-danger btn-xs"  onclick="return confirm('แน่ใจหรือว่าจะลบ ?')">
			</form>
			<?}?>
			</td>
		</tr>
		
		</table>
		</td>
      </tr>
	 <?}?>
	   <tr>
        <td>
		<?
		if($_SESSION["userid"]!=NULL){
		?>
		<form method="post" action="?topic=<?=$topicId?>">
		<table width="100%" align=center>
		<tr>
			<td><strong>Comment Box</strong></td>
		</tr>
		<tr>
			<td width="100%"><br>
			<input type="text" name="commentbox"  class="form-control" required></td>
			<td align="right"><br><input type="submit" name="submit" value="Comment" class="btn btn-default" ></td>
		</tr>

		</table>
		<input type="hidden" name="cc" value="<?=$cc?>">
		<input type="hidden" name="commentId" value="<?=$rss["commentId"]?>">
		</form>
		<?}?>
		</td>
      </tr>
    </tbody>
  </table>
</div>

<?
	} else echo "<br><br><br><br><center><font size=\"8\"><strong>Error 404 : Topic Not Found</strong></font></center>";
?>

</body>
<html><?mysql_close($conn);?>
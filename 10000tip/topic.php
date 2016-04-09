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

?>
<html>

<head><title>10,000TIP</title>
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


<div class="container">
  <h2>Striped Rows</h2>         
  <table class="table table-striped" >
    <thead>
      <tr>
        <th><font size="6" >กระทู้</font></th>

      </tr>
    </thead>
    <tbody>
	<?
		$sql = "select count(topicId) from topic";
		$page = mysql_query($sql,$conn);
		$p=mysql_fetch_array($page);

		$p=(int)($p[0]/20);
		
		
		
		?>

	<?
		
		$pp=$_GET["page"];
		$pp=$pp-1;
		$pp=$pp*20;

		
		if($_GET["page"]==NULL) $pp=0;

		$sql = "select * from topic join account USING ( usernameId ) ORDER BY (topicId) desc limit $pp,20";
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
		<?
		if($rs["pic"]!=NULL)  $spic="img_view.php?picid=".$rs["usernameId"];
		else $spic="img/".$rs["picture"];
		?>
			
			<td><strong><font size="4" ><a href="topic2.php?topic=<?=$rs["topicId"]?>"><?=$rs["topicName"]?></a></font></strong></td>
		</tr>
		<tr>
			
			<td><?=substr($rs["detail"],0,363)?></td>
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
	  <?}
	  if($_GET["page"]>$p+1) {
	  echo "<center><font size=\"8\"><strong>Error 404 : Topic Not Found</strong></font></center>";
	  }?>

		<tr><td align="center">
		
			
			<input type="button" value=" หน้าแรก" onclick=window.location="topic.php?page=1"; class="btn btn-warning btn-s  <?if($_GET["page"]<="1") echo " disabled";?>">
			<input type="button" value=" ก่อนหน้า" onclick=window.location="topic.php?page=<?=$_GET["page"]-1?>"; class="btn btn-success btn-s <?if($_GET["page"]<="1") echo " disabled";?>">
			
			<?for($n=0;$n<=$p;$n++){?> 
			<input type="button" value="<?=$n+1?>" onclick=window.location="topic.php?page=<?=$n+1?>"; class="btn btn-info btn-s <?if($_GET["page"]==$n+1) echo "  disabled";?>">
			<?}?>
			
			<input type="button" value=" ถัดไป" onclick=window.location="topic.php?page=<?if($_GET["page"]==NULL) echo 2;else echo $_GET["page"]+1;?>"; class="btn btn-success btn-s <?if($_GET["page"]>=$n) echo " disabled";?>">
			<input type="button" value=" หน้าสุดท้าย" onclick=window.location="topic.php?page=<?=$p+1?>"; class="btn btn-warning btn-s">
			
		</td>
		</tr>
    </tbody>
  </table>
</div>



</body>
<html><?mysql_close($conn);?>
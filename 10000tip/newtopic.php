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
 
$sql = "select max(topicId) from topic";
$result= mysql_query($sql,$conn);
$rs =mysql_fetch_array($result);
date_default_timezone_set("Asia/Bangkok");
$topicId=$rs[0]+1;

if($topicId<10) $topicId ="0000".$topicId;
else if($topicId<100) $topicId ="000".$topicId;
else if($topicId<1000) $topicId ="00".$topicId;
else if($topicId<10000) $topicId ="0".$topicId;
else if($topicId<100000) $topicId ="".$topicId;

$topicname=$_POST["topicname"];
$topicname = str_replace("ควย","ค_ย",$topicname);
$topicname = str_replace("<script>"," ",$topicname);
$topicname = str_replace("</script>"," ",$topicname);
$topicname=strip_tags($topicname);



$detail=$_POST["detail"];
$detail = str_replace("ควย","ค_ย",$detail);
$detail = str_replace("<script>","",$detail);
$detail = str_replace("</script>","",$detail);
$detail = str_replace("\n","<br />",$detail);



$userId=$_SESSION["userid"];
$date=date("Y-m-d");
$time=date("H:");
$time.=date("i")+5;
$time.=date(":s");
$ip=$_SERVER["REMOTE_ADDR"];
$sql="insert into topic values ('$topicId','$topicname','$detail','$userId','$date','$time','$ip','0','0')";

mysql_query($sql,$conn);
mysql_close($conn);
echo "<script langquage='javascript'>";
echo "window.location =\"topic2.php?topic=$topicId\";";
echo "</script>";

?>
<?mysql_close($conn);?>
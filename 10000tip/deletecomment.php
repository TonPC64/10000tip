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

$id=$_POST["id"];
$topicId=$_POST["topicid"];

$sql = "delete from comment where commentId=$id";
mysql_query($sql,$conn);

echo "<script langquage='javascript'>";
echo "window.location =\"topic2.php?topic=$topicId\"";
echo "</script>";

?><?mysql_close($conn);?>
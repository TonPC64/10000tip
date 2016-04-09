<?

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
$usernameId=$_GET["picid"];

$SQL = "SELECT * FROM  account  WHERE usernameId = '$usernameId' ";
$Query = mysql_query($SQL) or die ("Error Query [".$SQL."]");
$Result = mysql_fetch_array($Query);
$Type=$Result["type"];
header("Content-type: $Type "); 
echo $Result["pic"];
?>
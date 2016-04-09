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
$usernameId=$_SESSION["userid"];

$sql="select * from account where usernameId = '$usernameId'";
		$result= mysql_query($sql,$conn);
		$rs = mysql_fetch_array($result);


$FileName = $_FILES['upfile']['tmp_name']; 
$Name=$_FILES["upfile"]["name"]; 
$Size=$_FILES["upfile"]["size"]; 
$Type=$_FILES["upfile"]["type"]; 
$DataImage = file_get_contents($FileName ); 
$ArrData = unpack("H*hex", $DataImage); 
$HexData = "0x".$ArrData['hex']; 

$sql = "UPDATE account SET pic = $HexData,type='$Type' WHERE usernameId = '$usernameId' ";
$result= mysql_query($sql,$conn) or die ("error "); 



echo "<script langquage='javascript'>";
echo "window.location =\"account.php\";";
echo "</script>";
?>

<?mysql_close($conn);?>
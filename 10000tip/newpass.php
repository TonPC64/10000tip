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
$opass=$_POST["opassword"];
$newpass=$_POST["password"];
$cpass=$_POST["password_confirmation"];

		$sql="select * from account where usernameId = '".$usernameId."'";
		$result= mysql_query($sql,$conn);
		$rs = mysql_fetch_array($result);

if($rs["password"]!=$opass&&$newpass!=$cpass) {

echo "<script langquage='javascript'>";
echo "window.location =\"changepass.php?error=3\";";
echo "</script>";

}else if($newpass!=$cpass){
	echo "<script langquage='javascript'>";
echo "window.location =\"changepass.php?error=2\";";
echo "</script>";

}else if($rs["password"]!=$opass){
	echo "<script langquage='javascript'>";
echo "window.location =\"changepass.php?error=1\";";
echo "</script>";

}else{
$sql = "UPDATE account SET password = '$newpass'WHERE usernameId = '$usernameId' ";
$result= mysql_query($sql,$conn);
echo "<script langquage='javascript'>";
echo "window.location =\"account.php\";";
echo "</script>";

}

?>
<?mysql_close($conn);?>
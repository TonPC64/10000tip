<?php
session_start();

$host="203.172.133.126";
$user="tonp";
$pass="123456";
$dbname ="webboard";

	$conn= mysql_connect($host,$user,$pass);
	if(! $conn) die("ไม่สามารถติดต่อกับ MySQL ได้");
	mysql_select_db ( $dbname,$conn ) or die ("ไม่สามารถเลือกฐานข้อมูลได้");

mysql_query("SET character_set_results=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8");

$sql = "SELECT * FROM account WHERE username = '". $_POST['username'] ."'";
$Query = mysql_query($sql,$conn);
$result = mysql_fetch_array($Query);

$cookie_name = "user";
$cookie_value = $_POST['username'];
setcookie($cookie_name, $cookie_value, time() + (86400 * 30*7), "/");


$cookie_name = "pass";
$cookie_value = $_POST['password'];
setcookie($cookie_name, $cookie_value, time() + (86400 * 30*7), "/");

$cookie_name = "remember";
$cookie_value = $_POST['remember'];
setcookie($cookie_name, $cookie_value, time() + (86400 * 30*7), "/");


$name= $result['name'];
$userid=$result["usernameId"];
$permission= $result['permission'];

if ($result["password"]==$_POST["password"]) {

		$_SESSION['name'] = $name;
		$_SESSION['userid'] = $userid;
		$_SESSION['permission'] = $permission;
		$_SESSION['logon']="logon";
		echo "<script langquage='javascript'>";
		echo "window.location =history.go(-1);";
		echo "</script>";	
} else {
   header("location:login.php?tx=1");
}
mysql_close();
?>
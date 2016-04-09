<?php
session_start();
$_SESSION["logon"]="logon";

$host="localhost";
$user="tonp";
$pass="123456";
$dbname ="webboard";

	$conn= mysql_connect($host,$user,$pass);
	if(! $conn) die("ไม่สามารถติดต่อกับ MySQL ได้");
	mysql_select_db ( $dbname,$conn ) or die ("ไม่สามารถเลือกฐานข้อมูลได้");

mysql_query("SET character_set_results=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8");

$sql = "SELECT * FROM account WHERE username = '". $_COOKIE['user'] ."'";
$Query = mysql_query($sql,$conn);
$result = mysql_fetch_array($Query);


$name= $result['name'];
$userid=$result["usernameId"];
$permission= $result['permission'];

if ($result["password"]==$_COOKIE['pass']) {

		$_SESSION['name'] = $name;
		$_SESSION['userid'] = $userid;
		$_SESSION['permission'] = $permission;
		echo "<script langquage='javascript'>";
		echo "window.location =\"index.php\"";
		echo "</script>";
} else {
   header("location:login.php?tx=1");
}

?>
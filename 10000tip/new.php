<?
$host="203.172.133.126";
$user="tonp";
$pass="123456";
$db="hw5";
$conn= mysql_connect($host,$user,$pass);

if(!$conn) die ("Can't connect mysql");

mysql_select_db($db,$conn) or die ("Can't connect DB");

mysql_query("SET character_set_results=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8");

?>
<html>
<head><title>สมัครสมาชิก</title>
<meta charset="utf-8">
</head>
<body bgcolor="#66c5fd">

</body>
<html>
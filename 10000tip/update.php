<?
session_start();
?>
<meta charset="tis-620">
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
$id =$_SESSION["userid"];
$fname=$_POST["first_name"];
$fname=strip_tags($fname);

$lname=$_POST["last_name"];
$lname=strip_tags($lname);

$bdate=$_POST["bdate"];
$sex=$_POST["sex"];
$addr=$_POST["address"];
$addr=strip_tags($addr);

$email=$_POST["email"];

		$_SESSION['name'] = $fname;

$sql = "UPDATE account SET name = '$fname', lastname = '$lname',bdate='$bdate',sex='$sex',address='$addr',email='$email' WHERE usernameId = '$id' ";
$result= mysql_query($sql,$conn);
echo "<script langquage='javascript'>";
echo "window.location =\"account.php\";";
echo "</script>";


?><?mysql_close($conn);?>

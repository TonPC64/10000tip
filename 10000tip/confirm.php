<?session_start();?>
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

$sql="select max(usernameId) from account";
$result= mysql_query($sql,$conn);
$rs =mysql_fetch_array($result);

$id=$rs[0]+1;

if($id<10) $id ="0000".$id;
else if($id<100) $id ="000".$id;
else if($id<1000) $id ="00".$id;
else if($id<10000) $id ="0".$id;
else if($id<100000) $id ="".$id;

$fname=$_POST["first_name"];
$fname=strip_tags($fname);

$lname=$_POST["last_name"];
$lname=strip_tags($lname);

$bdate=$_POST["bdate"];
$sex=$_POST["sex"];
$addr=$_POST["address"];
$addr=strip_tags($addr);

$email=$_POST["email"];
$user=$_POST["username"];
$pass=$_POST["password"];

$sql="insert into account values ('$id','','$fname','$lname','$bdate','$sex','$addr','$email','$user','$pass','profile.jpg','','')";
$result= mysql_query($sql,$conn);

$cookie_name = "user";
$cookie_value = $_POST['username'];
setcookie($cookie_name, $cookie_value, time() + (86400 * 30*7), "/");

$name=$fname;
$userid=$id;

$_SESSION['name'] = $name;
$_SESSION['userid'] = $userid;

echo "<script langquage='javascript'>";
echo "window.location =\"uppic.php\";";
echo "</script>";

?>
<?mysql_close($conn);?>
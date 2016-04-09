<?php
session_start();
include("connect.php");
$user=$_POST["username"];
$pass=$_POST["password"];
$autologin=false;
$time= time() + (86400 * 30 * 7);
if($_COOKIE["remember"]=="check"&&($_SESSION["logon"]==null||$_SESSION["logon"]=="no")&&$user==null&&$pass==null){
    $user=$_COOKIE["username"];
    $pass=$_COOKIE["password"];
    $autologin=true;
}


if($user==null&&$pass==null) {header('location:index.php');
                              exit();
                             }


$sql = "select * from account where username = '$user'";
$query = mysqli_query($conn,$sql);
$rs = mysqli_fetch_assoc($query);

if($rs==null){?>
<script>
    window.location="login.php?error=notuser";
</script>
<?php }


if($rs["password"]==$pass){
    $_SESSION["username"] = $rs["username"];
    $_SESSION["name"]= $rs["name"];
    $_SESSION["surname"] = $rs["surname"];
    $_SESSION["profile"] = $rs["profile"];
    $_SESSION["logon"] = "logon";
    $_SESSION["admin"] =  $rs["status"];
    $_SESSION["user_id"] = $rs["id"];
    $_SESSION["address"] = $rs["address"];
    setcookie("username",$rs["username"],$time,"/");
    setcookie("password",$rs["password"],$time,"/");

    if(isset($_POST["remember"])){
        setcookie("remember",$_POST["remember"],$time,"/");
    }
    else setcookie("remember","no",$time,"/");

    if($autologin){
        setcookie("remember","check",$time,"/");
    }

    header('location:index.php');

}
else{ ?>
<script>
    window.location="login.php?error=notpass";
</script>

<?php }
?>
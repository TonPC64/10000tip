<?php
session_start();
include("connect.php");

if($_POST["username"]==null&&$_POST["password"]==null) {header('location:index.php');
                             exit();
                             }

$sql = "INSERT INTO account VALUES (NULL, NULL, '".$_POST["first_name"]."', '".$_POST["last_name"]."', '".$_POST["bdate"]."', '".$_POST["username"]."', '".$_POST["password"]."', '".$_POST["email"]."', '".$_POST["tel"]."', '".$_POST["address"]."', NULL, NULL, NULL)";

mysqli_query($conn,$sql);

    $_SESSION["username"] = $_POST["username"];
    $_SESSION["name"]= $_POST["first_name"];
    $_SESSION["surname"] = $_POST["last_name"];
    $_SESSION["profile"] = NULL;
    $_SESSION["logon"] = "logon";
    $_SESSION["admin"] = NULL;
    
    $time= time() + (86400 * 30 * 7);
    setcookie("username",$_POST["username"],$time,"/");
    setcookie("password",$_POST["password"],$time,"/");
    setcookie("remember","check",$time,"/");
    header('location:index.php');

?>
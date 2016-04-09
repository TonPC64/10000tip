<?php
session_start();

$_SESSION["page"]="buy_comfirm";
$_SESSION["sub_page"]="";
include("connect.php");
if(isset($_COOKIE["remember"])){
  if($_COOKIE["remember"]=="check"&&($_SESSION["logon"]==null||$_SESSION["logon"]=="no")){
    header('location:check_login.php');
  }
}
?>
    <html>

    <head>
        <title>ตะกร้าสินค้า</title>
        <?php  include("boots.php"); ?>
            <meta charset="utf-8">

    </head>

    <body>
        <?php  include("navbar.php"); ?>
            <div class="container" style="padding-top: 60px;">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>สำเร็จ</h4>
                    </div>

                    <div class="panel-body">
                        สั่งซื้อสำเร็จแล้ว เรากำลังพาคุณกลับไปที่หน้าแรก โปรดรอสักครู่..
                    </div>
                </div>
                <?php
      if(isset($_POST["ids"])&&isset($_POST["shipping"])){

        $sql = "SELECT sum(price*amount) FROM cart JOIN item where cart.item_id = item.id AND user_id = ".$_SESSION["user_id"]." AND cart.bill_id < 1";
        $query=mysqli_query($conn,$sql);
        $sum=mysqli_fetch_array($query);
          if($_POST["shipping"]=="ems"){
              $total = $sum[0] + 70;
              $ship = "EMS";
          }
          else if($_POST["shipping"]=="register"){
              $total = $sum[0] +30;
              $ship = "ลงทะเบียน";
          }

        $date = date("Y-m-d");

        $sql = "INSERT INTO bill VALUES (NULL, '".$total."', '".$ship."', NULL, '".$_POST["address"]."', '".$date."','".$_SESSION["user_id"]."','รอการชำระ')";
        mysqli_query($conn,$sql);

        $sql="select max(bill_id) from bill where user_id = ".$_SESSION["user_id"]."";
        $que = mysqli_query($conn,$sql);
        $last = mysqli_fetch_array($que);


        $sql="UPDATE `bakelay`.`cart` SET `bill_id` = '".$last[0]."' WHERE `cart`.`id` IN (".$_POST["ids"].")";
        mysqli_query($conn,$sql);
      }
      ?>
                    <script>
                        setTimeout("window.location.href=\"index.php\"", 1000);

                    </script>


            </div>
    </body>

    </html>

<?php
session_start();

$_SESSION["page"]="profile";
$_SESSION["sub_page"]="history";
include("connect.php");
if(isset($_COOKIE["remember"])){
    if($_COOKIE["remember"]=="check"&&($_SESSION["logon"]==null||$_SESSION["logon"]=="no")){
        header('location:check_login.php');
    }
}
?>
<html>

    <head>
        <title>ประวัติการสั่งซื้อ</title>
        <?php  include("boots.php"); ?>
        <meta charset="utf-8">

    </head>

    <body>
        <?php  include("navbar.php"); ?>
        <div class="container" style="padding-top: 60px;">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>ประวัติการสั่งซื้อ</h4>
                </div>
                <div class="panel-body" style="padding: 0px;">
                    <table class="table table-hover table-condensed" style="margin-bottom: 0px;">

                        <thead>
                            <tr align="center">
                                <td>
                                    <b>เลขที่สั่งซื้อ</b>
                                </td>
                                <td>
                                    <b>ยอดรวม</b>
                                </td>
                                <td>
                                    <b>การจัดส่ง</b>
                                </td>
                                <td>
                                    <b>สถานะ</b>
                                </td>
                                <td>
                                    <b>หมายเลขการจัดส่ง</b>
                                </td>
                                <td>
                                    <b>ชำระ</b>
                                </td>
                            </tr>
                        </thead>
                        <?php
$sql ="select * from bill where user_id = '".$_SESSION["user_id"]."' order by bill_id desc";
$query = mysqli_query($conn,$sql);
while($rs=mysqli_fetch_assoc($query)){
                        ?>
                        <tbody>
                            <tr align="center">
                                <td>
                                    <?=$rs["bill_id"];?>
                                </td>
                                <td>
                                    <?=$rs["total"];?>฿
                                </td>
                                <td>
                                    <?=$rs["shipping"];?>
                                </td>
                                <td>
                                    <?=$rs["status"];?>
                                </td>
                                <td>
                                    <?=$rs["track"];?>
                                </td>
                                <?php
    if($rs["status"]=="รอการชำระ"){
                                ?>
                                <td><a class="paid" data-fancybox-type="iframe" href="mini_paid.php?billid=<?=$rs["bill_id"];?>"><button class="btn btn-success"><i class="glyphicon glyphicon-usd"></button></a></td>
                                <?php }else { ?>
                                <td>ชำระแล้ว</td>
                                <?php } ?>  
                            </tr>
                        </tbody>

                        <?php } ?>
                    </table>
                </div>
            </div>

        </div>

    </body>

</html>

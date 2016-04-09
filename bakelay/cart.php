<?php
session_start();

$_SESSION["page"]="cart";
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
                    <h4>สินค้าในตะกร้า</h4>
                </div>
                <div class="panel-body" style="padding: 0px;">
                    <table class="table table-hover table-condensed" style="margin-bottom: 0px;">
                        <?php if($count!=0){?>
                        <thead>
                            <tr align="center"><td><b>#</b></td><td align="left"><b>ชื่อสินค้า</b></td><td><b>จำนวน</b></td><td align="right"><b>ราคา</b></td><td align="right"><b>ยกเลิก</b></td></tr>
                        </thead>
                        <?php
    $sql = "SELECT * FROM cart JOIN item where cart.item_id = item.id AND user_id = ".$_SESSION["user_id"]." AND cart.bill_id < 1";
    $query = mysqli_query($conn,$sql);
    $count = 1;
    $total= 0;
    while($rs = mysqli_fetch_array($query)){
        $id[] = $rs[0];
                        ?>
                        <tr align="center">
                            <td><?=$count?></td>
                            <td align="left"><?=$rs["name"]?></td>
                            <td><?=$rs["amount"]?></td>
                            <td align="right"><?=$rs["price"]*$rs["amount"]." ฿"?></td>
                            <td align="right" ><a class="deteletbox2" data-fancybox-type="iframe" href="cancelcart.php?id=<?=$rs[0]?>&name=<?=$rs["name"]?>"><button class="btn  btn-danger"><i class="glyphicon glyphicon-remove"></button></a></td>
                        </tr>
                        <?php
                            $total += $rs["price"]*$rs["amount"];
        $count++;
    }
    $ids = join(',',$id);
                        ?>

                        <tr align="center"><td colspan="5" style="padding: 0px;">
                            <form action="buy_comfirm.php" method="post" >
                                <table ><tr ><td rowspan="2" align="right" style="vertical-align:middle;padding-right: 10px;">
                                    <u><b>วิธีการจัดส่ง</b></u>
                                    </td><td style="padding-right: 10px;padding-top: 5px;padding-bottom: 5px;"><input type="radio" onclick="check(this.value)" value="ems" name="shipping" checked> EMS 70฿</td></tr>
                                    <tr><td colspan="2" style="padding-right: 10px;"><input type="radio" onclick="check(this.value)" value="register" name="shipping" > ลงทะเบียน 30฿</td></tr>
                                </table>




                                </td></tr>

                        <tr><td colspan="5" align="center">
                            <div class="form-group">
                                <label for="email">ที่อยู่สำหรับจัดส่ง</label>
                                <textarea name="address" class="form-control"><?=$_SESSION["address"]?></textarea>
                            </div>

                            </td>
                        </tr>
                        <tr><td colspan="5" align="center" style="padding-right: 10px;"><b >ยอดไม่รวมค่าจัดส่ง :<font color="red"> <?=$total?>฿</font></b></td></tr>
                        <tr><td colspan="5" align="center" style="padding-right: 10px;"><b >ยอดรวมทั้งสิ้น :<font color="red"> <b id="demo"></b>฿</font></b></td></tr>

                        <tr><td colspan="5" align="center">
                            <input type="hidden" name="ids" value="<?=$ids?>">
                            <input type="submit" name="buy" value="สั่งซื้อสินค้า" class="btn btn-lg  btn-primary" >
                            </td></tr>
                        </form>
                    <?php }else{ ?>

                    <tr><td>ยังไม่มีสินค้าในตะกร้า <a href="categories.php">ไปยังรายการสินค้า</a></td></tr>

                    <?php }?>
                    </table></div></div>

        </div>
    <script>
        var total = <?=$total;?>;
        var last = parseInt(total)+70;
        document.getElementById("demo").innerHTML = last;
        function check(ship) {
            var total = <?=$total;?>;
            if(ship =="ems") ship = 70;
            if(ship =="register") ship = 30;
            var last = (parseInt(ship)+parseInt(total));
            document.getElementById("demo").innerHTML = last;
        }
        

    </script>
    </body>
</html>

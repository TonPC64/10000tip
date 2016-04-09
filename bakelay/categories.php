<?php
session_start();

$_SESSION["page"]="categories";
$_SESSION["sub_page"]="";
include("connect.php");

?>
<html>

    <head>
        <title>รายการสินค้า</title>
        <?php  include("boots.php"); ?>
        <meta charset="utf-8">

    </head>

    <body>
        <?php  include("navbar.php"); ?>


        <div class="container" style="padding-top: 60px;">
            <div class="jumbotron">
                <h1>Bakelay</h1>
                <p>ร้านขายของ</p>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>รายการสินค้า</h4>
                        </div>
                        <div class="panel-body" style="
                                                       padding-top: 0px;
                                                       padding-left: 10px;
                                                       padding-right: 10px;
                                                       padding-bottom: 0px;
                                                       ">
                            <table class="table" style="
                                                        margin-bottom: 0px;
                                                        ">

                                <?php
$sql = "select * from item";
$query = mysqli_query($conn,$sql);
$cout = mysqli_num_rows($query);
                                ?>
                                <thead>
                                    <tr>
                                        <td><a href="categories.php">สินค้าทั้งหมด <span class="badge" style="background-color:#3B5998;"><?=$cout?></span></a></td>
                                    </tr>
                                </thead>
                                <?php
                                    $sql="select * from typeproduct ";
$query = mysqli_query($conn,$sql);
while($rs=mysqli_fetch_assoc($query)){

    $sql = "select * from item where type = ".$rs["typeid"];
    $query2 = mysqli_query($conn,$sql);
    $cout = mysqli_num_rows($query2);
    $text="<tr><td>";
    if(isset($_SESSION["admin"])&&$_SESSION["admin"]=="admin"){

        $text.="<a class=\"various\" data-fancybox-type=\"iframe\" href=\"edittype.php?type=".$rs["typename"]."&id=".$rs["typeid"]."\"><button type=\"button\"  class=\"btn btn-link  btn-sm\" style=\"
                padding-left: 2px;
                padding-right: 2px;
                \"><i class=\"glyphicon glyphicon-edit\"></i></button></a>";
        $text.="<a class=\"deteletbox\" data-fancybox-type=\"iframe\" href=\"delete_type.php?type=".$rs["typename"]."&id=".$rs["typeid"]."\"><button type=\"button\"  class=\"btn btn-link  btn-sm\" style=\"
                padding-left: 2px;
                padding-right: 2px;
                \"><i class=\"glyphicon glyphicon-remove\"></i></button></a>";
    }
    $text.="<a href=\"categories.php?type=".$rs["typeid"]."\">".$rs["typename"]." <span class=\"badge\" style=\"background-color:#3B5998;\">".$cout."</span></a></td></tr>";
    echo $text;
}
if(isset($_SESSION["admin"]))
{if($_SESSION["admin"]=="admin"){
                                ?>
                                <tr>
                                    <td><a class="various" data-fancybox-type="iframe" href="addtype.php"><i class="glyphicon glyphicon-plus"></i> เพิ่มประเภทสินค้า</a></td>
                                </tr>
                                <?php }}?>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php

if(isset($_GET["type"])){
    $sql = "select * from typeproduct where typeid = ".$_GET["type"]."";
    $type = mysqli_query($conn,$sql);
    $nametype = mysqli_fetch_assoc($type);
    $head = $nametype["typename"];

}else{$head = "สินค้าทั้งหมด";}
                            ?>
                            <h4><?=$head?></h4>
                        </div>
                        <div class="panel-body" style="
                                                       padding-bottom: 0px;
                                                       padding-left: 0px;
                                                       padding-right: 0px;
                                                       ">
                            <?php
                                $item = "select * from item ";
if(isset($_GET["type"])){
    $item.="where type='".$_GET["type"]."'";
}
$item = mysqli_query($conn,$item);
while($rs = mysqli_fetch_assoc($item)){
                            ?>

                            <div class="col-sm-4  col-xs-6">
                                <div class="panel panel-default">
                                    <div class="panel-body" style="
                                                                   padding: 0px;

                                                                   ">
                                        <table class="table" style="
                                                                    margin-bottom: 0px;
                                                                    ">
                                            <thead>
                                                <tr>
                                                    <td style="
                                                               padding: 5px;
                                                               ">
                                                        <?=$rs["name"]?>
                                                    </td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="
                                                               padding: 0px;
                                                               ">
                                                        <div class="image"><a class="detailproduct" data-fancybox-type="iframe" href="detailproduct.php?id=<?=$rs["id"]?>" data-toggle="tooltip" title="รายระเอียด <?=$rs["name"]?>"><img src="product/<?=$rs["picture"]?>" class="img img-responsive " style="height:100%;max-width:none;top: 50%;
                                                            left: 50%;
                                                            margin-right: -50%;
                                                            transform: translate(-50%, -50%);"/></a></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="right">
                                                        <?=$rs["price"]?> ฿/
                                                        <?=$rs["unit"]?>
                                                    </td>
                                                </tr>

                                                <?php if(isset($_SESSION["logon"])&&$_SESSION["logon"]=="logon"&&$_SESSION["admin"]!="admin"){?>
                                                <tr>
                                                    <td align="center" style="
                                                                              padding: 0px;
                                                                              ">
                                                        <a class="buy" data-fancybox-type="iframe" href="buyitem.php?id=<?=$rs["id"]?>&name=<?=$rs["name"]?>">
                                                            <input type="button" class="btn btn-danger" value="หยิบใส่ตะกร้า" style="width:100%;padding-left: 0px;padding-right: 0px;">
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php }else if(isset($_SESSION["admin"])&&$_SESSION["admin"]=="admin"){?>
                                                <tr>
                                                    <td align="center" style="
                                                                              padding: 0px;
                                                                              ">
                                                        <a class="editproduct" data-fancybox-type="iframe" href="editproduct.php?id=<?=$rs["id"]?>&name=<?=$rs["name"]?>">
                                                            <input type="button" class="btn btn-primary" value="แก้ไขข้อมูล" style="width:100%;padding-left: 0px;padding-right: 0px;">
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" style="
                                                                              padding: 0px;
                                                                              ">
                                                        <a class="editphoto" data-fancybox-type="iframe" href="editphoto.php?id=<?=$rs["id"]?>&name=<?=$rs["name"]?>">
                                                            <input type="button" class="btn btn-success" value="จัดการรูปภาพ" style="width:100%;padding-left: 0px;padding-right: 0px;">
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" style="
                                                                              padding: 0px;
                                                                              ">
                                                        <a class="deteletbox2" data-fancybox-type="iframe" href="deleteitem.php?id=<?=$rs["id"]?>&name=<?=$rs["name"]?>&pic=<?=$rs["picture"]?>">
                                                            <input type="button" class="btn btn-danger" value="ลบสินค้า" style="width:100%;padding-left: 0px;padding-right: 0px;">
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php } ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <?php } ?>
                            <?php if(isset($_SESSION["logon"])&&$_SESSION["logon"]=="logon"&&isset($_SESSION["admin"])&&$_SESSION["admin"]=="admin"){?>
                            <div class="col-sm-4 col-xs-6">

                                <div class="panel-body">
                                    <center><a class="addproduct" data-fancybox-type="iframe" <?php if(isset($_GET[ "type"])){echo "href=\"add_product.php?type=".$_GET[" type "]."\"";}else{ echo "href=\"add_product.php\"";} ?> ><button type="button" class="btn btn-default btn-circle  btn-lg "><i class="glyphicon glyphicon-plus"></i></button></center>
                                  </div>

                                </div>
                                <?php } ?>
                              </div>
                            </div>
                          </div>

                        </div>
                      </div>
                    </body>


                    </html>
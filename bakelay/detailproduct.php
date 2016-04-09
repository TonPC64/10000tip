<?php
session_start();
?>
<html>
    <head>
        <?php
include("connect.php");
include("boots.php");

        ?>
        <meta charset="utf-8">
    </head>    
    <body>

        <?php
$sql="select * from item where id = '".$_GET["id"]."'";
$query =mysqli_query($conn,$sql);
$rs = mysqli_fetch_assoc($query);
        ?>    
        <div class="container">
            <div class="row">
                <div class="panel panel-default" style="
                                                        margin-bottom: 0px;
                                                        ">
                    <div class="panel-heading">
                        <h4><?=$rs["name"]?></h4>
                    </div>
                    <div class="panel-body" style="
                                                   padding: 0px;

                                                   ">
                        <table class="table" style="
                                                    margin-bottom: 0px;
                                                    ">

                            <thead><tr><td style="
                                padding: 0px;
                                " align="center">
                                <div class="container" style="
                                                              padding-left: 0px;
                                                              padding-right: 0px;
                                                              ">
                                    <?php
            $sql = "SELECT * FROM photo WHERE productid = ".$_GET["id"]."";
$photoquery = mysqli_query($conn,$sql);
$countph = mysqli_num_rows($photoquery);

                                    ?>

                                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                        <!-- Indicators -->
                                        <ol class="carousel-indicators">
                                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>

                                            <?php for($i = 1;$i<=$countph;$i++){?>
                                            <li data-target="#myCarousel" data-slide-to="<?=$i?>"></li>
                                            <?php } ?>

                                        </ol>

                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner" role="listbox">
                                            <div class="item active">
                                                <img src="product/<?=$rs["picture"]?>"  style="width: 100%;">
                                            </div>
                                            <?php
                                        while($ph = mysqli_fetch_assoc($photoquery)){
                                            ?>
                                            <div class="item">
                                                <img src="product/<?=$ph["picture"]?>" style="width: 100%;">
                                            </div>
                                            <?php } ?>

                                        </div>

                                        <!-- Left and right controls -->
                                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>









                                </td></tr></thead>

                            <tr><td>
                                <b>รายละเอียด:</b>
                                <br><?=$rs["detail"]?><br><br>
                                <b>ราคา:</b> <?=$rs["price"]." ฿/".$rs["unit"]?>
                                </td></tr>
                            <?php if(isset($_SESSION["logon"])&&$_SESSION["logon"]=="logon"&&$_SESSION["admin"]!="admin"){?>   
                            <tr><td align="center" style="
                                padding: 0px;
                                "><a class="buy" data-fancybox-type="iframe" href="buyitem.php?id=<?=$rs["id"]?>&name=<?=$rs["name"]?>"><input type="button" class="btn btn-lg btn-danger" value="หยิบใส่ตะกร้า" style="width:100%;"></a></td></tr>
                            <?php }else if(isset($_SESSION["admin"])&&$_SESSION["admin"]=="admin"){?>
                            <tr><td align="center" style="
                                padding: 0px;
                                ">

                                </td></tr>

                            <?php } ?>
                        </table>



                    </div>
                </div>


            </div>    
        </div>


    </body></html>
<html>
<head>
<?php
include("connect.php");
include("boots.php");
include("inputfile.html")

?>
<meta charset="utf-8">
</head>    
<body>
    
 <?php
    if(isset($_FILES["mainpic"]["tmp_name"])){
    $name = $_GET["id"];
    if($_FILES["mainpic"]["type"]=="image/jpeg"){
    $file = $name.".jpg"; 
    }else if($_FILES["mainpic"]["type"]=="image/png"){
    $file = $name.".png"; 
    }else if($_FILES["mainpic"]["type"]=="image/gif"){
    $file = $name.".gif"; 
    }

    unlink("product/".$_POST["pic"]);
    $target_file = "product/".$file;
    move_uploaded_file($_FILES["mainpic"]["tmp_name"], $target_file);
    $sql = "UPDATE item SET picture = '".$file."' where id = ".$_GET["id"]."";
    mysqli_query($conn,$sql);
    ?> 
<script>
parent.location.reload(true);
</script>     
<?php
    }
    ?>   
    
    
    
    
<div class="container kv-main">
        <div class="row">
        <div class="panel panel-default" style="
    margin-bottom: 0px;
">
					<div class="panel-heading">
						<center><h4>จัดการรูปภาพของ <?=$_GET["name"]?></h4></center>
					</div>
					<div class="panel-body"  style="
    padding: 0px;
">
						<p>
							<table  align="center" class="table" style="
    margin-bottom: 0px;
                                                                        ">
                                <?php
                                $sql = "select * from item where id = ".$_GET["id"]."";
                                $query = mysqli_query($conn,$sql);
                                $rs = mysqli_fetch_assoc($query);
                                ?>
                                <tr><td>แก้ไขรูปภาพหลัก</td></tr>
                                <tr><td><img src="product/<?=$rs["picture"]?>" style="height:100;" class="img-thumbnail"></td></tr>
                                <tr><td>
                    <form method="post"  enctype="multipart/form-data" style="margin-bottom: 0px;">                
                    <div class="container kv-main" style="padding: 0px;">     
                    <input id="file-0a" class="file" name="mainpic" type="file" multiple data-min-file-count="1">
                    </div>
                        <input type="hidden" name="pic" value="<?=$rs["picture"]?>">
                    </form>   
                        </td></tr>
                              <tr><td>แก้ไขรูปภาพย่อย</td></tr>  
                        <tr><td>
                            <?php
                            $sql = "SELECT * FROM photo WHERE productid = ".$_GET["id"]."";
                            $photoquery = mysqli_query($conn,$sql);
                            ?>
                            <div class="row">
                                <?php
                                while($ph = mysqli_fetch_assoc($photoquery)){
                                ?>
                                <div class="col-sm-3 col-xs-3"><div class="image">
                                    <a class="deteletbox" data-fancybox-type="iframe" href="deletesubimg.php?id=<?=$ph["id"]?>&pic=<?=$ph["picture"]?>" data-toggle="tooltip"><img src="product/<?=$ph["picture"]?>" style="width:100%;"></a></div>
                                </div>
                                <?php } ?>
                                
                                <div class="col-sm-3 col-xs-3"><div class="panel-body">
                                    <center><a class="various" data-fancybox-type="iframe" href="addsubimg.php?id=<?=$_GET["id"]?>" ><button type="button" class="btn btn-default btn-circle  btn-lg "><i class="glyphicon glyphicon-plus"></i></button></center>
                                </div>
                                </div>
                            </div>
                            </td></tr>
                        
                        
                        
                                <tr><td><input type="button" value="เสร็จสิ้น"  class="btn btn-lg btn-primary" onclick="parent.location.reload(true);" style="width:100%;"></td></tr>
                        
                        </table></div></div></div></div>   
 

    
    
<script>
$("#file-0a").fileinput({
        'allowedFileExtensions' : ['jpg', 'png','gif'],
        
        
        
    });
</script>


</body>
</html>
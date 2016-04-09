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
if(isset($_POST["sub"])){
    
        
$sql="UPDATE item SET name = '".$_POST["name"]."',type = '".$_POST["type"]."',detail = '".$_POST["detail"]."',price = ".$_POST["price"].",unit = '".$_POST["unit"]."' WHERE id = ".$_GET["id"];
mysqli_query($conn,$sql);

?> 
<script>
    parent.location.reload(true);
    parent.jQuery.fancybox.close();
</script>

<?php
}
?>
    
    
    
<form method="post"  enctype="multipart/form-data" style="
    margin-bottom: 0px;
">
    
    <div class="container kv-main">
        <div class="row">
        <div class="panel panel-default" style="
    margin-bottom: 0px;
">
					<div class="panel-heading">
						<center><h4>แก้ไข <?=$_GET["name"]?></h4></center>
					</div>
					<div class="panel-body"  style="
    padding: 0px;
">
						<p>
							<table  align="center" class="table" style="
    margin-bottom: 0px;
">
                                <?php
                                $sql="select * from item where id = ".$_GET["id"]."";
                                $query = mysqli_query($conn,$sql);
                                $item=mysqli_fetch_assoc($query);
                                ?>
            
            <tr>
                <td ><input type=text name="name" class="form-control" placeholder="ชื่อสินค้า" value="<?=$item["name"]?>" required></td>
            </tr>
            <tr>
                <td ><select name="type" class="form-control">
                    <?php 
                    $sql="select * from typeproduct";
                    $query = mysqli_query($conn,$sql);
                    while($rs = mysqli_fetch_assoc($query)){
                    ?>
                    <option value="<?=$rs["typeid"]?>" <?php if($item["type"]==$rs["typeid"]){ echo "selected";}?> ><?=$rs["typename"]?></option>
                    <?php } ?>
                    </select></td>
            </tr>   
            <tr><td ><textarea class="form-control" name="detail" rows="3" placeholder="รายระเอียดสินค้า" required><?=$item["detail"]?></textarea></td></tr>
                                
                                
            <tr><td style="
    padding: 0px;
">
                <table class="table" style="
    margin-bottom: 0px;
">
                    <thead>
                <tr><td><input type="number" name="price" min="0" class="form-control" placeholder="ราคา" value="<?=$item["price"]?>" required></td>
                <td><select class="form-control" name="unit">
                                    <option value="ชิ้น" <?php if($item["unit"]=="ชิ้น"){ echo "selected";}?>>฿/ชิ้น</option>
                                    <option value="ชุด" <?php if($item["unit"]=="ชุด"){ echo "selected";}?>>฿/ชุด</option>
                                    </select></td> 
                    
                    </tr>
                </thead>
                
                
                </table>
                </td></tr>
                                
            
                
                
                
                    
            <tr>  
                <td align="center"><input type="submit" value="แก้ไข" name="sub" class="btn btn-lg btn-success" style="width:100%;"></td>
            </tr>
        </table>
						</p>
					</div>
				</div>
       
    </div>
    </div>
</form>



</body>
</html>
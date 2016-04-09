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
    
$sql = "select id from item order by id desc";
$query = mysqli_query($conn,$sql);
$rs = mysqli_fetch_assoc($query);
$name = $rs["id"]+1;

if($_FILES["file"]["type"]=="image/jpeg"){
    $file = $name.".jpg"; 
    }else if($_FILES["file"]["type"]=="image/png"){
    $file = $name.".png"; 
    }else if($_FILES["file"]["type"]=="image/gif"){
    $file = $name.".gif"; 
    }
        
$sql="insert into item values (".$name.",'".$_POST["name"]."','".$_POST["type"]."','".$_POST["detail"]."',".$_POST["price"].",'".$_POST["unit"]."','".$file."')";
mysqli_query($conn,$sql);

    
$target_file = "product/".$file;
    
move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
    
      
 
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
						<center><h4>เพิ่มสินค้า</h4></center>
					</div>
					<div class="panel-body"  style="
    padding: 0px;
">
						<p>
							<table  align="center" class="table" style="
    margin-bottom: 0px;
">
            
            
            <tr>
                <td ><input type=text name="name" class="form-control" placeholder="ชื่อสินค้า" required></td>
            </tr>
            <tr>
                <td ><select name="type" class="form-control">
                    <?php 
                    $sql="select * from typeproduct";
                    $query = mysqli_query($conn,$sql);
                    while($rs = mysqli_fetch_assoc($query)){
                    ?>
                    <option value="<?=$rs["typeid"]?>" <?php if(isset($_GET["type"])&&$_GET["type"]==$rs["typeid"]){ echo "selected";}?> ><?=$rs["typename"]?></option>
                    <?php } ?>
                    </select></td>
            </tr>   
            <tr><td ><textarea class="form-control" name="detail" rows="3" placeholder="รายระเอียดสินค้า" required></textarea></td></tr>
                                
                                
            <tr><td style="
    padding: 0px;
">
                <table class="table" style="
    margin-bottom: 0px;
">
                    <thead>
                <tr><td><input type="number" name="price" min="0" class="form-control" placeholder="ราคา" required></td>
                <td><select class="form-control" name="unit">
                                    <option value="ชิ้น">฿/ชิ้น</option>
                                    <option value="ชุด">฿/ชุด</option>
                                    </select></td> 
                    
                    </tr>
                </thead>
                
                
                </table>
                </td></tr>
                                
            
                
                
                <tr><td>
                      <div class="container kv-main" style="
    padding: 0px;
">     
                    <input id="file-0a" class="file" name="file" type="file" multiple data-min-file-count="1">
                    </div>
                    
             </td></tr>
                    
            <tr>  
                <td align="center"><input type="submit" value="เพิ่ม" name="sub" class="btn btn-lg btn-primary" style="width:100%;"></td>
            </tr>
        </table>
						</p>
					</div>
				</div>
       
    </div>
    </div>
</form>
<script>
$("#file-0a").fileinput({
        'allowedFileExtensions' : ['jpg', 'png','gif'],
        showUpload: false,
        
    });
</script>


</body>
</html>
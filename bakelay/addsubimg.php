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
if(isset($_FILES["subpic"]["tmp_name"])){
    $sql = "SELECT * FROM photo WHERE productid = ".$_GET["id"]."";
    $photoquery = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($photoquery);
    $count++;
    $name = $_GET["id"];
    if($_FILES["subpic"]["type"]=="image/jpeg"){
    $file = $name."-".$count.".jpg"; 
    }else if($_FILES["subpic"]["type"]=="image/png"){
    $file = $name."-".$count.".png"; 
    }else if($_FILES["subpic"]["type"]=="image/gif"){
    $file = $name."-".$count.".gif"; 
    }
        
$sql="insert into photo values (NULL,'".$_GET["id"]."','".$file."')";
    mysqli_query($conn,$sql);
    $target_file = "product/".$file;
    move_uploaded_file($_FILES["subpic"]["tmp_name"], $target_file);
    
?> 
<script>
parent.location.reload(true);
</script>     
<?php
}
?>
    
    
    
<form method="post"  enctype="multipart/form-data" style="margin-bottom: 0px;"> 
    
    <div class="container">
        <div class="row">
        <div class="panel panel-default" style="
    margin-bottom: 0px;
">
					<div class="panel-heading">
						<center><h4>เพิ่มรูปภาพย่อย</h4></center>
					</div>
					<div class="panel-body">
						<p>
							<table  align="center">
            
            
            <tr>
                <td><div class="container kv-main" style="padding: 0px;">     
                    <input id="file-0a" class="file" name="subpic" type="file" multiple data-min-file-count="1">
                    </div></td>
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
        
        
        
    });
</script>
</body>
</html>
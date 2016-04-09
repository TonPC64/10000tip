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
if(isset($_POST["sub"])){
    if($_POST["type"]!=NULL){
        
$sql="insert into typeproduct values (NULL,'".$_POST["type"]."')";
    mysqli_query($conn,$sql);
    
    }
?> 
<script>
    parent.location.reload(true);
    parent.jQuery.fancybox.close();
</script>    
<?php
}
?>
    
    
    
<form method="post" style="
    margin-bottom: 0px;
">
    
    <div class="container">
        <div class="row">
        <div class="panel panel-default" style="
    margin-bottom: 0px;
">
					<div class="panel-heading">
						<center><h4>เพิ่มรายการสินค้า</h4></center>
					</div>
					<div class="panel-body">
						<p>
							<table  align="center">
            
            
            <tr>
                <td><input type=text name="type" class="form-control"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>                  
            <tr>
                <td align="center"><input type="submit" value="เพิ่ม" name="sub" class="btn btn-success"></td>
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
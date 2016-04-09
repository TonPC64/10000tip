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
        
$sql="DELETE FROM item WHERE id = '".$_GET["id"]."'";
mysqli_query($conn,$sql);
unlink("product/".$_GET["pic"]);    
    
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
						<center><h4>ลบสินค้า</h4></center>
					</div>
					<div class="panel-body">
						<p>
							<table  align="center">
            
                                <tr><td colspan=2 align=left><b><li>คุณแน่ใจแล้วใช่มั้ยว่าจะลบสินค้า<br><font color="red"><?=$_GET["name"]?></font></li><b></td></tr>
                                
                                    <tr><td colspan=2 align=center>&nbsp;</td></tr>
            <tr>
                
                <td align=center><input type="submit" value="ตกลง" name="sub" class="btn btn-lg btn-success"></td>
                <td align=center><input type="button" value="ยกเลิก" class="btn btn-lg btn-danger" onclick="parent.jQuery.fancybox.close();"></td>
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
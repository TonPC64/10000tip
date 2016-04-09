<?php session_start(); ?>
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
    if($_POST["amount"]!=NULL){

      $sql="insert into cart values (NULL,'".$_GET["id"]."',".$_POST["amount"].",'".$_SESSION["user_id"]."',0)";
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
        <center><h4>จำนวน <?=$_GET["name"]?></h4></center>
      </div>
      <div class="panel-body">
        <p>
          <table  align="center">

            <tr>
              <td>จำนวนที่ต้องการซื้อ</td>
            </tr>
            <tr>
              <td><input type=number name="amount" class="form-control" min="1" value="1" autofocus></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="center"><input type="submit" value="หยิบใส่ตะกร้า" name="sub" class="btn btn-danger" ></td>
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

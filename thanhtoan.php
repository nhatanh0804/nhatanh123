<?php 
 session_start();
require_once("include/connect.php");

 ?>
 <h3 style="text-align: center;">Congratulations on your payment and you can now download it</h3>
 <?php 
    if($_SERVER['REQUEST_METHOD']=='POST'){
  $OrderDate=$_POST['date'];
  $OrderName=$_POST['name'];
  $UserID=$_POST['UserID'];
  
  $sql="INSERT INTO order(OrderDate,OrderName,UserID) VALUES ('$OrderDate','$OrderName','$UserID')";
if(mysqli_query($connect,$sql)){
  echo "thanh toan thanh cong";
}
else{
  echo "Error: ".mysqli_errno($connect);
}
}
 ?>
 <?php
 if ($_SERVER['REQUEST_METHOD']=='POST') {
  $id =$_POST['UserID'];
  if (empty($_SESSION['cart'][$id])) {
    $q=mysqli_query($connect,"SELECT * FROM song WHERE SongID = {$id}");
    $product = mysqli_fetch_assoc($q);
      header("location:thanhtoan.php");
  }
 }
 ?>
 <div class="container-fluid">
 <div class="row">
  <link rel="stylesheet" type="text/css" href="cart.css">
  <?php 
  if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) :
    ?>
    <div class="products" style="border: 2px solid black">
    <a href="Detail.php?id=<?php echo $item['SongID']?>" style="text-decoration: none;">
    <div><img src="img/<?php echo $item['SongImage']?>" class="img-cart"></div>
    <h2><?php echo $item['SongName'] ?></h2>
        <audio controls controlsList="autodownload">
          <source src="song/<?php echo $item['MP3'] ?>" type="audio/mpeg">
          </audio>
         </a>
         <br>
         <h4>Click on icon <i class="fas fa-ellipsis-v"></i> to download</h4>
         </div>
           <?php
  endforeach;
  }
     ?>
  </div>  
 
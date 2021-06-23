<?php 
session_start();
require_once("include/connect.php");

if ($_SERVER['REQUEST_METHOD']=='POST') {
  $id =$_POST['id'];
  if (empty($_SESSION['cart'][$id])) {
    $q=mysqli_query($connect,"SELECT * FROM song WHERE SongID = {$id}");
    $product = mysqli_fetch_assoc($q);
    $_SESSION['cart'][$id]=$product;
  $_SESSION['cart'][$id]['sl']=$_POST['sl'];
  }
  header("location:cart.php");
 }
 ?>
 <div class="container-fluid">
 <div class="row">
  <link rel="stylesheet" type="text/css" href="cart.css">
  <h3 class="giohang"><i class="fas fa-shopping-cart"></i>  Cart</h3>
  <br>
  <br>
  <?php 
  if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) :
    ?>
    <div class="products" style="border: 2px solid black">
    <a href="Detail.php?id=<?php echo $item['SongID']?>" style="text-decoration: none;">
    <div><img src="img/<?php echo $item['SongImage']?>" class="img-cart"></div>
    <h2><?php echo $item['SongName'] ?></h2>
        <p style="color: red">Price: <?php echo $item['Price']; ?></p>
        <?php
    echo "<a href='delcart.php?productid=$item[SongID]' style='text-decoration: none;'>Delete</a>";
    ?>
         </a>
         </div>
           <?php
  endforeach;
  }
  else 
    echo "There are no products in the product";
  ?>
  <br>
   <a href="delcart.php?productid=0" style="text-decoration: none; color: white"><button type="button" class="btn btn-danger">Delete All</button></a>
  <div id="total" class="clearfix">
    
  </div>  
  <div class="container" style="border-top:3px solid #38D276;margin-top: 20px">
  <div class="col-md-6" style="border: 1px solid #38D276">
<h3 style="text-align: center;">Payment</h3>
  <form method="POST" action="thanhtoan.php" class="was-validated">
    <div class="form-group">
      <label for="usr">UserID:</label>
      <input type="text" class="form-control" id="UserID" name="UserID" value="">
    </div>
    <div class="form-group">
      <label for="usr">UserName:</label>
      <input type="text" class="form-control" id="usr" name="name" value="">
    </div>
    <label for="bank">Select payment bank</label>
  <select class="custom-select" required id="bank" name="bank">
    <option selected></option>
    <option value="Vietcombank">Vietcombank</option>
    <option value="Techcombank">Techcombank</option>
    <option value="Airpay">Airpay</option>
    <option value="momo">momo</option>
  </select>
<div class="form-group">
  <div class="form-group">
  <label for="usr">Order date:</label>
  <input type="text" class="form-control" id="usr" name="date" value="<?php
  date_default_timezone_set('Asia/Ho_Chi_Minh');
echo "". date("Y.m.d h:i:sa");
?>" readonly>
</div>
<div class="form-group">
  <label for="usr">Total</label>
  <input type="text" class="form-control" id="usr" value=" " name="total">
</div>
<input type="submit" class="btn btn-success" value="Pay" href="thanhtoan.php">

  </form>
  </div>
 </div>
 </div>
 </div>


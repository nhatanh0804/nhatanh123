<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form method="post">
	<h2>Login</h2>
	<label>User name</label>
	<input type="text" name="UserName" placeholder="User Name"> <br>

	<label>Password</label>
	<input type="password" name="Password" placeholder="Password"> <br>

	<button type="submit" name="Login">Login</button>
</form>
</body>
<?php 
session_start();
  include ('include/connect.php');
  if(isset($_POST['Login'])){

    $UserName = $_POST['UserName'];
    $Password = $_POST['Password'];
    $sql="select * from user where UserName='$UserName' AND Password='$Password'";
    $result = mysqli_query($connect,$sql);
    $check_login = mysqli_num_rows($result);
    $row_login = mysqli_fetch_array($result);   
    if($check_login == 0){
     echo "<script>alert('Password or username is incorrect, please try again!')</script>";
     exit();
   }  
   if($check_login > 0){ 
   
   $_SESSION['UserName'] = $row_login['UserName'];
   $_SESSION['UserID'] = $row_login['UserID'];
     
    echo "<script>alert('You have logged in successfully !')</script>";  
    echo"<script>window.open('WebsiteLayout/index.php','_self')</script>";
  }
}
?>
</html>
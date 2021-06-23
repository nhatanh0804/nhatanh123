<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="styledangky.css">
</head>
<body>
<form method="post">
	<h2>Register</h2>
	<label>Username</label>
	<input type="text" name="UserName" placeholder="User Name"> <br>

	<label>Password</label>
	<input type="password" name="Password" placeholder="Password"> <br>

	<label>Phone</label>
    <input type="text" name="Phone" placeholder="Phone"> <br>
	<button type="submit" name="Register">Register</button>
</form>
</body>
<?php 

  include ('include/connect.php');
  if (isset($_POST['Register'])){
			
			$UserID= $_POST['UserID'];
			$UserName= $_POST['UserName'];
			$Password= $_POST['Password'];
			$Phone= $_POST['Phone'];
			$sql="insert into user values('$UserID','$UserName','$Password','$Phone')";
			$result = mysqli_query($connect,$sql);
			if ($result){
				echo "<script>alert('Tạo tài khoản thành công')</script>";
		       echo"<script>window.open('Dangnhap.php','_self')</script>";
			}
			else{
				echo"<script>alert('Lỗi')</script>";
			}
			}
?>
</html>
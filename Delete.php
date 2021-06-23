<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
include ('include/connect.php');
if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
$SongID=$_GET['id'];
$sql = "DELETE FROM song WHERE SongID='$SongID'";
if ($connect->query($sql) === TRUE) {
echo "Xoá thành công!";
} else {
echo "Error updating record: " . 
$connect->error;
}
 
$connect->close();
}
?>
</body>
</html>
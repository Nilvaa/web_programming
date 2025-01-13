<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<?php
$conn=mysqli_connect("localhost","root","","library");
if(!$conn){
die("connection failed".mysqli_connect_error());
}else{
echo "connection success";
}
if(isset($_POST['add'])){
	$id=$_POST['uid'];
	$na=$_POST['uname'];
	$pl=$_POST['place'];
	$da=$_POST['dat'];
	$ph=$_POST['phn'];
	$sql="INSERT INTO `users`(`user_id`,`name`,`place`,`date_of_issue`,`phone`) VALUES('$id','$na','$pl','$da','$ph')";
if(mysqli_query($conn,$sql)){
	echo "user added";
}else{
	echo "error".mysqli_error($conn);
}}
?>
<form method="post" action="add_user.php">
	<input type="number" placeholder="enter id" name="uid"><br><br>
	<input type="text" name="uname" placeholder="enter name" ><br><br>
	<input type="text" placeholder="enter place" name="place"><br><br>
	<label>date of issue</label><input type="date" name="dat"><br><br>
	<input type="text" placeholder="enter phone number" name="phn"><br><br>
	<input type="submit" name="add" value="add user">
	
</form>
<form method="post" action="view_users.php">
<input type="submit" name="view" value="view user">
</form>
</body>
</html>
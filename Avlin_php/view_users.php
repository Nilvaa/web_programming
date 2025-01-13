<html>
<head><title>view user</title></head>
<body>
<?php
$conn=mysqli_connect("localhost","root","","library");
if(!$conn){
	die("connection failed".mysqli_connect_error());
}else{
	echo "connection success";
}
if(isset($_POST['view'])){
	$sql="SELECT * from `users`";
	$res=mysqli_query($conn,$sql);
	$tot=mysqli_num_rows($res);
	if($tot==0){
	echo "no records found";
}else{
	echo '<table border="1">';
	echo '<th>User id</th><th>Name</th><th>Place</th><th>date_of_issue</th><th>Phone</th>';
	while($row=mysqli_fetch_assoc($res)){
	echo '<tr>';
	echo '<td>'.$row['user_id'].'</td>';
	echo '<td>'.$row['name'].'</td>';
	echo '<td>'.$row['place'].'</td>';
	echo '<td>'.$row['date_of_issue'].'</td>';
	echo '<td>'.$row['phone'].'</td></tr>';
}
echo '</table><br><br>';
}
}
?>
<form method="post" action="view_users.php">
<input type="text" placeholder="enter user id" name="uid">
<input type="submit" name="search" value="search">
</form>
<?php
if(isset($_POST['search'])){
	$id=$_POST['uid'];
	$sql="SELECT * FROM `users` WHERE`user_id`='$id'";
	$res=mysqli_query($conn,$sql);
	$tot=mysqli_num_rows($res);
	if($tot==0){
	echo "no records found";
}else{
echo '<table border="1">';
echo '<th>User id</th><th>name</th><th>place</th><th>date of issue</th><th>phone</th>';
while($row=mysqli_fetch_assoc($res)){
	echo '<tr>';
	echo '<td>'.$row['user_id'].'</td>';
	echo '<td>'.$row['name'].'</td>';
	echo '<td>'.$row['place'].'</td>';
	echo '<td>'.$row['date_of_issue'].'</td>';
	echo '<td>'.$row['phone'].'</td></tr>';
}
echo '</table>';
}
}
?>
</body>
</html>
<html>
<head></head>
<body>

<form method="post" action="crud.php">
<input type="text" placeholder="enter name" name="nam"><br><br>
<input type="number" placeholder="enter age" name="ag"><br><br>
<input type="email" placeholder="enter email" name="email"><br><br>
<input type="submit" value="add user" name="add"><br><br>
</form>
<?php
$conn=mysqli_connect("localhost","root","","college");
if(!$conn){
die("conected failed".mysqli_connect_error());
}else{
echo "connection success";
}
if(isset($_POST["add"])){
$na=$_POST["nam"];
$ag=$_POST["ag"];
$em=$_POST["email"];
$sql="INSERT INTO `users`(`name`, `age`, `email`) VALUES ('$na','$ag','$em')";
if(mysqli_query($conn,$sql)){
echo "user added";
}else{
echo "failed".mysqli_error($conn);
}
}
$sql1="SELECT * FROM `users`";
$res=mysqli_query($conn,$sql1);
if(mysqli_num_rows($res)>0){
echo "<table border='1'><tr><th>name</th><th>age</th><th>email</th>";
while($row=mysqli_fetch_assoc($res)){
echo "<tr>
<td>".$row["name"]."</td>
<td>".$row["age"]."</td>
<td>".$row["email"]."</td></tr>";

}
echo "</table>";
}
?>
</body>
</html>
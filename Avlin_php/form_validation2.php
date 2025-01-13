<html>
<head><title></title></head>
<body>
<?php 
$na=$em=$ph="";
$naErr=$emErr=$phErr="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
if(empty($_POST["nam"])){
$naErr="Name is empty";
}else{
$na=input($_POST["nam"]);
}
if(empty($_POST["em"])){
$emErr="email cant be empty";
}else{
$em=input($_POST["em"]);
}
if(empty($_POST["ph"])){
$phErr = "Phone number is required";
} elseif (strlen($_POST["ph"]) != 10) {
$phErr = "Phone number must be exactly 10 digits";
} elseif (!is_numeric($_POST["ph"])) {
$phErr = "Phone number must contain only numbers";
} else {
$ph=input($_POST["ph"]);
}
}
function input($data){
$data=trim($data);
$data=stripslashes($data);
$data=htmlspecialchars($data);
return $data;
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<input type="text" placeholder="enter name" name="nam" value="<?php echo htmlspecialchars($na);?>">
<span><?php echo $naErr;?></span><br>
<input type="email" name="em" placeholder="enter email" value="<?php echo htmlspecialchars($em);?>"><br>
<span><?php echo $emErr;?></span><br>
<input type="number" name="ph" placeholder="enter phone" value="<?php echo htmlspecialchars($ph)?>"><br>
<span><?php echo $phErr;?></span><br>
<input type="submit" value="SIGN UP">
</form></body>
</html>
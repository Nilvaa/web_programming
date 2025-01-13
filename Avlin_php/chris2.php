<html>
<head>
<title>Electricity Bill Calculator</title>
</head>
<body>

<h2>Electricity Bill Calculator</h2>
<form action="chris2.php" method="post">
<label for="name">Consumer Name:</label>
<input type="text" id="name" name="name" required><br><br>
<label for="units">Units Consumed:</label>
<input type="number" id="units" name="units" required><br><br>
<input type="submit" value="Calculate Bill">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$name = trim($_POST['name']);
$units = (int)trim($_POST['units']);
$bill = 0;
$rate1 = 5.00; // For the first 100 units
$rate2 = 7.50; // For the next 100 units
$rate3 = 10.00; // For units above 201
if ($units <= 100) {
$bill = $units * $rate1;
} elseif ($units <= 200) {
$bill = 100 * $rate1 + ($units - 100) * $rate2;
} else {
$bill = 100 * $rate1 + 200 * $rate2 + ($units - 300) *
$rate3; }
echo "<h2>Electricity Bill</h2>";
echo "Consumer Name: " . htmlspecialchars($name) .
"<br>"; echo "Units Consumed: " .
htmlspecialchars($units) . "<br>"; echo "Total Bill: ₹" .
htmlspecialchars($bill);
}
?>
</body>
</html>
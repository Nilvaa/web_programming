<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table {
			width: 100%;
			border-collapse: collapse;}
		th, td {
			border: 1px solid #ddd;
			padding: 8px;
			text-align: center;}
		th {
			background-color: blue;
			color: white;}
		tr:nth-child(even) {
			background-color: #f2f2f2;}
</style>
<body>
<?php
$conn = mysqli_connect("localhost", "root", "", "college");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());}
echo "<center><h4>Connected successfully</h4></center>";
$sql = "SELECT * FROM `student`";
$res = mysqli_query($conn, $sql);
if (mysqli_num_rows($res) > 0) {
    echo "<table border='1' cellspacing='0' cellpadding='5'>";
    echo "<tr><th>Roll Number</th><th>Name</th><th>Email</th>
            <th>Phone</th><th>Age</th><th>Course</th>
          </tr>";
    while ($row = mysqli_fetch_assoc($res)) {
        echo "<tr>
                <td>" . $row["rno"] . "</td>
                <td>" . $row["name"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["phn"] . "</td>
                <td>" . $row["age"] . "</td>
                <td>" . $row["course"] . "</td></tr>";}
    echo "</table>";
} else {
    echo "No records found";}
mysqli_close($conn);
?>
</body>
</html>

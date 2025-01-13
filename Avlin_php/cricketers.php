<!DOCTYPE html>
<html lang="en">
<head>
	<style>
		body{
			background-color: beige;
		}
		table {
			width: 50%;
			border-collapse: collapse;
			margin: 20px auto;
			text-align: left;
			background-color: aliceblue;
		}
		th, td {
			border: 1px solid #ddd;
			padding: 8px;
		}
		th {
			background-color: #f4f4f4;
			text-align: center;
		}
		
	</style>
</head>
<body>
	<h1 style="text-align: center;">Indian Cricket Players and Their Runs</h1>
	<?php
	$cricketers = array("Rohit Sharma" => 3500,"Virat Kohli" => 8600,"KL Rahul" => 2600,"Shubman Gill" => 1000,"Suryakumar Yadav" => 700,"Hardik Pandya" => 500,"Ishan Kishan" => 1000);
	?>
	<table>
		<tr>
			<th>Player Name</th>
			<th>Runs</th>
		</tr>
		<?php 
		foreach ($cricketers as $name => $runs) {
			echo "<tr>";
			echo "<td>$name</td>";
			echo "<td>$runs</td>";
			echo "</tr>";
		}
		?>
	</table>
</body>
</html>

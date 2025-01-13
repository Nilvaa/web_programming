<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<style>
	body{
		background-color: beige;
		margin-left: 30px;
	}
</style>
<body>
	<?php
	$student=array("avlin","kiran","rina","zaya","agnes","hezza","nathan");
	echo '<h5>Using print_r()</h5>';
	print_r($student);
	echo '<br>';
	echo '<h5>Using asort()-Ascending Order, According to Value</h5>';
	asort($student);
	print_r($student);
	echo '<br>';
	echo '<h5>Using arsort()-Descending Order, According to Value</h5>';
	arsort($student);
	print_r($student);
	?>
</body>
</html>
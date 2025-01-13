<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>View Book Details</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			padding: 20px;
			background-color: #f5f5f5;}
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
		#auth_se{
			width: 30%;
			padding: 8px;
			border: 2px solid blue;}
		.btn_search{
		padding: 8px;
		border: 2px solid black;}
	</style>
</head>
<body>
	<?php
	$conn = mysqli_connect("localhost", "root", "", "library");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());}
	if (isset($_POST['view'])) {
		$sql = "SELECT * FROM `book`";
		$res = mysqli_query($conn, $sql);
		$tot = mysqli_num_rows($res);
		if ($tot == 0) {
			echo "<p>No books found</p>";
		} else {
			echo '<table>';
			echo '<tr><th>Book ID</th><th>Title</th><th>Author
			      </th><th>Edition</th><th>Publisher</th></tr>';
			while ($row = mysqli_fetch_assoc($res)) {
				echo '<tr>';
				echo '<td>' . $row['book_id'] . '</td>';
				echo '<td>' . $row['title'] . '</td>';
				echo '<td>' . $row['author'] . '</td>';
				echo '<td>' . $row['edition'] . '</td>';
				echo '<td>' . $row['publis'] . '</td>';
				echo '</tr>';}
			echo '</table><br><br>';}}?>
	<form method="post" action="view_details.php">
	<input type="text" name="auth" placeholder="Enter Author Name" id="auth_se">
	<input type="submit" name="search" value="Search" class="btn_search">
	</form>
	<?php
	if(isset($_POST['search'])){
		$auth = $_POST['auth'];
		$sql = "SELECT * FROM `book` WHERE `author`='$auth'";
		$res = mysqli_query($conn, $sql);
		$tot = mysqli_num_rows($res);
		if ($tot == 0) {
			echo "<p>No books found</p>";}
		while($row=mysqli_fetch_assoc($res)){
			echo '<h4>Book ID: '.$row['book_id'].'</h4>';
			echo '<h4>Book title: '.$row['title'].'</h4>';
			echo '<h4>Author: '.$row['author'].'</h4>';
			echo '<h4>Edition: '.$row['edition'].'</h4>';
			echo '<h4>Published by: '.$row['publis'].'</h4>';}}?></body></html>

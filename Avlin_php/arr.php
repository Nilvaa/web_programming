<html>
<head><title></title></head>
<body>
<?php
$stud=array("copper","snoopy","canny","arlo","cho");
echo '<h5>Using print_r()</h5>';
print_r($stud);
echo '<br><h5>using asort()</h5>';
asort($stud);
print_r($stud);
echo '<br><h5>using arsort()</h5>';
arsort($stud);
print_r($stud);
$cric=array("apple"=>20,"orange"=>10,"kiwi"=>90,"peach"=>99);
?>
<table border="1">
<tr><th>fruits</th>
<th>price</th>
</tr>
<?php
foreach($cric as $name=>$pri){
echo "<tr>";
echo "<td>$name</td>";
echo "<td>$pri</td>";
echo "</tr>";
}
?>
<table>
</body>
</html>
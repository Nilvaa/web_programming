<?php
$students = array("John", "Alice", "Bob", "Eve", "Charlie");
echo "Original Array:\n";
print_r($students);
asort($students);
echo "\nArray after asort (ascending order):\n";
print_r($students);
arsort($students);
echo "\nArray after arsort (descending order):\n";
print_r($students);
?>
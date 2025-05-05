<?php
// Step 1: Store student names in an array
$students = array("Ali", "Zaira", "Ameer", "Fatima", "Bilal");

// Step 2: Display original array
echo "<h3>Original Student List:</h3>";
echo "<pre>";
print_r($students);
echo "</pre>";

// Step 3: Sort using asort() - ascending by value
asort($students);
echo "<h3>Student List (Sorted Ascending using asort):</h3>";
echo "<pre>";
print_r($students);
echo "</pre>";

// Step 4: Sort using arsort() - descending by value
arsort($students);
echo "<h3>Student List (Sorted Descending using arsort):</h3>";
echo "<pre>";
print_r($students);
echo "</pre>";
?>

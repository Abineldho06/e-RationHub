<?php
$ServerName = "sql105.infinityfree.com";
$UserName = "if0_39515570";
$Password = "Muthumma2164";
$DB = "if0_39515570_rationhub";

$Con = mysqli_connect($ServerName, $UserName, $Password, $DB);

// Optional: show error if connection fails
if (!$Con) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>

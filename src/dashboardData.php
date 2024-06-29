<?php
include("../inc/connect.inc");

$sql = "SELECT * FROM airports";
$result = mysqli_query($conn, $sql);
$airportsCount = mysqli_num_rows($result);

$sql = "SELECT * FROM amenities";
$result = mysqli_query($conn, $sql);
$amenitiesCount = mysqli_num_rows($result);

$sql = "SELECT * FROM lounges";
$result = mysqli_query($conn, $sql);
$loungesCount = mysqli_num_rows($result);

<?php
include("../inc/connect.inc");

// Get the lounge information from the POST request
$nameLounge=$_POST["nameLounge"];
$locationLounge = $_POST["locationLounge"];
$timeLounge = $_POST["timeLounge"];
$descriptionLounge = $_POST["descriptionLounge"];
$idAirport = $_POST["idAirport"];

// Prepare the SQL query to insert a new reservation into the database
$sql = "INSERT INTO lounges VALUES (NULL, '$nameLounge', '$locationLounge', '$timeLounge', '$descriptionLounge', '$idAirport')";

// Execute the SQL query and check for any errors
if (mysqli_query($conn, $sql)) {
  // Redirect the user to the search result page
  header("Location:../public/dashboardLounges.php");
} else {
  // If there was an error, display the error message
  echo "Error: ". $sql. "<br>". mysqli_error($conn);
}
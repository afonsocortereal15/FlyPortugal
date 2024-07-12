<?php
include("../inc/connect.inc");

// Get the venue information from the POST request
$nameVenue = $_POST['nameVenue'];
$locationVenue = $_POST['locationVenue'];
$timeVenue = $_POST['timeVenue'];
$typeVenue = $_POST['typeVenue'];
$idAirport = $_POST['idAirport'];

  $file_data = base64_decode($_FILES['logoVenue']);

  // Store the file data in the profile_image variable
  $logoVenue = $file_data;

// Prepare the SQL query to insert a new reservation into the database
$sql = "INSERT INTO venues  VALUES (NULL, '$nameVenue', '$locationVenue', '$timeVenue', '$logoVenue', '$typeVenue', '$idAirport')";

// Execute the SQL query and check for any errors
if (mysqli_query($conn, $sql)) {
  // Redirect the user to the search result page
  header("Location:../public/dashboardVenues.php");
} else {
  // If there was an error, display the error message
  echo "Error: ". $sql. "<br>". mysqli_error($conn);
}
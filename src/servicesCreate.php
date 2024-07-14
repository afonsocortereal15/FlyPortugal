<?php
include("../inc/connect.inc");

// Get the service information from the POST request
$nameService = $_POST['nameService'];
$locationService = $_POST['locationService'];
$timeService = $_POST['timeService'];
$typeService = $_POST['typeService'];
$idAirport = $_POST['idAirport'];

$file_data = base64_decode($_FILES['logoService']);

// Store the file data in the profile_image variable
$logoService = $file_data;

// Prepare the SQL query to insert a new reservation into the database
$sql = "INSERT INTO services  VALUES (NULL, '$nameService', '$locationService', '$timeService', '$logoService', '$typeService', '$idAirport')";

// Execute the SQL query and check for any errors
if (mysqli_query($conn, $sql)) {
  // Redirect the user to the search result page
  header("Location:../public/dashboardServices.php");
} else {
  // If there was an error, display the error message
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

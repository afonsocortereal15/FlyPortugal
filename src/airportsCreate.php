<?php
include("../inc/connect.inc");

// Get the airport information from the POST request
$iataAirport = $_POST['iataAirport'];
$nameAirport = $_POST['nameAirport'];

// Prepare the SQL query to insert a new reservation into the database
$sql = "INSERT INTO airports VALUES (NULL, '$iataAirport', '$nameAirport')";

// Execute the SQL query and check for any errors
if (mysqli_query($conn, $sql)) {
  // Redirect the user to the search result page
  header("Location:../public/dashboardAirports.php");
} else {
  // If there was an error, display the error message
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

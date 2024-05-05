<?php
// Define the API key and the flight number from the GET request
$env = parse_ini_file('../inc/info.env');
$api_key = isset($env['API_KEY']) ? $env['API_KEY'] : ''; // API key from the environment file or set to an empty string
$flightNumber = isset($_GET['flight']) ? htmlspecialchars($_GET['flight']) : ''; // Flight number from the GET request or set to an empty string

// Initialize variables
$bg_image = '../assets/bg/default-bg.jpeg';
$decoded = [];
$dep_icao = 'n/a';
$arr_icao = 'n/a';
$status = 'n/a';

if (!empty($api_key) && !empty($flightNumber)) { // If both the API key and flight number are provided
  // Get and decode JSON response from the API
  $url = "https://airlabs.co/api/v9/flight?flight_iata={$flightNumber}&api_key={$api_key}";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $json = curl_exec($ch);
  curl_close($ch);

  $decoded = json_decode($json, true);

  // If the flight is not found using IATA code, try searching using the ICAO code
  if (isset($decoded["error"]["message"]) && $decoded["error"]["message"] == "Flight not found") {
    $url = "https://airlabs.co/api/v9/flight?flight_icao={$flightNumber}&api_key={$api_key}";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $json = curl_exec($ch);
    curl_close($ch);

    $decoded = json_decode($json, true);

    if ($decoded["error"]["message"] == "Flight not found") { // If the flight is still not found
      // Redirect to the flight not found error page
      header("Location: ../errors/flight-not-found.html");
      exit;
    }
  }

  // Store the decoded JSON response in variables
  if (isset($decoded["response"]) && is_array($decoded["response"])) {
    foreach ($decoded["response"] as $key => $value) {
      if ($value === null) {
        $$key = "n/a"; // Set the variable to 'n/a' if the value is null
      } else {
        $$key = $value; // Set the variable to the value from the decoded JSON
      }
    }

    // Define an array of Portuguese airport codes for background images
    $pt_airports = ['LPPT', 'LPPR', 'LPFR', 'LPMA', 'LPPS', 'LPPD', 'LPAZ', 'LPHR', 'LPFL'];

    // Set the background image based on the departure and arrival airport
    if (in_array($dep_icao, $pt_airports)) {
      $bg_image = "../assets/img/bg/{$dep_icao}.jpg";
    } elseif (in_array($arr_icao, $pt_airports)) {
      $bg_image = "../assets/img/bg/{$arr_icao}.jpg";
    } else {
      $bg_image = "../assets/img/bg/default-bg.jpeg";
    }

    // Set the status and status badge color based on the Flight Status
    switch ($status) {
      case "en-route":
        $status = "En-Route";
        $status_color = "success";
        $dep_status = "Actual - " . substr($dep_actual, -5);
        $arr_status = "Estimated - " . substr($arr_estimated, -5);
        break;
      case "scheduled":
        $status = "Scheduled";
        $status_color = "secondary";
        $dep_status = "Estimated - " . substr($dep_estimated, -5);
        $arr_status = "Estimated - " . substr($arr_estimated, -5);
        break;
      case "landed":
        $status = "Landed";
        $status_color = "warning";
        $dep_status = "Actual - " . substr($dep_actual, -5);
        $arr_status = "Actual - " . substr($arr_actual, -5);
        break;
      case "cancelled":
        $status = "Cancelled";
        $status_color = "danger";
        break;
    }
  }
}

// Set the flight code cookie for one week
$cookie_name = "flight";
$cookie_value = $flight_iata;
setcookie($cookie_name, $cookie_value, time() + (86400 * 7), "/flyportugal/");

// Set the airline logo URL
$airline_logo = "https://cdn.radarbox.com/airlines/" . $airline_icao . ".png";

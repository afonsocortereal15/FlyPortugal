<?php
include("../inc/connect.inc");

function printTable() {
  global $conn;
  $sql = "SELECT * FROM amenities";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // output data of each row in a card
    while ($row = mysqli_fetch_assoc($result)) {
      echo '
      <tr>
        <td><img src="data:image/jpeg;base64,' . base64_encode($row['logoAmenity']) . '" class="amenityLogo"></td>
        <th scope="row">'. $row['idAmenity'] .'</th>
        <td>'. $row['nameAmenity'] .'</td>
        <td>'. $row['locationAmenity'] .'</td>
        <td>'. $row['timeAmenity'] .'</td>
        <td>'. $row['typeAmenity'] .'</td>
        <td>'. $row['idAirport'] .'</td>
        <td><button type="button" class="btn btn-primary">Edit</button></td>
        <td><button type="button" class="btn btn-danger">Delete</button></td>
      </tr>
      ';
    }
  }
}
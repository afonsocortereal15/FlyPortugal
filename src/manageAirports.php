<?php
include("../inc/connect.inc");

function printTable() {
  global $conn;
  $sql = "SELECT * FROM airports";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // output data of each row in a card
    while ($row = mysqli_fetch_assoc($result)) {
      echo '
      <tr>
        <th scope="row">'. $row['idAirport'] .'</th>
          <td>'. $row['iataAirport'] .'</td>
          <td>'. $row['nameAirport'] .'</td>
          <td>'. $row['cityAirport'] .'</td>
          <td><button type="button" class="btn btn-primary">Edit</button></td>
          <td><button type="button" class="btn btn-danger">Delete</button></td>
      </tr>
      ';
    }
  }
}
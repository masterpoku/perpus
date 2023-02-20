<?php

include 'koneksi.php';
// $username  = $_REQUEST['username'];
$sql = "SELECT * FROM `mahasiswa` WHERE `username` LIKE 'damarwulan1'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["nama"]. " " . $row["req_perpus"]. " " . $row["STB"]. " " . $row["fklts"]. "" . $row["jrsn"]. " " . $row["almt"]. " " . $row["img"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
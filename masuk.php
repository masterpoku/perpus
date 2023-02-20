<?php
include "koneksi.php";

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$sql = "SELECT * FROM `mahasiswa` WHERE `username` LIKE '$username' AND `password` LIKE '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
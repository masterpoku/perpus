<?php

include '../koneksi.php';
// $username  = $_REQUEST['username'];
$sql = "SELECT * FROM `buku` ORDER BY `code` ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - CODE: " . $row["code"]. " " . $row["jdl_buku"]. " " . $row["updt_buku"]. " " . $row["status"] . " " . $row["img"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();



?>

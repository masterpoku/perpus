


<?php

include '../koneksi.php';
// $username  = $_REQUEST['username'];
$sql = "SELECT * FROM `absen`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Nama: " . $row["username"]. " " . $row["foto"]. " " . $row["date"].  "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();



?>

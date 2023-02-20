<?php

include '../koneksi.php';
// $username  = $_REQUEST['username'];
$sql = "SELECT * FROM `mahasiswa` ORDER BY `mahasiswa`.`id` DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - REG: " . $row["req_perpus"]. " " . $row["nama"]. " " . $row["STB"]. " " . $row["fklts"]. " " . $row["jrsn"]. " " . $row["almt"]. "  " . $row["email"]. " " . $row["username"]. " " . $row["password"]. " " . $row["level"]. " " . $row["status"]. " " . $row["img"]. " " . $row["create"]. " <a href=anggota.php?active=". $row["id"].">link text</a> <br>";
  }
} else {
  echo "0 results";
}



if (!empty($_GET['active'])) {
    # code...
    $sql = "UPDATE `mahasiswa` SET `status` = '1' WHERE `mahasiswa`.`id` =".$_GET['active'];

if ($conn->query($sql) === TRUE) {
  header("Location: " . $_SERVER["HTTP_REFERER"]);
} else {
  echo "Error updating record: " . $conn->error;
}



}
?>

<?php
include "koneksi.php";
$username = $_REQUEST['username'];
$foto = $_REQUEST['foto'];

$sql = "INSERT INTO `absen` (`id`, `username`, `foto`, `date`) VALUES (NULL, '$username', '$foto', current_timestamp())";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>


<?php
include "koneksi.php";
$req_perpus = $_REQUEST['req_perpus'];
$nama = $_REQUEST['nama'];
$STB = $_REQUEST['STB'];
$fklts = $_REQUEST['fklts'];
$jrsn = $_REQUEST['jrsn'];
$almt = $_REQUEST['almt'];
$email = $_REQUEST['email'];
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$level = $_REQUEST['level'];

$sql = "INSERT INTO `mahasiswa` (`id`, `req_perpus`, `nama`, `STB`, `fklts`, `jrsn`, `almt`, `email`, `username`, `password`, `level`, `created`) VALUES (NULL, '$req_perpus', '$nama', '$STB', '$fklts', '$jrsn', '$almt', '$email', '$username', '$password', '$level', current_timestamp())";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

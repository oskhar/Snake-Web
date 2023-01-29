<?php 

$conn = mysqli_connect("localhost", "moskharm_user", "
g8N7a6O5d4S3e2T1", "moskharm_game");


$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
$nama = $POST['nama'];
$waktu = $POST['waktu'];
$skor = $POST['skor'];

$query = "INSERT INTO snake VALUES ('$ip','$nama','$waktu','$skor')";

mysqli_query($conn,$query);

?>
<?php
session_start();
$kodeA = $_SESSION['kodeA'];
include('php/connect.php');
$sql = "INSERT INTO tabel_log VALUES ('Telah logout',NOW(),'$kodeA')";
$exec = mysqli_query($conn, $sql);
session_destroy();
header('Location: login.php');
exit;
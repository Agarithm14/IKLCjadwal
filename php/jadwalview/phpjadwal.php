<?php
/*
    Script ini buat menampilkan jadwal per minggu
*/

//untuk minggu ini dan minggu depan
$tabel = array("jadwal_lab","jadwal_lab2");


//ncol = banyaknya column atau ruangan
include dirname(__FILE__) . '\..\connect.php';
$nruang = 8;
$sql = "SELECT * from lab ORDER BY no_ruangan";
$query_ruangan = mysqli_query($conn, $sql);
//dari senin sampai jumat
for ($ruang = 0;$ruang < $nruang; $ruang++)
{
    $nama_ruang = mysqli_fetch_assoc($query_ruangan);
    include 'tampilruang.php';
}
<?php
/*
    Script ini buat menampilkan jadwal per minggu
*/

//untuk minggu ini dan minggu depan
$tabel = array("jadwal_lab","jadwal_lab2");


//ncol = banyaknya column atau ruangan
$ncol = 4;

//dari senin sampai jumat
for ($nhari=0; $nhari<5; $nhari++)
{
    switch ($nhari) {
        case 0:
            $hari = 'Senin';
            break;
        case 1:
            $hari = 'Selasa';
            break;
        case 2:
            $hari = 'Rabu';
            break;
        case 3:
            $hari = 'Kamis';
            break;
        case 4:
            $hari = 'Jumat';
            break;       
    }
    include 'tampilhari.php';
}
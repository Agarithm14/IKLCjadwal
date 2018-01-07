<?php

include 'connect.php';

function init()
{
    session_start();
}

function jadwal($week, $mode)
{
    /*
        fungsi untuk mencetak tabel jadwal
        $week digunakan untuk minggu ke berapa
            0 = minggu ini
            1 = minggu depan
        $mode untuk miih view atau crud
            0 = view
            1 = crud
    */

    include 'jadwalview/phpjadwal.php';
}

function insertupdate($num,$kodeA,$role)
{
    include 'connect.php';

    $minggu = floor($num / 10000) % 10;
    $hari   = floor($num / 1000) % 10;
    $jam    = (floor($num / 100)) % 10;
    $ruang  = floor($num / 10) % 10;
    $con    = $num % 10;
    if ($minggu == 0) {
        $minggu = "jadwal_lab";
    } else {
        $minggu = "jadwal_lab2";
    }
    ;
    if ($con == 0) {
        $sql = "SELECT * FROM " . $minggu . " WHERE hari=" . $hari . " and waktu =" . $jam . " and ruangan=" . $ruang . ";";
        $tes = mysqli_query($conn, $sql);
        if (!mysqli_num_rows($tes)) //agar tidak dobel
        {
            $sql = "INSERT INTO " . $minggu . " (kode_matkul,grup,waktu,hari,ruangan) VALUES ('" . $_POST["kode_matkul"] . "'," . $_POST["kode_grup"] . "," . $jam . "," . $hari . "," . $ruang . ");";
        }
    } else if ($con == 1) {
        $sql = "update " . $minggu . " set kode_kelas='" . $_POST["data"] . "' where hari=" . $_POST["hari"] . " and waktu =" . $_POST["jam"] . " and ruangan=" . $_POST['ruang'] . ";";
    } else {
        if ($role==0)
        {
            $sql = "SELECT * FROM `asislab` WHERE kode_asis='$kodeA' and kode_matkul=".$_POST["kode_matkul"]." and grup=".$_POST["kode_grup"].";";
            $tes = mysqli_query($conn, $sql);
            if (!mysqli_num_rows($tes)) 
            {
                return "<script>alert('Tidak boleh menghapus jadwal praktikum lain')</script>";
            }
        }
        $sql = "DELETE FROM " . $minggu . " WHERE hari=" . $hari . " and waktu =" . $jam . " and ruangan=" . $ruang . ";";
    }
    /*
    if (mysqli_query($conn, $sql))
        return true;
    else
        return true;
    */
    if (mysqli_query($conn, $sql))
        return "";
    else
        return "<script>alert('gagal')</script>";
}

function checkLogin()
{
    /* 
        fungsi untuk mengecek login
    */
    if (!isset($_SESSION['kodeA'])) {
        header("Location: login.php");
        die();
    }
}

function tryLogin($kodeA, $pass)
{
    /*
        cek apakah bisa login atau engga
    */
    include 'connect.php';
    $sql = "SELECT Kode, nim, pass FROM asisten WHERE Kode = '$kodeA' AND pass = '$pass' ";
    $exec = mysqli_query($conn, $sql);
    if (mysqli_num_rows($exec)) return true;
    else return false;
}

function checkRole($kodeA)
{
    /*
        untuk cek role
        0 = asisten
        1 = admin
    */
    include 'connect.php';
    $sql = "SELECT role FROM asisten WHERE Kode = '$kodeA' ";
    $exec = mysqli_query($conn, $sql);
    $arr = mysqli_fetch_array($exec);
    return $arr[0];
}
<?php
    include 'connect.php';
    session_start();
    $kode = $_GET['kode_matkul'];
    $asisten = $_SESSION['kodeA'];
    $sql2 = mysqli_query($conn, "SELECT `grup` FROM `asislab` WHERE `kode_matkul`='$kode' AND `kode_asis`='$asisten'");
    while ($row2 = mysqli_fetch_assoc($sql2)) {
        echo "<option value='" . $row2["grup"] . "'>" . $row2["grup"]  . "</option>";
    }


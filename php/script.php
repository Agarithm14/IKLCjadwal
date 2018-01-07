<?php
    //include 'connect.php';
    $sql = "SELECT * FROM asisten ";
    $exec = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($exec)) {
        $nim = $row["NIM"];
        $nim = md5(md5(md5(md5(md5($nim)))));
        $kode = $row["Kode"];
        $sql2 = "UPDATE `asisten` SET `pass`='$nim' WHERE `Kode`='$kode'";
        if (!mysqli_query($conn, $sql2))
            echo "gagal di '$kode' dan '$pass'";
    }
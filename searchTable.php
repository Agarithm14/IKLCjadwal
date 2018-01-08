<?php
function cetak_hari($hari){
    switch ($hari){
        case 0:
            return "senin";
            break;
        case 1:
            return "Selasa";
            break;
        case 2:
            return "Rabu";
            break;
        case 3:
            return "Kamis";
            break;
        case 4:
            return "Jumat";
            break;
    }
}
?>

<table class="table">
    <thead class="thead-light">
        <th>Hari</th>
        <th>Ruang</th>
        <th>Jam</th>
    </thead>
    <?php
        try{
            error_reporting(0);
            list($grup, $kode_matkul) = explode(" ", $_GET["grup"]);
        }
        catch (Exception $e){
            echo '<h2>Data tidak ditemukan</h2>';
        }
        $sql = "SELECT waktu, hari, ruangan from jadwal_lab WHERE jadwal_lab.grup = '". $kode_matkul. "' AND jadwal_lab.kode_matkul = '". $grup. "'";
        $tes = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($tes)){
            echo "
    <tr>
        <td>". cetak_hari($row['hari']) ."</td>
        <td>". $row['ruangan'] ."</td>
        <td>". $row['waktu'] ."</td>
    </tr>
            
            ";
        }
    ?>
    
</table>
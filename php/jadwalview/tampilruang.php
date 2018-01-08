<?php
/*
    Tampilan HTML jadwal per hari
*/
include dirname(__FILE__) . '\..\connect.php';
?>

<div class='col-sm-6 table-title'>
    <h4><b>
        <?php echo 'Lab ' .  $nama_ruang["nama_ruangan"];?>
    </b></h4>
    <table class='table text-center table-condensed'>
        <thead class='text-center'>
            <th class='jam'>
                Jam
            </th>
            <th>
                Senin
            </th>
            <th>
                Selasa
            </th>
            <th>
                Rabu
            </th>
            <th>
                Kamis
            </th>
            <th>
                Jumat
            </th>
        </thead>
        <?php
            $sql = "SELECT TIME_FORMAT(jam_awal, '%H:%i'), waktu from blok_waktu ORDER BY jam_awal";
            $jadwal = mysqli_query($conn, $sql);


            $indexjam = 0;
            while ($row = mysqli_fetch_array($jadwal)) {
                include 'tampiljam.php';
                $indexjam++;
            }
        ?>
    </table>
</div>
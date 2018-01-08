<?php
    include dirname(__FILE__) . '\..\connect.php';

    //ambil nilai jam
    $jam = $row[0];

    //ambil data
    for ($nhari=0; $nhari<5; $nhari++)
    {
        $sql = "SELECT kode_matkul , grup from " .$tabel[$week] .
            " WHERE ruangan=" . $ruang . " AND waktu=" . $row["waktu"] .
            " AND hari=" . $nhari ;
        $query = mysqli_query($conn, $sql);
        $arr = mysqli_fetch_assoc($query);
        $val = $arr["kode_matkul"] . ' ' . $arr["grup"];

        //admin mode
        if ($mode == 1)
        {
            //nilai id
            $id = $week . $nhari . $indexjam . $ruang;

            //nilai class
            $class = "btn crud-jadwal";

            //cek jika nilainya kosong, k parameter kondisi add/delete
            if (($val == NULL) || ($val == ' '))
            {
                $k = 0;
                $val = "+";
                $class = $class . " btn-primary";
                $data_target = "#tambah-jadwal";
            }
            else {
                $k = 1;
                $class = $class . "  jadwal-del btn-danger";
                $data_target = "#edit-jadwal";
            }
            $id = $id . $k;

            $attr = "type='button' id='$id' class='$class' data-toggle='modal' data-target='$data_target'";
            $col[$nhari] = "<button " . $attr . " >" .  $val . "</button>";
        }
        else $col[$nhari] = $val;
    }
?>

<tr>
    <td>
        <?php echo $jam ?>
    </td>
    <?php
        for ($j = 0; $j < 5; $j++)
        {
            
            echo "<td>";
            echo $col[$j];
            echo "</td>";
        }
    ?>
</tr>
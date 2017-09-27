<?php
include 'head.php';

//cek apakah udah login
checkLogin();

echo '<body>';

//untuk sql update
if (isset($_POST['kode']))
{
    if (insertupdate($_POST['kode']))
        echo "<script>alert('test')</script>";
    else 
        echo "<script>alert('gagal :v')</script>";
    unset($_POST['kode']);
}
?>
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<div class="container-fluid jadwal">
    <h1 class="text-center">Admin page <?php echo $_SESSION['kodeA'];?></h1>
    <div class="row">
        <h3>Minggu ini</h3>
        <div id="tabel-jadwal">
            <?php jadwal(0,1);?>
        </div>
    </div>
    <div class='row'>
        <h3>Minggu depan</h3>
        <div id="tabel-jadwal">
            <?php jadwal(1,1);?>
        </div>
    </div>
</div>

<div id="edit-jadwal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Jadwal</h4>
            </div>
            <div class="modal-body">
                <form id="del-form" action="admin.php" method="post">
                    <input type="text" name="kode" id="ambilkode" style="display:none">
                </form>
                <button class="btn btn-danger" id="del-btn">hapus</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="tambah-jadwal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Jadwal</h4>
            </div>
            <div class="modal-body">
                <form action="admin.php" method="post">
                    <p>Tambah kelas :</p>
                    <select name="kode_matkul">
                    <?php
include 'connect.php';
$sql = mysqli_query($conn, "SELECT kode_matkul FROM matkul WHERE 1");
while ($row = mysqli_fetch_assoc($sql)) {
    echo "<option value='" . $row["kode_matkul"] . "'>" . $row["kode_matkul"] . "</option>";
}
?>
                    </select>
                    <select name="kode_grup">
                    <?php
for ($x = 1; $x <= 6; $x++) {
    echo "<option value='" . $x . "'>" . $x . "</option>";
}
?>
                    </select>
                    <input type="text" name="kode" id="ambilkode" style="display:none">
                    <button type="submit" class="btn btn-success">submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $(".crud-jadwal").click(function(){
            var teks = $(this).attr('id');
            $("input:text").val( teks );
        });
        $("#del-btn").click(function(){
            var teks = $("input:text").val();
            teks = parseInt(teks)+2;
            $("input:text").val( teks );
            document.forms["del-form"].submit();
        });
    })
</script>
<?php
//include 'ajax.html';
?>
<?php
include 'footer.php';
?>
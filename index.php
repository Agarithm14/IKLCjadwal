<?php 
include 'head.php';
echo '<body>';
?>

<div class="container-fluid jadwal">
    <h1 class="text-center">Jadwal Praktikum IKLC</h1>
    <div class="row">
        <div><?php jadwal(0,0);?></div>
    </div>
    <hr>
    <div class="row">
        <h3 class='text-center'>Jadwal Untuk Minggu Depan</h3>
        <div><?php jadwal(1,0);?></div>
    </div> 
    <hr>
    <?php include 'cari.php';?>
</div>

<script src="js/jquery-3.1.1.min.js"></script>
<script>
    $(document).ready(function(){
        $("#btn-tool1").click(function(){
            $("#tool1").toggle();
        });
        $("#btn-tool2").click(function(){
            $("#tool2").toggle();
        });
    })
</script>
<script src="js/bootstrap.min.js"></script>
<?php include 'footer.php';?>
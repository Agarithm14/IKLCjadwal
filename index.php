<?php 
include 'head.php';
echo '<body>';
include 'navbar.php';
?>

<div class="container-fluid jadwal-container search-container">
    <h1 class="text-center">Jadwal Praktikum IKLC</h1>
    
    <?php
    if (!isset($_GET["grup"])){
        echo '<div class="row jadwal">';
        jadwal(0,0);
        echo '</div><hr><h3 class="text-center">Jadwal Untuk Minggu Depan</h3>';
        echo '<div class="row jadwal">';
        jadwal(1,0);
        echo '</div>';
    }
    else{
        include 'searchtable.php';
    }
    ?>
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
    });
</script>
<script src="js/bootstrap.min.js"></script>
<?php include 'footer.php';?>
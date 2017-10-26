<div class="row">
    <form action="admin.php" method="post">
        <p>Tambah Asisten :</p>
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
        <select name="asisten">
        <?php
            include 'connect.php';
            $sql = mysqli_query($conn, "SELECT kode FROM asisten ORDER BY kode ASC");
            while ($row = mysqli_fetch_assoc($sql)) {
                echo "<option value='" . $row["kode"] . "'>" . $row["kode"] . "</option>";
            }
        ?>
        </select>
        <button type="submit" class="btn btn-success">submit</button>
    </form>
</div>
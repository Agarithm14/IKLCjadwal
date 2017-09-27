<?php
if (isset($_POST['uname'])) {
	session_start();
        if ($_POST['uname']=="penjadwalan")
		{
			$_SESSION["nama"]='admin';
			header("Location: admin.php");
			die();
		}
		session_destroy();
    }
?>
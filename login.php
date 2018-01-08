<?php 
		include 'head.php';
	//costom css untuk sign in
	echo '<link href="css/signin.css" rel="stylesheet">';
	echo '<body>';

	//init pesan error
	$pesan_error = "";
	if (isset($_POST['kodeA']))
	{
		$kodeA = trim($_POST['kodeA']);
		$kodeA = strip_tags($kodeA);
		$kodeA = htmlspecialchars($kodeA);
		$kodeA = strtoupper($kodeA);
		
		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		$pass = md5($pass);
		if(!tryLogin($kodeA, $pass)) $pesan_error = "gagal";
		else {
            $sql = "INSERT INTO tabel_log VALUES ('Telah login',NOW(),'$kodeA')";
            $exec = mysqli_query($conn, $sql);
			$_SESSION['kodeA'] = $kodeA;

			//ambil role apa dia
			$_SESSION['role'] = checkRole($kodeA);

			//ke admin php
			header("Location: admin.php");
            
		}
	}
?>

<div class="container">
	<form class="form-signin" action="" method="post">
		  <h2 class="form-signin-heading">Please sign in</h2>
		  <label for="inputEmail" class="sr-only">Email address</label>
		  <input type="text" id="inputEmail" class="form-control" placeholder="Username" name='kodeA' required autofocus>
		  <label for="inputPassword" class="sr-only">Password</label>
		  <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name='pass'>
		  <div class="checkbox">
			<label><?php echo $pesan_error;?></label>
		  <label>
		    <input type="checkbox" value="remember-me"> <p>Remember me</p>
		  </label>
		  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </div>
	</form>
</div>

<?php
include 'footer.php';
?>
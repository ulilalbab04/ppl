<?php 
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$q_login=mysql_query("SELECT * FROM file_pengguna WHERE username='$username' AND password='$password'") or die (mysql_error());
$data_user=mysql_fetch_array($q_login);

$cek_login=mysql_num_rows($q_login);

//cek validitas user
if ($cek_login>0)
	{
		$_SESSION['id_pengguna'] = $data_user['id_pengguna'];
		$_SESSION['level'] = $data_user['level'];
		
		if ($_SESSION['level']==0){
?>		<script>
			alert("Akun anda belum dikonfirmasi oleh admin. Silahkan coba beberapa saat lagi!");
			document.location.href="index.php";
		</script>
<?php 	}
		if ($_SESSION['level']==1){
?>		<script>
			document.location.href="index_super_admin.php";
		</script>
<?php 	}
		if ($_SESSION['level']==2){
?>		<script>
			document.location.href="index_admin.php";
		</script>
<?php 	}
		if ($_SESSION['level']==3){
?>		<script>
			document.location.href="index_member.php";
		</script>
<?php
		}
	}
else{
?>		<script>
			alert("username atau password salah");
			document.location.href="index.php";
		</script>
<?php
	}
?>
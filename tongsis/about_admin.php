<?php 
	session_start();
	$cek_id_pengguna=$_SESSION['id_pengguna'];
	$cek_level=$_SESSION['level'];
	
	if (!(isset($cek_id_pengguna)) or $cek_level!=2){
			session_destroy();
?>		<script>
			document.location.href="index.php";
		</script>
<?php 	
		}
	include "koneksi.php";
	include_once "head.php"; 
	include_once "header.php"; 
	include_once "menu_admin.php"; 
	include_once "pagination.php";
?>
<div class="row" id="content_about">
	<div class="container-fluid">
		<h1><center> INFORMASI KOMUNITAS </center></h1>
		<p class="lead text-justify"><br>
			Komunitas Photography Semarang merupakan salah satu pilihan komunitas yang cukup banyak digemari hingga saat ini, 
			akan tetapi komunitas photography ini seperti belum ada wadah yang baik untuk mereka dalam hal saling bertukar pendapat, 
			sharing-sharing terkait hasil karya yang telah mereka buat, dan juga publikasi informasi yang terkadang belum maksimal. 
			Oleh karena itu dibangun suatu sistem informasi Photography Semarang Information System (TONGSIS) yang diharapkan akan menjadi
			wadah yang sangat berguna untuk komunitas mereka tersebut dan juga mampu mengatasi masalah yang sedang mereka alami.
		</p><br></br>
		<blockquote class="blockquote-reverse">
			<address>
				<strong>Photography Semarang Information System.</strong><br>
				Tembalang<br>
				Semarang, SMG <br>
				<abbr title="Phone">P : </abbr> (024) XXX-XXXX
			</address>
		</blockquote>
	</div>
</div>
<?php include_once "footer.php"?>
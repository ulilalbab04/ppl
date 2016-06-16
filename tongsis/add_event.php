<?php 
	session_start();
	$cek_id_pengguna=$_SESSION['id_pengguna'];
	$cek_level=$_SESSION['level'];
	
	if (!(isset($cek_id_pengguna)) or !isset($cek_level) or $cek_level==3){
			session_destroy();
?>		<script>
			document.location.href="index.php";
		</script>
<?php 	
		}
include "koneksi.php";
$id_pengguna=$_GET['id'];
$judul=$_POST['name'];
$date=date('y-m-d', strtotime($_POST['date']));
$isi=$_POST['desc'];


$q_add_comment=mysql_query("INSERT INTO file_event(
															id_pengguna,
															tgl_event,
															judul,
															isi)
													VALUES(
															'$id_pengguna',
															'$date',
															'$judul',
															'$isi')
							") or die ("ERROR query insert event".mysql_error());

													
													
if ($_SESSION['level']==1){
?>		
		<script>
			alert("Event berhasil dimasukkan");
			document.location.href="event_super_admin.php";
		</script>
<?php 	}
		if ($_SESSION['level']==2){
?>		
		<script>
			alert("Event berhasil dimasukkan");
			document.location.href="event_admin.php";
		</script>
<?php 	}
?>
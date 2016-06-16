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
	$id_event=$_GET['id'];
	$page=$_GET['page'];
	

	$q_hapus=mysql_query("DELETE FROM file_event WHERE id_event='$id_event'") or die ("ERROR query delete foto di file_event".mysql_error());
	
	
	if ($_SESSION['level']==1){
?>		
	<script>
		alert("Event berhasil dihapus");
		document.location.href="event_super_admin.php?page=<?php echo $page;?>";
	</script>
<?php	
	}
	if ($_SESSION['level']==2){
?>		
	<script>
		alert("Event berhasil dihapus");
		document.location.href="event_admin.php?page=<?php echo $page;?>";
	</script>
<?php	
	}
?>

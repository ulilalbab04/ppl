<?php 
	session_start();
	$cek_id_pengguna=$_SESSION['id_pengguna'];
	$cek_level=$_SESSION['level'];
	
	if (!(isset($cek_id_pengguna)) or $cek_level!=1){
			session_destroy();
?>		<script>
			document.location.href="index.php";
		</script>
<?php 	
		}
	include "koneksi.php";
	$id_komen=$_GET['id_komen'];
	$id_foto=$_GET['id'];

	$q_hapus=mysql_query("DELETE FROM file_komentar WHERE id_komentar='$id_komen'") or die ("ERROR query delete foto di file_komen".mysql_error());
	
	
	if ($_SESSION['level']==1){
?>		
	<script>
		alert("Komentar berhasil dihapus");
		document.location.href="comment_box_super_admin.php?id=<?php echo $id_foto;?>";
	</script>
<?php	
	}
?>

<?php 
	session_start();
	$cek_id_pengguna=$_SESSION['id_pengguna'];
	$cek_level=$_SESSION['level'];
	
	if (!(isset($cek_id_pengguna)) or !isset($cek_level)){
			session_destroy();
?>		<script>
			document.location.href="index.php";
		</script>
<?php 	
		}
include "koneksi.php";
$id_foto=$_GET['id'];
$nama_file=$_GET['name'];
$page=$_GET['page'];
$path = './galeri/'.$nama_file;
unlink($path);

$q_hapus=mysql_query("DELETE FROM file_foto WHERE id_foto='$id_foto'") or die ("ERROR query delete foto di file_foto".mysql_error());

		if ($_SESSION['level']==1){
?>		<script>
			alert("Foto berhasil dihapus");
			document.location.href="my_collection_photo_super_admin.php?page=<?php echo $page;?>";
		</script>
<?php 	}
		if ($_SESSION['level']==2){
?>		<script>
			alert("Foto berhasil dihapus");
			document.location.href="my_collection_photo_admin.php?page=<?php echo $page;?>";
		</script>
<?php 	}
		if ($_SESSION['level']==3){
?>		<script>
			alert("Foto berhasil dihapus");
			document.location.href="my_collection_photo_member.php?page=<?php echo $page;?>";
		</script>
<?php 	}
?>
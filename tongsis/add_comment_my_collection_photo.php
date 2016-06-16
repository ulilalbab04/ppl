<?php 
	session_start();
	include "koneksi.php";
	$cek_id_pengguna=$_SESSION['id_pengguna'];
	$cek_level=$_SESSION['level'];
	
	$id_foto=$_GET['id'];
	$comment=$_POST['add_comment'];
	$q_add_comment=mysql_query("INSERT INTO file_komentar(
															id_pengguna,
															id_foto,
															isi_komentar)
													VALUES(
															'$cek_id_pengguna',
															'$id_foto',
															'$comment'
													)") or die ("ERROR query insert komentar".mysql_error());

													
													
		if ($_SESSION['level']==1){
?>		<script>
			document.location.href="view_my_collection_super_admin.php?id=<?php echo $id_foto;?>";
		</script>
<?php 	}
		if ($_SESSION['level']==2){
?>		<script>
			document.location.href="view_my_collection_admin.php?id=<?php echo $id_foto;?>";
		</script>
<?php 	}
		if ($_SESSION['level']==3){
?>		<script>
			document.location.href="view_my_collection_member.php?id=<?php echo $id_foto;?>";
		</script>
<?php
		}
?>
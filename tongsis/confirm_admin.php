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
	$id_pengguna=$_GET['id'];
	$act=$_GET['act'];
	$page=$_GET['page'];
	
	if ($act==1){
			$q_act=mysql_query("UPDATE file_pengguna SET level=2 WHERE id_pengguna='$id_pengguna'") or die ("ERROR query update admin di file_pengguna".mysql_error());
		}
	else if($act==2){
			$q_act=mysql_query("DELETE FROM file_pengguna WHERE id_pengguna='$id_pengguna'") or die ("ERROR query delete user di file_pengguna".mysql_error());
		}
		
	
?>		
	<script>
		alert("Operasi sukses!");
		document.location.href="member_list.php?page=<?php echo $page;?>";
	</script>

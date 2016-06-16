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
	include_once "pagination.php";
?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title> Photography Semarang Information System | Tongsis</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		
		<!-- Bootstrap -->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet">
		<style type="text/css">
			.pagination{
					margin: 0px;
			}
		</style>
		<!-- Fav and touch icons -->
		<link rel="shortcut icon" href="assets/ico/favicon-tongsis.png">
	</head>
	<body>
		<?php 
			include "koneksi.php";
			include_once "pagination.php";
			$id = $_GET['id'];
			$q_komentar=mysql_query("SELECT file_komentar.id_komentar as id_komentar,
											file_komentar.isi_komentar as isi_komentar,
											file_pengguna.id_pengguna as id_pengguna_komentar,
											file_pengguna.nama as nama_komentar
									FROM file_komentar, file_pengguna 
									WHERE file_komentar.id_foto='$id' AND file_pengguna.id_pengguna=file_komentar.id_pengguna
									ORDER BY id_komentar ASC") or die ("ERROR fetch komentar".mysql_error());
		?>
		<div class="container">
			<!--<p style="font-size: 30px;" align="center"> Commentar </p>-->
			<table class="table table-hover" style="font-size:13px;">
				<thead>
					<tr>
						<th>Name</th>
						<th>Comment</th>
					</tr>
				</thead>
				<tbody>
		<?php 
				while ($f_komen=mysql_fetch_array($q_komentar))
					{
						echo "<tr>";
						echo "<td>".$f_komen['nama_komentar']."</td>";
						echo "<td>".$f_komen['isi_komentar']."</td>";
						echo "<td>
								<a href=del_comment_collection_super_admin.php?id_komen=".$f_komen['id_komentar']."&id=".$id.">
									<img src=img/cross.png alt=hapus width=20 height=20/>								
								</a>
							  </td>";
						echo "</tr>";
					}
		?>
				</tbody>
			</table>
			<center>
				<!--<?php
					// menampilkan tombol paginasi
					showPagination($table, $dataPerPage); 
				?>-->
			</center>
		</div>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="assets/js/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="assets/js/bootstrap.min.js"></script>
	</body>
</html>
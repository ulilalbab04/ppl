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
	include_once "head.php"; 
	include_once "header.php"; 
	include_once "menu_super_admin.php"; 
	include_once "pagination_confirm.php";
?>
<div class="row" id="content_event">
	<div class="container-fluid">
		<h1 align="center"> CONFIRMATION REGISTRATION </h1>
		<?php
		// untuk mengetahui halaman keberapa yang sedang dibuka
		// juga untuk men-set nilai default ke halaman 1 jika tidak ada
		// data $_GET['page'] yang dikirimkan
		$page = 1;
		if (isset($_GET['page']) && !empty($_GET['page']))
			$page = (int)$_GET['page'];
		 
		// untuk mengetahui berapa banyak data yang akan ditampilkan
		// juga untuk men-set nilai default menjadi 5 jika tidak ada
		// data $_GET['perPage'] yang dikirimkan
		$dataPerPage = 5;
		if (isset($_GET['perPage']) && !empty($_GET['perPage']))
			$dataPerPage = (int)$_GET['perPage'];
		 
		// tabel yang akan diambil datanya
		$table = 'file_pengguna';
		 
		// ambil data
		$dataTable = getTableData($table, $page, $dataPerPage);
		 
		?>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>No</th>
					<th>ID</th>
					<th>Username</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($dataTable as $i => $data) 
				{
					$no = ($i + 1) + (($page - 1) * $dataPerPage);
					echo '<tr>
							<td>'.$no.'</td>
							<td>'.$data['id_pengguna'].'</td>
							<td>'.$data['username'].'</td>
							<td>
								<a class="btn btn-primary" role="button" href=confirm_member.php?act=1&id='.$data['id_pengguna'].'&page='.$page.' title="confirm"><span class="glyphicon glyphicon-ok"></span> Terima</a>
								<a class="btn btn-danger" role="button" href=confirm_member.php?act=2&id='.$data['id_pengguna'].'&page='.$page.' title="delete"><span class="glyphicon glyphicon-trash"></span> Hapus </a>
							</td>
						</tr>';
				}
				?>
			</tbody>
		</table>
		<center>
			<?php
				// menampilkan tombol paginasi
				showPagination($table, $dataPerPage); 
			?>
		</center>
	</div>
</div>
<?php include_once "footer.php"?>
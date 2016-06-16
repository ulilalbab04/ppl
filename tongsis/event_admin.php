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
<div class="row" id="content_event">
	<div class="container-fluid">
		<h1 align="center">EVENT</h1>
		<label class="text-left" style="background-color:#EEEEEE;"> Add New Event 
			<a href="add_new_event.php">
				<button type="button" class="btn btn-primary btn-sm">
					<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
				</button>
			</a>
		</label>
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
		$table = 'file_event';
		 
		// ambil data
		$dataTable = getTableDataEvent($table, $page, $dataPerPage);
		 
		?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Event</th>
					<th>Tanggal Event</th>
					<th>Deskripsi Event</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				if(empty($dataTable)){
					echo '<tr>
							<td colspan="5">Tidak ada event dalam waktu dekat.</td>
						</tr>';
				}else{
					foreach ($dataTable as $i => $data) 
					{
						$date=$data['tgl_event'];
						$tanggal=date("d F Y", strtotime($date));
						$up_to_date=mysql_query("DELETE FROM file_event WHERE tgl_event<DATE_SUB(NOW() , INTERVAL 1 DAY)");
						$no = ($i + 1) + (($page - 1) * $dataPerPage);
						echo '<tr>
								<td>'.$no.'</td>
								<td>'.$data['judul'].'</td>
								<td>'.$tanggal.'</td>
								<td>'.$data['isi'].'</td>
								<td>
									<a href=delete_event.php?id='.$data['id_event'].'&page='.$page.'>
										<img src="img/cross.png" alt="hapus" width="20" height="20"/>
									</a>
								</td>
							</tr>';
					}
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
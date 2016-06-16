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
		?>
		<div class="container">
			<p style="font-size: 30px;" align="center">EVENT</p>
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
			$dataPerPage = 4;
			if (isset($_GET['perPage']) && !empty($_GET['perPage']))
				$dataPerPage = (int)$_GET['perPage'];
			 
			// tabel yang akan diambil datanya
			$table = 'file_event';
			 
			// ambil data
			$dataTable = getTableDataEvent($table, $page, $dataPerPage);
			 
			?>
			<table class="table table-striped" style="font-size:13px;">
				<thead>
					<tr>
						<th>No</th>
						<th>Event</th>
						<th>Tanggal Event</th>
						<th>Deskripsi Event</th>
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
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="assets/js/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="assets/js/bootstrap.min.js"></script>
	</body>
</html>
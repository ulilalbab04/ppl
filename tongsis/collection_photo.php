<?php 
	include "koneksi.php";
	include_once "head.php"; 
	include_once "header.php"; 
	include_once "menu.php"; 
	include_once "pagination.php";
?>
<div class="row" id="content_collection_photo">	
	<div class="container-fluid">
		<h1 class="text-center"> COLLECTION PHOTO </h1>
		<div class="galeri">
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
			$dataPerPage = 10;
			if (isset($_GET['perPage']) && !empty($_GET['perPage']))
				$dataPerPage = (int)$_GET['perPage'];
			 
			// tabel yang akan diambil datanya
			$table = 'file_foto';
			 
			// ambil data
			$dataTable = getTableDataCollection($table, $page, $dataPerPage);
			 
			?>
			<div class="table-responsive">
				<table class="table table-bordered">
					<tbody>
						<tr>
							<?php
							foreach ($dataTable as $i => $data)
							{
								$no = ($i + 1) + (($page - 1) * $dataPerPage);?>
								<td>
									<img src="galeri/<?php echo $data['nama_file'];?>" alt="aba" width="250" height="210" border="0" oncontextmenu="return false"/>
								</td>
							<?php
								if ($no % 5 == 0){ echo '</tr><tr>';}
							};?>	
						</tr>
					</tbody>
				</table>
			</div>
			<center>
				<?php
					// menampilkan tombol paginasi
					showPagination($table, $dataPerPage); 
				?>
			</center>
		</div>
	</div>
</div>
<?php include_once "footer.php"?>
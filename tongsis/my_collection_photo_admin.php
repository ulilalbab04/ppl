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
	include_once "my_pagination.php";
?>
<div class="row" id="content_collection_photo">
	<div class="container-fluid" >
		<h1 class="text-center"> MY COLLECTION PHOTO </h1>
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
			$dataTable = getTableData($table, $cek_id_pengguna, $page, $dataPerPage);
			 
			?>
			<div class="table-responsive">
				<table class="table table-bordered">
					<tbody>
						<tr>
							<?php
							if(empty($dataTable)){
								echo '<tr>
										<td>My Collection photo belum tersedia.</td>
									</tr>';
							}else{
								foreach ($dataTable as $i => $data)
								{
									$no = ($i + 1) + (($page - 1) * $dataPerPage);?>
									<td>
										<!--<a href="galeri/<?php echo $data['nama_file'];?>">-->
										<?php 
											$id = $data['id_foto'];
											$nama_foto=	$data['nama_file'];
										?>
										<a href="view_my_collection_admin.php?id=<?php echo $id;?>">
											<img src="galeri/<?php echo $data['nama_file'];?>" alt="aba" width="250" height="210" border="0"/>
										</a>
										<br>
										<?php echo substr($data['nama_file'],0,-4);?>&nbsp
										<a href="delete_my_collection_photo.php?id=<?php echo $id;?>&page=<?php echo $page;?>" onclick="return confirm ('Apakah anda yakin akan menghapus <?php echo $nama_foto;?>?')">
											<img src="img/cross.png" alt="hapus" width="30" height="30"/>
										</a>
									</td>
								<?php
									if ($no % 5 == 0){ echo '</tr><tr>';}
								};
							}?>	
						</tr>
					</tbody>
				</table>
			</div>
			<center>
				<?php
					// menampilkan tombol paginasi
					showPagination($table, $cek_id_pengguna, $dataPerPage); 
				?>
			</center>
		</div>
	</div>
</div>
<?php include_once "footer.php"?>
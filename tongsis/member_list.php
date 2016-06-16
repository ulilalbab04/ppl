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
	include_once "pagination_become_admin.php";
?>
<div class="row" id="content_event">
	<div class="container-fluid">
		<h1 align="center"> MEMBER LIST </h1>
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
					<th style="width:10%;">No</th>
					<th style="width:20%;">ID Member</th>
					<th style="width:30%;">Username</th>
					<th style="width:20%;">Action</th>
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
								<a href="" data-toggle="modal" 
								data-id1="'.$data['foto'].'" 
								data-id2="'.$data['nama'].'" 
								data-id3="'.$data['username'].'" 
								data-id4="'.$data['email'].'" 
								data-id5="'.$data['tempat_lhr'].'" 
								data-id6="'.$data['tgl_lhr'].'"
								data-target="#addProfil" class="btn btn-info btn-sm open-ProfilDialog"><span class="glyphicon glyphicon-user"></span> PROFIL </a>
								<!--// dibawah ini modal bukan models, bahasa gampanganya pop up window yang kotakanya lebih bagus. pahami sendiri dan pasti akan tahu arti masing-masing syntax nya.-->
								<div class="modal fade" id="addProfil" tabindex="-1" role="dialog" aria-labelledby="addProfil" aria-hidden="true">
									<div class="modal-dialog" style="margin: 60px auto;">
										<div class="modal-content">
											<div class="modal-header" style="background-color: #1919c1;">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
												<h4 class="modal-title" id="myAddLabel" style="color: white;"><strong> PROFIL ANGGOTA </strong></h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-4"></div>
													<div class="col-md-4"><p class="thumbnail"><img src="" alt="fotoprofil" class="img-circle" id="fotoprofil"></p></div>
													<div class="col-md-4"></div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="name" class="control-label" style="text-align:left;"> Name </label>
															<input type="text" class="form-control" name="name" id="name" value="" disabled>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="username" class="control-label" style="text-align:left;"> Username </label>
															<input type="text" class="form-control" name="username" id="username" value="" disabled>
														</div>	
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="email" class="control-label" style="text-align:left;"> Email </label>
															<input type="email" class="form-control" name="email" id="email" value="" disabled>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="placeofbirth" class="control-label" style="text-align:left;"> Place of Birth </label>
															<input type="text" class="form-control" name="tempat_lahir" id="placeofbirth" value="" disabled>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="dateofbirth" class="control-label" style="text-align:left;"> Date of Birth </label>
															<div class="input-group date">
																<input type="text" class="form-control" name="tanggal_lahir" id="dateofbirth" value="" disabled><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="modal-footer" style="background-color: #1919c1;">
												<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>	
											</div>	
										</div>																	
									</div>
								</div>
								<a class="btn btn-primary btn-sm" role="button" href=confirm_admin.php?act=1&id='.$data['id_pengguna'].'&page='.$page.'><span class="glyphicon glyphicon-lock"></span> Ubah Hak Akses</a>
								<a class="btn btn-danger btn-sm" role="button" href=confirm_admin.php?act=2&id='.$data['id_pengguna'].'&page='.$page.' title="delete"><span class="glyphicon glyphicon-trash"></span> Hapus </a>
							</td>
						</tr>';
				}
				?>
			</tbody>
		</table>
		<!--<center>
			<?php
				// menampilkan tombol paginasi
				showPagination($table, $dataPerPage); 
			?>
		</center>-->
	</div>
</div>
<?php include_once "footer.php"?>
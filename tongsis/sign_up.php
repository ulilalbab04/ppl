<?php 
	include "koneksi.php";
	include_once "head.php"; 
	include_once "header.php"; 
	include_once "menu.php"; 
	include_once "pagination.php";
	
	if($_POST){	
				$username=$_POST['username'];
				$email=$_POST['email'];
				$password=md5($_POST['password']);
				$repassword=md5($_POST['repassword']);
				$nama=$_POST['name'];
				$tempat_lahir=$_POST['tempat_lahir'];
				$tanggal_lahir=date('y-m-d', strtotime($_POST['tanggal_lahir']));
				//echo $tanggal_lahir;
				$cekuser=mysql_num_rows(mysql_query("SELECT username FROM file_pengguna where username = '$username'"));
				if($cekuser>0){
					?>
					<script>alert("username sudah digunakan, \nsilahkan ganti username anda ...");</script>
				<?php
				}else{
					if($password==$repassword){
						if($_FILES['file_foto']['size'] > 0 && $_FILES['file_foto']['error'] == 0){
							if ($_FILES["file_foto"]["size"] > 2000000) {
								//echo "Sorry, your file is too large.";
								?>
									<script>
										alert("Sign Up gagal, harap sesuaikan ukuran gambar yang diperbolehkan!!! Ukuran foto anda lebih dari 2 MB.");
										document.location.href="sign_up.php";
									</script>
									<?php				
							}else{
								$target_dir = "profil_img/";
								$target_file = $target_dir . basename($_FILES["file_foto"]["name"]);
								$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
								// Check if file already exists
								if (file_exists($target_file)) {
									//echo "Sorry, file already exists.";
									//echo $tanggal_lahir;
									$uploadOk = 0;
									?>
									<script>
										alert("Sign Up gagal, foto dengan nama sama telah tersedia / ganti nama file");
										document.location.href="sign_up.php";
									</script>
									<?php
								}else{
								// Allow certain file formats
									if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG") {
										//echo "Sorry, only JPG, JPEG, & PNG files are allowed.";
										?>
										<script>
											alert("Sign Up gagal harap sesuaikan format gambar yang diperbolehkan");
											document.location.href="sign_up.php";
										</script>
										<?php
									}else{
										echo "Lolos.";
										$move = move_uploaded_file($_FILES['file_foto']['tmp_name'], "profil_img/".$_FILES['file_foto']['name']);
										if($move){
											$insert = "INSERT INTO file_pengguna(
																			username,
																			email,
																			password,
																			nama,
																			tempat_lhr,
																			tgl_lhr,
																			foto,
																			level
																		) VALUES(
																				'$username',
																				'$email',
																				'$password',
																				'$nama',
																				'$tempat_lahir',
																				'$tanggal_lahir',
																				'".$_FILES['file_foto']['name']."',
																				'0')";
										}
										mysql_query($insert) or die (mysql_error());?>
										<script>
											alert("Sign Up berhasil, Silahkan login dengan username dan password anda !!!");
											document.location.href="index.php";
										</script>
									<?php
									}
								}
							}
						}else{
						?>
							<script>
								alert("Sign Up gagal");
								document.location.href="sign_up.php";
							</script>
						<?php
						}
					}else{
					?>
						<script>
							alert("Password tidak sama");
							document.location.href="sign_up.php";
						</script>
					<?php
					}
				}	
	}
?>
<div class="row" id="content_sign_up">
	<div class="container">
		<h1><center> PENDAFTARAN MEMBER </center></h1></br>
		<form class="form-horizontal" role="form" method="POST" id="defaultForm" data-toggle="validator" action="" enctype="multipart/form-data" onsubmit="return validate_sign_up()">
			<div class="row">
				<div class="col-xs-12 col-md-8">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="name" class="control-label"> Name </label>
							</div>
						</div>
						<div class="col-md-8">
							<div class="form-group">
								<input type="text" class="form-control" name="name" size="90" placeholder="Name" required autofocus/>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="username" class="control-label"> Username </label>
							</div>
						</div>
						<div class="col-md-8">
							<div class="form-group">
								<input type="text" class="form-control" name="username" id="username" size="90" placeholder="Username" required />
								<span id="pesan"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="email" class="control-label"> Email </label>
							</div>
						</div>
						<div class="col-md-8">
							<div class="form-group">
								<input type="email" class="form-control" name="email" size="90" placeholder="Email" required />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="password" class="control-label"> Password </label>
							</div>
						</div>
						<div class="col-md-8">
							<div class="form-group">
								<input type="password" class="form-control" name="password" size="90" placeholder="Password" required />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="repassword" class="control-label"> Repeat Password </label>
							</div>
						</div>
						<div class="col-md-8">
							<div class="form-group">
								<input type="password" class="form-control" name="repassword" size="90" placeholder="Re-type Password" required />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="tempat_lahir" class="control-label"> Tempat Lahir </label>
							</div>
						</div>
						<div class="col-md-8">
							<div class="form-group">
								<input type="text" class="form-control" name="tempat_lahir" size="90" placeholder="Tempat Lahir" required />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="tanggal_lahir" class="control-label"> Tanggal Lahir </label>
							</div>
						</div>
						<div class="col-md-8" id="tanggal_lahir_member">
							<div class="input-group date">
								<input type="text" class="form-control" name="tanggal" id="date_coba" placeholder="Date" pattern='^([0-9/]){10,}$' maxlength='10' data-error='Silahkan dengan format tanggal yang sesuai (tanggal/bulan/tahun)' onchange="return validate_add_lahir()" disabled  required><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								<input type="hidden" class="form-control" name="tanggal_lahir" id="dateofbirth" value="" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="upload_photo" class="control-label"> Upload Photo </label>
							</div>
						</div>
						<div class="col-md-8">
							<div class="form-group">
								<input type="file" class="filestyle primary" name="file_foto" id="upload-image" accept="image/*">
								<p class="help-block">Silahkan foto profil Anda ke dalam sistem.</br>
									(Format file : jpg, jpeg, png | ukuran max 1024 x 768 pixel | max file_size : 2 MB)</br>
								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-4">
					<div class="form-group">
						<img id="image-preview" src="assets/img/default.png" alt="no_image" />
					</div>
					<div class="form-group">
						<center><button type="submit" class="btn btn-primary"> SIGN UP </button></center>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<?php include_once "footer.php"?>
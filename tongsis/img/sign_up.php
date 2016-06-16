<?php 
	include "koneksi.php";
	include_once "head.php"; 
	include_once "header.php"; 
	include_once "menu.php"; 
	include_once "pagination.php";
	
	if($_POST){	
				$username=$_POST['username'];
				$email=$_POST['email'];
				$password=$_POST['password'];
				$repassword=$_POST['repassword'];
				$nama=$_POST['name'];
				$tempat_lahir=$_POST['tempat_lahir'];
				$tanggal_lahir=$_POST['tanggal_lahir'];
	
				if($password==$repassword){
									if($_FILES['file_foto']['size'] > 0 && $_FILES['file_foto']['error'] == 0){
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
									}
									mysql_query($insert) or die (mysql_error());
							?>
									<script>
										alert("Pendaftaran berhasil");
										document.location.href="index.php";
									</script>
							<?php
							}
				else{
							?>
									<script>
										alert("Password tidak sama");
										document.location.href="sign_up.php";
									</script>
							<?php
									}
				}	
?>
<div class="row" id="content_sign_up">
	<div class="container">
		<h1><center> PENDAFTARAN MEMBER </center></h1></br>
		<form class="form-horizontal" role="form" method="POST" id="defaultForm" action="" enctype="multipart/form-data">
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
								<input type="text" class="form-control" name="username" size="90" placeholder="Username" required />
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
						<div class="col-md-8">
							<div class="form-group">
								<input type="date" class="form-control" name="tanggal_lahir" size="90" placeholder="Tanggal Lahir" required />
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
								<input type="file" class="filestyle primary" name="file_foto" id="upload-photo" accept="image/*">
								<p class="help-block"> *) max 2 mb </p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-4">
					<div class="form-group">
						<img id="image-profile" src="assets/img/default.png" alt="no_image" />
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
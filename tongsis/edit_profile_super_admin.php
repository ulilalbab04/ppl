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
	
	$id=$_GET['id'];
	$q_user=mysql_query("SELECT * from file_pengguna WHERE id_pengguna='$id'") or die ("ERROR query".mysql_error());
	$user=mysql_fetch_array($q_user);
	
	if($_POST){
				$email=$_POST['email'];
				$nama=$_POST['name'];
				$tempat_lahir=$_POST['tempat_lahir'];
				$tanggal=$_POST['tanggal_lahir'];
				$tanggal_lahir=date('y-m-d', strtotime($_POST['tanggal_lahir']));
				if(empty($tanggal)){
					$update = "UPDATE file_pengguna SET nama='$nama', email='$email', tempat_lhr='$tempat_lahir'";
				}else{
					$update = "UPDATE file_pengguna SET nama='$nama', email='$email', tempat_lhr='$tempat_lahir', tgl_lhr='$tanggal_lahir' ";
				}
				if($_FILES['fil']['size'] > 0 && $_FILES['fil']['error'] == 0){
					if ($_FILES["fil"]["size"] > 2000000) {
						//echo "Sorry, your file is too large.";
						?>
						<script>
							alert("Edit profil gagal harap sesuaikan ukuran gambar yang diperbolehkan");
							document.location.href="profile_super_admin.php";
						</script>
						<?php				
					}else{
						$target_dir = "profil_img/";
						$target_file = $target_dir . basename($_FILES["fil"]["name"]);
						$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
						// Check if file already exists
						if (file_exists($target_file)) {
							//echo "Sorry, file already exists.";
							$uploadOk = 0;
							?>
							<script>
								alert("Edit profil gagal, foto dengan nama sama telah tersedia  / ganti nama file");
								document.location.href="profile_super_admin.php";
							</script>
							<?php
						}else{
						// Allow certain file formats
							if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG") {
								//echo "Sorry, only JPG, JPEG, & PNG files are allowed.";
								?>
								<script>
									alert("Edit profil gagal harap sesuaikan format gambar yang diperbolehkan");
									document.location.href="profile_super_admin.php";
								</script>
								<?php
							}else{
								//echo "Lolos.";
								$path = './profil_img/'.$user['foto'];
								unlink($path);
								$move = move_uploaded_file($_FILES['fil']['tmp_name'], "profil_img/".$_FILES['fil']['name']);
								if($move){
									$update .= ", foto='".$_FILES['fil']['name']."'";
								}
								$update .= " WHERE id_pengguna='$id'";
								mysql_query($update) or die (mysql_error());?>
								<script>
									alert("Edit profil berhasil");
									document.location.href="profile_super_admin.php";
								</script>
							<?php
							}
						}
					} 
				}else{
					$update .= " WHERE id_pengguna='$id'";
					mysql_query($update) or die (mysql_error());
					?>
					<script>
						alert("Edit profil berhasil");
						document.location.href="profile_super_admin.php";
					</script>
					<?php
				}
				exit;
			}
?>
<div class="row" id="content_about">
	<div class="container">
		<h1><center> EDIT PROFILE </center></h1><br>
		<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
		<div class="col-md-8" style="text-align:left;">
			<div class="form-group">
				<label for="name" class="col-sm-2 control-label" style="text-align:left;"> Name </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="name" id="name" value="<?php echo $user['nama'];?>" required>
				</div>
			</div>
			<div class="form-group">
				<label for="username" class="col-sm-2 control-label" style="text-align:left;"> Username </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="username" id="username" value="<?php echo $user['username'];?>" disabled>
				</div>
			</div>
			<div class="form-group">
				<label for="email" class="col-sm-2 control-label" style="text-align:left;"> Email </label>
				<div class="col-sm-10">
					<input type="email" class="form-control" name="email" id="email" value="<?php echo $user['email'];?>" required>
				</div>
			</div>
			<div class="form-group">
				<label for="placeofbirth" class="col-sm-2 control-label" style="text-align:left;"> Place of Birth </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="tempat_lahir" id="placeofbirth" value="<?php echo $user['tempat_lhr'];?>" required>
				</div>
			</div>
			<div class="form-group">
				<label for="dateofbirth" class="col-sm-2 control-label" style="text-align:left;"> Date of Birth </label>
				<div class="col-sm-10" id="tanggal_lahir">
					<div class="input-group date">
						<input type="text" class="form-control" name="tanggal" id="date_coba" value="<?php echo $user['tgl_lhr'];?>" onchange="return validate_add_lahir()" disabled required><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
						<input type="hidden" class="form-control" name="tanggal_lahir" id="dateofbirth" value="">
					</div>
				</div>
			</div> 
			<div class="form-group">
				<label for="uploadphoto" class="col-sm-2 control-label" style="text-align:left;"> Upload Photo </label>
				<div class="col-sm-10">
					<input type="file" class="filestyle primary" name="fil" id="upload-photo" accept="image/*">
					<p class="help-block">Silahkan foto profil Anda ke dalam sistem.</br>
						(Format file : jpg, jpeg, png | ukuran max 1024 x 768 pixel | max file_size : 2 MB)</br>
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-4" style="text-align:center;">
			<img id="image-profile" src="<?php if(empty($user['foto'])){
				echo 'assets/img/default.png';
			}else{
				echo 'profil_img/'.$user['foto'];
			}?>" alt="no_image" /><br>
		</div>
		<center><button type="submit" class="btn btn-default btn-md">Save
		</button></a>
		<a href="profile_super_admin.php"> <button type="button" class="btn btn-default btn-md">Cancel
		</button></a></center>
		</form>
	</div>
</div>
<?php include_once "footer.php"?>
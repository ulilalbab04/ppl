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
	include_once "pagination.php";
	
	if($_POST){
				$nama_foto=$_POST['name'];
				$komentar=$_POST['comment'];
				if($_FILES['file']['size'] > 0 && $_FILES['file']['error'] == 0){
					if ($_FILES["file"]["size"] > 10000000) {
						//echo "Sorry, your file is too large.";
						?>
							<script>
								alert("Upload photo gagal. harap sesuaikan ukuran gambar yang diperbolehkan!!! Ukuran maksimal foto 10 MB.");
								document.location.href="upload_photo_super_admin.php";
							</script>
							<?php				
					}else{
						$target_dir = "galeri/";
						$target_file = $target_dir . basename($_FILES["file"]["name"]);
						$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
						// Check if file already exists
						if (file_exists($target_file)) {
							//echo "Sorry, file already exists.";
							$uploadOk = 0;
							?>
							<script>
								alert("Upload photo gagal, foto telah tersedia");
								document.location.href="upload_photo_super_admin.php";
							</script>
							<?php
						}else{
						// Allow certain file formats
							if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG") {
								//echo "Sorry, only JPG, JPEG, & PNG files are allowed.";
								?>
								<script>
									alert("Upload photo gagal, harap sesuaikan format gambar yang diperbolehkan");
									document.location.href="upload_photo_super_admin.php";
								</script>
								<?php
							}else{
								//echo "Lolos.";
								$temp = explode(".",$_FILES["file"]["name"]);
								$newfilename = $nama_foto. '.' .end($temp);
								$move = move_uploaded_file($_FILES['file']['tmp_name'], "galeri/".$newfilename);
								if($move){
									$insert = "INSERT INTO file_foto(id_pengguna, nama_file, tgl_foto) VALUES('$cek_id_pengguna','$newfilename',now())";
								}
								mysql_query($insert) or die (mysql_error());
								$q_foto=mysql_query("SELECT * FROM file_foto WHERE id_pengguna='$cek_id_pengguna' AND nama_file='$newfilename'") or die (mysql_error()); 
								$f_foto=mysql_fetch_array($q_foto);
								$id_foto=$f_foto['id_foto'];
								$insert_komentar=mysql_query("INSERT INTO file_komentar(id_pengguna, id_foto, isi_komentar) VALUES('$cek_id_pengguna','$id_foto','$komentar')") ?>
								<script>
									alert("Upload photo berhasil");
									document.location.href="my_collection_photo_super_admin.php";
								</script>
							<?php
							}
						}
					} 
				}else{
				?>
					<script>
						alert("Upload photo gagal");
						document.location.href="upload_photo_super_admin.php";
					</script>
				<?php
				}
				exit;
			}

?>
<div class="row" id="content_event">
	<div class="container">
		<h1 align="center">Upload Photo</h1><br>
		<form class="form-horizontal" name="form1" id="uploadfoto"  action="" method="post" enctype="multipart/form-data" onsubmit="return validate_upload_foto()">
			<div class="col-md-6">
				<img id="image-upload" src="assets/img/default.png" alt="your_image">
				<center><input type="file" class="filestyle primary" name="file" id="upload-photo" accept="image/*"></center>
				<p class="help-block">Silahkan foto profil Anda ke dalam sistem.</br>
					(Format file : jpg, jpeg, png | ukuran max 1024 x 768 pixel | max file_size : 10 MB)</br>
				</p>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="photoName" class="col-sm-3 control-label" style="text-align:left;">Photo Name</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="name" id="photoName" placeholder="Photo Name" required>
					</div>
				</div>
				<div class="form-group">
					<label for="comment" class="col-sm-3 control-label" style="text-align:left;">Comment</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="comment" id="comment" placeholder="Comment" required>
					</div>
				</div>
				<div class="form-group" align="right">
				<div class="container-fluid">
					<button type="submit" name="submit" class="btn btn-primary">Upload</button>
				</div></div>
			</div>
		</form>
	</div>
</div>
<?php include_once "footer.php"?>
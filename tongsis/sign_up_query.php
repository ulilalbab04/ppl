<?php 
	include "koneksi.php";
	
	$username=$_POST['username'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$repassword=$_POST['repassword'];
	$nama=$_POST['name'];
	$tempat_lahir=$_POST['tempat_lahir'];
	$tanggal_lahir=$_POST['tanggal_lahir'];
	
	if($password==$repassword){
		if($_FILES['file']['size'] > 0 && $_FILES['file']['error'] == 0){
						$move = move_uploaded_file($_FILES['file']['tmp_name'], "profil_img/".$_FILES['file']['name']);
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
														) VALUES('$username,'$email','$password','$nama','$tempat_lahir','$tanggal_lahir','".$_FILES['file']['name']."','0')";
						}
					}
					mysql_query($insert) or die (mysql_error());
	?>
					<script>
						alert("Pendaftaran berhasil");
						document.location.href="index.indexphp";
					</script>
	<?php
	}else{
?>
		<script>
			alert("Password tidak sama");
			document.location.href="sign_up.php";
		</script>
<?php
		}
?>
	
				
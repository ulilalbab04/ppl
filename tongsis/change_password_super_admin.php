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
?>
<div class="row" id="content_about">
	<div class="container">
		<h1><center> PASSWORD </center></h1><br>
		<?php
			if($_POST){
				$q_cek_pass=mysql_query("SELECT * FROM file_pengguna WHERE id_pengguna='$cek_id_pengguna'") or die (mysql_error());
				$cek_pass=mysql_fetch_array($q_cek_pass);
				$password=md5($_POST['password']);
				$newpassword=md5($_POST['newpassword']);
				$repassword=md5($_POST['repassword']);
				if($password!=$cek_pass['password']){?>
					<script>
						alert("Current password yang anda masukkan salah, ulangi lagi!");
						document.location.href="change_password_super_admin.php";
					</script>
					<?php
					exit;
					}
				else if($newpassword!=$repassword){?>
					<script>
						alert("New password harus sama dengan Verify password!");
						document.location.href="change_password_super_admin.php";
					</script>
					<?php
					exit;
					}
				else if(($password==$cek_pass['password'])AND($newpassword==$repassword)){
					$update=mysql_query("UPDATE file_pengguna SET password='$newpassword' WHERE id_pengguna='$cek_id_pengguna'") or die (mysql_error());
					?>
					<script>
						alert("Password anda telah berhasil diubah");
						document.location.href="change_password_super_admin.php";
					</script>
					<?php
					exit;
					}
				
				};
					?>
					<form id="enableForm" class="form-horizontal" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
					<div class="col-md-8" style="text-align:left;">
						<div class="form-group">
							<label for="password" class="col-sm-3 control-label" style="text-align:left;"> Current Password </label>
							<div class="col-sm-9">
								<input type="password" class="form-control" name="password" id="password" placeholder="Password" data-fv-notempty>
							</div>
						</div>
						<div class="form-group">
							<label for="newpassword" class="col-sm-3 control-label" style="text-align:left;"> New Password </label>
							<div class="col-sm-9">
								<input type="password" class="form-control" name="newpassword" id="newpassword" placeholder="New Password" required data-fv-notempty>
							</div>
						</div>
						<div class="form-group">
							<label for="repassword" class="col-sm-3 control-label" style="text-align:left;"> Verify Password </label>
							<div class="col-sm-9">
								<input type="password" class="form-control" name="repassword" id="repassword" placeholder="Re-type Password" required data-fv-notempty>
							</div>
						</div>
					</div>
					<div class="col-md-4" style="text-align:center; padding-top:300px;">
						<button type="submit" class="btn btn-default btn-md">Save Changes</button>
					</div>
					</form>
	</div>
</div>
<?php include_once "footer.php"?>
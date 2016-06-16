<?php 
	session_start();
	$cek_id_pengguna=$_SESSION['id_pengguna'];
	$cek_level=$_SESSION['level'];
	
	if (!(isset($cek_id_pengguna)) or !isset($cek_level) or $cek_level==3){
			session_destroy();
?>		<script>
			document.location.href="index.php";
		</script>
<?php 	
		}
	include "koneksi.php";
	include_once "head.php"; 
	include_once "header.php"; 
	if ($_SESSION['level']==1){ include_once "menu_super_admin.php"; };
	if ($_SESSION['level']==2){ include_once "menu_admin.php"; };
	include_once "pagination.php";
?>
<div class="row" id="content_event">
	<div class="container">
		<h1 align="center">Add New Event</h1><br>
		<form class="form-horizontal" action="add_event.php?id=<?php echo $cek_id_pengguna;?>" method="post" id="defaultAddEvent" onsubmit="return validate_add_new_event()" data-toggle="validator">
			<div class="form-group">
				<label for="eventName" class="col-sm-2 control-label" style="text-align:left;">Event Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="name" id="eventName" placeholder="Event Name" required>
				</div>
			</div>
			<div class="form-group">
				<label for="tanggal" class="col-sm-2 control-label" style="text-align:left;">Date</label>
				<div class="col-sm-10" id="tanggal_event">
					<input type="hidden" class="form-control" name="tanggal_sekarang" id="tanggal_sekarang" value="<?php echo date('m/d/Y'); ?>">
					<input type="hidden" class="form-control" name="tahun_sekarang" id="tahun_sekarang" value="<?php echo date('Y'); ?>">
					<div class="input-group date">
						<input type="text" class="form-control" name="date" id="date" placeholder="Date" pattern='^([0-9/]){10,}$' maxlength='10' data-error='Silahkan dengan format tanggal yang sesuai (tanggal/bulan/tahun)'  onchange="return validate_add_tgl_event()" required><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
					</div>
					<div class="help-block with-errors"></div>
				</div>
			</div>
			<div class="form-group">
				<label for="description" class="col-sm-2 control-label" style="text-align:left;">Description</label>
				<div class="col-sm-10">
					<textarea class="form-control" rows="3" name="desc" id="description" placeholder="Description" required></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary">Save</button>
					<a href="event_super_admin.php" class="btn btn-md btn-danger" role="button"> Cancel </a>
				</div>
			</div>
		</form>
	</div>
</div>
<?php include_once "footer.php"?>
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
	$id = $_GET['id'];
	$hasil = mysql_query("SELECT * FROM file_foto WHERE id_foto='$id'");
	if(empty($hasil)){
		echo "Collection photo tidak tersedia.";
	}else{
		while ($Foto = mysql_fetch_array($hasil)) {
?>
<div class="row" id="content_collection_member">
	<div class="container-fluid">
		<div class="col-md-6" style="padding-top: 70px;">
			<img src="galeri/<?php echo $Foto['nama_file'];?>" alt="Foto <?php echo $Foto['nama_file'];?>" style="height: 400px; width:100%;">
		</div>		
		<div class="col-md-6" style="padding-top: 70px;">
			<p class="bg-primary text-center" style="font-size: 30px;"> 
				<?php $namafile= substr($Foto[2],0,-4); echo $namafile;?> 
			</p>
			<!-- 4:3 aspect ratio -->
			<div class="embed-responsive embed-responsive-4by3" style="padding-bottom: 29%;">
				<iframe class="embed-responsive-item" src="comment_box_super_admin.php?id=<?php echo $id; ?>"></iframe>
			</div>
			<form class="form-horizontal" action="add_comment_collection_photo.php?id=<?php echo $id;?>" method="post">
			<div class="container-fluid">
				<div class="form-group">
					<textarea class="form-control" rows="3" id="comment" name="add_comment" placeholder="Comment"></textarea>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-default pull-right"> Submit </button>
				</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php }} ?>
<?php include_once "footer.php"?>
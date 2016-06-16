<?php 
	session_start();
	$cek_id_pengguna=$_SESSION['id_pengguna'];
	$cek_level=$_SESSION['level'];
	
	if (!(isset($cek_id_pengguna)) or $cek_level!=3){
			session_destroy();
?>		<script>
			document.location.href="index.php";
		</script>
<?php 	
		}
	include "koneksi.php";
	include_once "head.php"; 
	include_once "header.php"; 
	include_once "menu_member.php"; 
	include_once "pagination.php";
?>
<div class="row" id="content_home">
	<div class="container-fluid">
		<div class="col-md-7">
			<div class="container-fluid" id="greeting">
				<h1 class="text-center"> SELAMAT DATANG DI KOMUNITAS PHOTOGRAPHY SEMARANG </h1><br>	
				<!-- Carousel ================================================== -->
				<div class="carousel">
					<div id="myCarousel" class="carousel slide" data-ride="carousel">
						<!-- Indicators -->
						<ol class="carousel-indicators">
							<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
							<li data-target="#myCarousel" data-slide-to="1"></li>
							<li data-target="#myCarousel" data-slide-to="2"></li>
						</ol>
						<div class="carousel-inner" role="listbox">
							<div class="item active">
								<img src="img/pegunungan.jpg" alt="slide1" style="height: 300px; width:100%;">
								<div class="container-fluid">
									<div class="carousel-caption">
										<h1>Pegunungan</h1>
										<p class="lead">Pemandangan Pegunungan </p>
									</div>
								</div>
							</div>
							<div class="item">
								<img src="img/hutan.jpg" alt="slide2" style="height: 300px; width:100%;">
								<div class="container">
									<div class="carousel-caption">
										<h1>Hutan</h1>
										<p class="lead">Pemandangan Hutan </p>
									</div>
								</div>
							</div>
							<div class="item">
								<img src="img/pegunungan 2.jpg" alt="slide3" style="height: 300px; width:100%;">
								<div class="container">
									<div class="carousel-caption">
										<h1>Pegunungan.</h1>
										<p class="lead">Pemandangan Pegunungan </p>
									</div>
								</div>
							</div>
						</div>
						<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
			</div><!-- /.carousel -->
		</div>
		<div class="col-md-1">
			<div class="batas">
				<canvas id="batas"></canvas>
			</div>
		</div>
		<div class="col-md-4">
			<div class="daftarevent" style="padding-top: 7%;">
				<div class="embed-responsive embed-responsive-4by3" id="daftarevent" style="height:450px;">
					<iframe src="event_home.php" style="border:none"></iframe>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include_once "footer.php"?>
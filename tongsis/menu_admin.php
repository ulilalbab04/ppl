<div class="menu">
	<nav class="navbar navbar-inverse" id="menu_home" role="navigation">	
		<!-- Brand and toggle get grouped for better mobile display--> 
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<small class="navbar-brand"></small>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right" style="font-size: 18px;">
				<li><a href="index_admin.php"> HOME <span class="sr-only">(current)</span></a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> GALLERY <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu" style="font-size: 18px;">
						<li><a href="my_collection_photo_admin.php"> My Collection </a></li>
						<li><a href="collection_photo_admin.php"> Collection </a></li>
						<li><a href="upload_photo_admin.php"> Upload Photo </a></li>
						<li><a href="event_admin.php"> Event </a></li>
					</ul>
				</li>
				<li><a href="about_admin.php"> ABOUT </a></li>
				<li class="dropdown">	
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">ADMIN<strong><!--<?php echo $username; ?>--></strong><span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">				
						<li><a href="profile_admin.php"> Profile </a></li>
						<li><a href="change_password_admin.php"> Change Password </a></li>
						<li><a href="logout_admin.php"> Logout </a></li>
					</ul>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</nav>
</div>
<?php 
	include "koneksi.php";
	
	$username=$_POST['username'];
	$sql = mysql_query("SELECT * FROM file_pengguna where username = '$username'");
	$cocok = mysql_num_rows($sql);
	
	echo $cocok;
?>
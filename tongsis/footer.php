			<!-- Footer
			================================================== -->
			<footer class="bs-docs-footer" role="contentinfo">
			  <div class="container">
					<p class="navbar-text">
						<h4 align="center" id="footer">
							Design By Informatics Undip<a href="#" class="navbar-link"></a>
						</h4>
					</p>
			  </div>
			</footer>
		</div>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="assets/js/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/bootstrap-datepicker.js"></script>
		<script src="assets/js/validator/bootstrapValidator.js"></script>
		<script src="assets/js/validator/id_ID.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.id.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#username").change(function(){ 
					$('#pesan').html("<img src='assets/img/loader.gif' /> cek username ...");	
					var username  = $("#username").val(); 
					
					$.ajax({
					 type:"POST",
					 url:"username_validasi.php",    
					 data: "username=" + username,
					 success: function(data){                 
					   if(data==0){
						  $("#pesan").html('<img src="assets/img/tick.png"> Username belum digunakan ...');
							$('#username').css('border', '3px #090 solid');	
					   }  
					   else{
						  $("#pesan").html('<img src="assets/img/cross.png"> Username telah digunakan ...');       
							$('#username').css('border', '3px #C33 solid');	
					   }
					 }
					}); 
				})
			});
			
			$('#tanggal_event .input-group.date').datepicker({
				format: 'mm/dd/yyyy',
				startDate: "+0d",
				todayBtn: true,
				language: 'id',
				todayHighlight: true,
				autoclose: true
			});
			
			$('#tanggal_lahir .input-group.date').datepicker({
				format: 'yyyy-mm-dd',
				todayBtn: true,
				language: 'id',
				todayHighlight: true,
				autoclose: true
			});
			
			$('#tanggal_lahir_member .input-group.date').datepicker({
				format: 'mm/dd/yyyy',
				endDate: "+0d",
				todayBtn: true,
				language: 'id',
				todayHighlight: true,
				autoclose: true
			});
			
			$(document).on("click", ".open-ProfilDialog", function () {
				var nama = $(this).data('id2');
				var username = $(this).data('id3');
				var email = $(this).data('id4');
				var tempat_lhr = $(this).data('id5');
				var tgl_lhr = $(this).data('id6');
				var foto = $(this).data('id1');  
				if(foto==0){
					$(".modal-body #fotoprofil").attr("src", "assets/img/default.png");
				}else{
					$(".modal-body #fotoprofil").attr("src", "profil_img/"+foto+"");
				}
				$(".modal-body #name").val( nama );
				$(".modal-body #username").val( username );
				$(".modal-body #email").val( email );
				$(".modal-body #placeofbirth").val( tempat_lhr );
				$(".modal-body #dateofbirth").val( tgl_lhr );
			});
			
			function validate_add_tgl_event(){
				valid = true;
				
				var date = document.getElementById("date").value ;
				var tanggal_sekarang = document.getElementById("tanggal_sekarang").value ;
				if(date < tanggal_sekarang){
					// your validation error action
					alert("Date should be over now!!!");
					$("#tanggal_event #date").val( '' );
					valid = false;
				}
				return valid //true or false
			}
			
			function validate_add_lahir(){
				valid = true;
				
				var date = document.getElementById("date_coba").value ;
				$("#tanggal_lahir #dateofbirth").val( date );
					
				return valid //true or false
			}
			
			function validate_add_new_event(){
				valid = true;
				var date = document.getElementById("date").value ;
				var tahun_sekarang = document.getElementById("tahun_sekarang").value ;
				var date_tahun = date.substr(6,4);
				if(date_tahun < tahun_sekarang){
					// your validation error action
					alert("Date should be over now!!!");
					$("#tanggal_event #date").val( '' );
					valid = false;
				}
				
				return valid //true or false
			}
			
			function validate_pendaftaran_tgl_lahir(){
				valid = true;
				
				var date = document.getElementById("date_coba").value ;
				$("#tanggal_lahir #dateofbirth").val( date );
				
				return valid //true or false
			}
			
			function validate_upload_foto(){
				valid = true;
				
				if($("#upload-photo").val() == ''){
					// your validation error action
					alert("You forgot to attach file photo!!! \nPlease attach a file photo.");
					valid = false;

				}
				return valid //true or false
			}
			
			function validate_sign_up(){
				valid = true;
				
				if($("#dateofbirth").val() == ''){
					// your validation error action
					alert("You forgot to give your date of birth!!! ");
					valid = false;

				}
				
				if($("#upload-image").val() == ''){
					// your validation error action
					alert("You forgot to attach file photo!!! \nPlease attach a file photo.");
					valid = false;

				}
				return valid //true or false
			}
			
			function UploadPhoto(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = function (e) {
						$('#image-upload').attr('src', e.target.result);
					}
					reader.readAsDataURL(input.files[0]);
				}
			}

			$(document).ready(function() {
				$("#upload-photo").change(function(){
					UploadPhoto(this);
				});
			});
			
			function EditProfile(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = function (e) {
						$('#image-profile').attr('src', e.target.result);
					}
					reader.readAsDataURL(input.files[0]);
				}
			}

			$(document).ready(function() {
				$("#upload-photo").change(function(){
					EditProfile(this);
				});
			});
			
			function SignUp(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = function (e) {
						$('#image-preview').attr('src', e.target.result);
					}
					reader.readAsDataURL(input.files[0]);
				}
			}

			$(document).ready(function() {
				$("#upload-image").change(function(){
					SignUp(this);
				});
			});
		</script>
	</body>
</html>
<?php

require_once("config.php");

if(isset($_POST['register'])){

    // filter data yang diinputkan
    $Name = filter_input(INPUT_POST, 'Nama_Lengkap', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'Alamat_Email', FILTER_VALIDATE_EMAIL);
    $No_Hp = filter_input(INPUT_POST, 'No_Handphone', FILTER_SANITIZE_STRING);
    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
   


    // menyiapkan query
    INSERT INTO `buat_akun`(`Nama_Lengkap`, `Alamat_Email`, `No_Handphone`, `Password`)
    $sql = "INSERT INTO buat_akun(`Nama_Lengkap`, `Alamat_Email`, `No_Handphone`, `Password`)
            VALUES (:name,:email,:no_hp, :password)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":Nama_Lengkap" => $Name,
        ":Alamat_Email" => $Email,
        ":No_Handphone" => $No_Hp,
        ":Password" => $Password,
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($saved) header("Location: login.html");
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Easy Mobile Service</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-select.css">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<link href='//fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="js/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-select.js"></script>
<script>
  $(document).ready(function () {
    var mySelect = $('#first-disabled2');

    $('#special').on('click', function () {
      mySelect.find('option:selected').prop('disabled', true);
      mySelect.selectpicker('refresh');
    });

    $('#special2').on('click', function () {
      mySelect.find('option:disabled').prop('disabled', false);
      mySelect.selectpicker('refresh');
    });

    $('#basic2').selectpicker({
      liveSearch: true,
      maxOptions: 1
    });
  });
</script>
<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
<link href="css/jquery.uls.css" rel="stylesheet"/>
<link href="css/jquery.uls.grid.css" rel="stylesheet"/>
<link href="css/jquery.uls.lcd.css" rel="stylesheet"/>

<script src="js/jquery.uls.data.js"></script>
<script src="js/jquery.uls.data.utils.js"></script>
<script src="js/jquery.uls.lcd.js"></script>
<script src="js/jquery.uls.languagefilter.js"></script>
<script src="js/jquery.uls.regionfilter.js"></script>
<script src="js/jquery.uls.core.js"></script>
<script>
			$( document ).ready( function() {
				$( '.uls-trigger' ).uls( {
					onSelect : function( language ) {
						var languageName = $.uls.data.getAutonym( language );
						$( '.uls-trigger' ).text( languageName );
					},
					quickList: ['en', 'hi', 'he', 'ml', 'ta', 'fr'] //FIXME
				} );
			} );
		</script>
</head>
<body>
<div class="header">
		<div class="container">
			<div class="logo">
				<a href="index.html"><span>Easy</span>Mobile Service</a>
			</div>
			<div class="header-right">
			<a class="account" href="login.html">Akun</a>
			

			<div class="selectregion">
				
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
					aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
										&times;</button>
							</div>
						</div>
					</div>
				<script>
				$('#myModal').modal('');
				</script>
			</div>
		</div>
		</div>
	</div>
	 <section>
			<div id="page-wrapper" class="sign-in-wrapper">
				<div class="graphs">
					<div class="sign-up">
						<h1>Membuat Akun</h1>
						<p class="creating">Dengan mendaftar akun, Nikmatilah kemudahan-kemudahan untuk mendapatkan solusi pada setiap permasalahan handphone anda.</p>
						<h2>Data Diri Pribadi</h2>
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Nama Lengkap </h4>
							</div>
							<div class="sign-up2">
								<form>
									<input type="text" placeholder=" " required=" "/>
								</form>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Alamat Email </h4>
							</div>
							<div class="sign-up2">
								<form>
									<input type="text" placeholder=" " required=" "/>
								</form>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="sign-u">
							<div class="sign-up1">
								<h4>No Handphone</h4>
							</div>
							<div class="sign-up2">
								<form>
									<input type="password" placeholder=" " required=" "/>
								</form>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Password </h4>
							</div>
							<div class="sign-up2">
								<form>
									<input type="password" placeholder=" " required=" "/>
								</form>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="sub_home">
							<div class="sub_home_left">
								<form>
									<input type="submit" value="Buat">
								</form>
							</div>
							<div class="sub_home_right">
								<p>Kembali <a href="index.html">Beranda</a></p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>
	
			<footer class="diff">
			   <p class="text-center">&Easy Mobile Service | Design by <a href="https://www.instagram.com/errsek/" target="_blank">Ery Setiawan.</a></p>
			</footer>
      
	</section>
</body>
</html>
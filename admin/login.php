<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Admin Panel | INSTAGRAM</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/vendor/icon-sets.css">
	<link rel="stylesheet" href="assets/css/main.min.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="shortcut icon" href="..\img\instagram.ico" type="image/x-icon" />
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box">
					<div class="left" style="box-shadow: 0 0 2px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
						<div class="content col-xs-12" style="margin-top:100px;">
							<div class="logo text-center"><img src="../img/instagram_logo.png" alt="Instagram Logo"></div>
							
							<form class="form-auth-small" action="giris.php" method="POST">
								<div class="form-group">
									<input type="text" class="form-control" id="signup-email" name="kadi" placeholder="Kullanıcı Adı" value="Ender İMEN" required="required">
								</div>
								<div class="form-group">
									<input type="password" class="form-control" id="signup-password" name="sifre" placeholder="Şifre" required="required">
									<?php 
										if (isset($_GET['durum'])) {
											if ($_GET['durum']==-1) {
												echo '<h4 style="color:red">Giriş Başarısız!</h4>';	
											}
										}
									 ?>
								</div>
								<input type="submit" class="btn btn-info col-md-12" name="girisyap" value="Giriş Yap">
							</form>
						</div>
					</div>
					<div class="right content" style="box-shadow: 0 0 2px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">Instagram | Yönetim Paneline Hoşgeldiniz</h1>
							<p>Karadeniz Teknik Üniversitesi Yazılım Mühendisligi</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>

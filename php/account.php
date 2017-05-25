<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Instagram-Kayıt Ol</title>
<link rel="stylesheet" type="text/css" href="..\css\account.css">
<link rel="stylesheet" type="text/css" href="..\css\footer.css">
<link rel="shortcut icon" href="..\img\instagram.ico" type="image/x-icon" />
</head>
<body>
	<!--Content-->
	<div id="content">
		<!--Left_Content-->
		<div id="left-content">
			<img src="..\img\phone_img.png" alt=""/>
		</div>
		<!--Right-Content-->
		
		<div id="right-content">
			<form name="login_form" method="POST" action="islem.php">
			<table id="table_design" border="0">
				<tr>
					<td><center><img src="..\img\instagram_logo.png" alt=""/></center></td>
				</tr>
				<tr>
					<td><center style="font-family: 'Roboto Condensed', sans-serif;Color:#CCCCCC;font-weight:bold;">Arkadaşlarının fotoğraf ve videolarını görmek için kaydol.</center></td>
				</tr>
				<tr>
					<td><hr style="width:100px;float:left;"><hr style="width:100px;float:right;"></td>
				</tr>
				<tr>
					<td><center><input style="width:80%;height:30px;" type="email" name="email" placeholder="E-posta" required></center></td>
				</tr>
				<tr>
					<td><center><input style="width:80%;height:30px;" type="text" name="fullname" placeholder="Tam Adınız" required></td>
				</tr>
				<tr>
					<td><center><input style="width:80%;height:30px;" type="text" name="username" placeholder="Kullanıcı Adı" required></td>
				</tr>
				<tr>
					<td><center><input style="width:80%;height:30px;" type="password" name="password" placeholder="Şifre" required></td>
				</tr>
				<tr>
					<td><center><input style="width:80%;height:30px;background-color:#228CD8;border-radius:4px;Color:white;" type="submit" name="btn_register" Value="Kayıt Ol"></td>
				</tr>
			</table>		
			</form>
		</div>
		<!--Right-Content-Login-->
		<div id="right-content-login">
		<p><center style="font-family:'Roboto Condensed', sans-serif;">Hesabın var mı?  <a href="account_signup.php" style="text-decoration:none;">Giriş yap</a></center></p>
		</div>	
	</div>	
</body>
</html>

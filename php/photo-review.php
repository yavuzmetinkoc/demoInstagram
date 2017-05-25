<?php include 'config.php';
	$resimID=$_GET['id'];
	$sorgu=mysqli_query($connection,"SELECT * FROM paylasimlar left JOIN yorumlar on yorumlar.resimID=paylasimlar.sID  JOIN kullanicilar on kullanicilar.id=paylasimlar.kullaniciID WHERE paylasimlar.sID='$resimID'")or die(mysqli_error($connection));
	/*Gerekli olan tabloları birleştirdik.*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Fotoğraflar</title>
	
	<link rel="stylesheet" type="text/css" href="..\css\photo-review.css">
	<script type="text/javascript" src="../js/jquery-3.2.0.min.js"></script>
    <script type="text/javascript" src="../js/upSlide.js"></script>
	<script type="text/javascript" src="../js/photo-gallery.js"></script>
</head>
<body>

<?php 
while($kayit=mysqli_fetch_array($sorgu)){

$begeni_cek=mysqli_query($connection,"SELECT COUNT(*) AS toplambegeni FROM begeniler WHERE sID='".$kayit['sID']."'");
$begeni_sayisi=mysqli_fetch_array($begeni_cek);
?>
		<div class="black-opacity">
			<input type="button"  id="btn-close" value="X" onclick="kapat()">
			<div class="photo-container-detail">
				
				<div class="photo">
					<img src="<?php echo $kayit['sYol'] ?>" alt="">
				</div>
				 
				<div class="user-info">
					<div id="profil-photo"><img src="<?php echo $kayit['Presim'] ?>" alt=""></div>
					<div id="username"><p><?php echo $kayit['fullname'] ?></p><p><?php echo $kayit['sKonum'] ?></p><p><?php echo $kayit['sTarih'] ?></p></div>
				</div>

				<div id="photo-state">&nbsp;&nbsp;&nbsp; <?php echo $kayit['aciklama'] ?></div>
				<?php 
					if ($begeni_sayisi['toplambegeni']==0) {}
					else{echo '<div id="photo-like"><b>'.$begeni_sayisi['toplambegeni']." Beğeni".'</b></div>';}
				 ?>
				<div id="photo-comment">
					<h4>Yorumlar</h4>
					<hr>
					<div class="comment-made">						
						<?php 
						$yorum_cek_sorgu=mysqli_query($connection,"SELECT * FROM yorumlar WHERE resimID='".$kayit['sID']."'");
						while ($cek=mysqli_fetch_array($yorum_cek_sorgu)) { ?>
							<b>&nbsp;&nbsp; <?php echo $cek['yorum_yapan']."</b>"." ".$cek['yorum']."<br/><br/>" ?>
						<?php } ?>
					</div>		
	 				<form action="islem.php" method="POST">
						<div class="comment"><!--yorum heigth düzenlenecek-->
	 						<input type="hidden" value="<?php echo $kayit['sID'] ?>" name="resimID">
							<input type="text" id="comment-text" placeholder="Yorum yaz..." name="comment">
							<input type="submit" value="Gönder" id="comment-send" name="yaz">
						</div>
	 				</form>
				</div>

			</div>
		 </div>

		 <!--Resim kapanınca kullanıcın resminin açılamsı için-->
		 	<script type="text/javascript">
				function kapat(){
				window.location.href ="profil.php?id=<?php echo $kayit['id'] ?>";
			}
			</script>
<?php } ?>
	
</body>
</html>
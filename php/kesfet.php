<?php include "config.php"; include "header.php" ?>
	
	<div class="discover-title-bar"><center>Kişi Keşfet</center></div>
	<?php
  /*  $sorgu=mysqli_query($connection,"SELECT * FROM paylasimlar INNER JOIN kullanicilar ON kullanicilar.id=paylasimlar.kullaniciID") OR die(mysqli_error($connection));*/
    //iç içe while yapacağız

	$sorgu=mysqli_query($connection,"SELECT DISTINCT kullanicilar.id,kullanicilar.username,kullanicilar.fullname,kullanicilar.Presim From kullanicilar  WHERE kullanicilar.id!='".$_SESSION["id"]."'")OR die(mysqli_error($connection));

	while ($kayit=mysqli_fetch_array($sorgu)) {

		$sorgu2=mysqli_query($connection,"SELECT sYol FROM paylasimlar WHERE kullaniciID=".$kayit["id"]." LIMIT 3");
		?>	
			<div class="discover-container">
				<div class="discover-tab-bar">
					<div class="discover-profil-photo">
					<img src="<?php echo $kayit['Presim'] ?>" alt="" style="border-radius:80px;width:44px;height:44px;background-size:cover; background-position:center;""></div>
					<div class="discover-username" title="Profilini Gör">
						<a href="profil.php?id=<?php echo $kayit["id"] ?>" class="name"><?php echo $kayit['username'] ?></a><br><?php echo $kayit['fullname'] ?>
					</div>

					<form action="islem.php" method="POST">
						<input type="hidden" name="kullaniciID" value="<?php echo $kayit["id"] ?>">	
						<input type="hidden" name="kullanici_adi" value="<?php echo $kayit["username"] ?>">	
						<div class="btn-follow-div">
							<input type="submit" class="btn" name="takip_et" value="Takip Et">
						</div>
					</form>
		</div>

		<!--Kullanıcı resimleri-->

		<?php
		while ($kayit2=mysqli_fetch_array($sorgu2)) { ?>
			
			<div class="discover-picture"><img style="height: 190px;width: 183px;" src="<?php echo $kayit2['sYol'] ?>" alt=""></div>
	
		<?php } ?>

		</div>
		</div>
	<?php } ?>

	<!--Yukarı çık tuşu-->
	<a href="#" class="up">
        <img src="../img/up.png" style="width: 40px;height: 40px;" alt="" title="Yukarı Çık">
    </a>
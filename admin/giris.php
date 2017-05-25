<?php 
if (isset($_POST['girisyap'])) {

		$kullanici_adi=$_POST['kadi'];
		$sifre=$_POST['sifre'];

		if ($kullanici_adi=="Ender İMEN" && $sifre=="1") {
			header("Location:index.php");	
		}
		else{
			header("Location:login.php?durum=-1");
		}
	}
	else{
		header("Location:login.php");
	}
?>

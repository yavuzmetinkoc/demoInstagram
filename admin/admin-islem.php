<?php include '../php/config.php';

	//Kullanıcı bilgilerini Güncelleme

	if (isset($_POST['btn-kullanici-duzenle'])) {
		
		$id=$_POST['id'];
		$username=$_POST['username'];
		$fullname=$_POST['fullname'];
		$email=$_POST['email'];
		$pBiyografi=$_POST['pBiyografi'];
		$durum=$_POST['durum'];
		$yeni_ad="";

		if ($_FILES["resim"]["size"]<1024*1024*1024*1024) {

			if ($_FILES["resim"]["type"]=="image/jpeg" || $_FILES["resim"]["type"]=="image/png" || $_FILES["resim"]["type"]=="image/gif"){
					$dos_adi=$_FILES["resim"]["name"];	//Dosyaya yeni bir isim oluşturduk
		            $uzanti=substr($dos_adi,-4,4);
		            $uret=array("as","rt","ty","yu","fg");
		            $sayi_tut=rand(1,10000);
		            $yeni_ad="../Share/photo".$uret[rand(0,4)].$sayi_tut.$uzanti;
		            
		            if (move_uploaded_file($_FILES["resim"]["tmp_name"],$yeni_ad)){
		            	echo "Dosya Taşındı.";
	            }
	    	}
	    }
	    $guncelle=mysqli_query($connection,"UPDATE kullanicilar SET username='$username',fullname='$fullname',email='$email',Presim='$yeni_ad',pBiyografi='$pBiyografi',durum='$durum' WHERE id='$id'")or die(mysqli_error($connection));

					if ($guncelle) {
						header("Location:kullanici-duzenle.php?id=".$id."");
					}else{
						header("Location:kullanici-duzenle.php?id=".$id."");
					}
	}

	//Kullanıcıyı Sil

	if (isset($_POST['btn-kullanici-sil'])) {
		
		$id=$_POST['id'];
		$username=$_POST['username'];
		$fullname=$_POST['fullname'];
		$email=$_POST['email'];
		$pBiyografi=$_POST['pBiyografi'];
		$durum=$_POST['durum'];

		echo '<script>
				alert("Dikkat! Kişinin tüm bilgileri silinecektir.");
			</script>';

		$kullanici_sil=mysqli_query($connection,"DELETE FROM kullanicilar WHERE id='$id'");

		if ($kullanici_sil) {
			echo "Kişi silindi";
			header("Location:index.php");
		}else{
			echo "Kişi silinmedi";
			header("Location:takipci-duzenle.php?id=".$takipci_id."");
		}

	}	

	//Paylaşım bilgilerini güncelleme

	if (isset($_POST['btn-paylasim-duzenle'])) {
		
		$sID=$_POST['sID'];
		$kullaniciID=$_POST['kullaniciID'];
		$sTarih=$_POST['sTarih'];
		$sKonum=$_POST['sKonum'];
		$aciklama=$_POST['aciklama'];
		
		if ($_FILES["resim"]["size"]<1024*1024*1024*1024) {

			if ($_FILES["resim"]["type"]=="image/jpeg"){
					$dos_adi=$_FILES["resim"]["name"];	//Dosyaya yeni bir isim oluşturduk
		            $uzanti=substr($dos_adi,-4,4);
		            $uret=array("as","rt","ty","yu","fg");
		            $sayi_tut=rand(1,10000);
		            $yeni_ad="../Share/photo".$uret[rand(0,4)].$sayi_tut.$uzanti;
		            
		            if (move_uploaded_file($_FILES["resim"]["tmp_name"],$yeni_ad)){
		            	echo "Dosya Taşındı.";
	            
		            $paylasim_guncelle=mysqli_query($connection,"UPDATE paylasimlar SET sID='$sID',kullaniciID='$kullaniciID',sTarih='$sTarih',sKonum='$sKonum',sYol='$yeni_ad',aciklama='$aciklama' WHERE sID='$sID'")or die(mysqli_error($connection));
		            echo '<script>
							alert("Paylaşım bilgileri güncellendi");
						 </script>';
					if ($paylasim_guncelle) {
						header("Location:kullanici-duzenle.php?id=".$kullaniciID."");
					}else{
						header("Location:kullanici-duzenle.php?id=".$kullaniciID."");
					}
	            }
	    	}
	    }
	}


	//Paylaşımı Sil

	if (isset($_POST['btn-paylasim-sil'])) {
		
		$sID=$_POST['sID'];
		$kullaniciID=$_POST['kullaniciID'];
		$sTarih=$_POST['sTarih'];
		$sKonum=$_POST['sKonum'];
		$sYol=$_POST['resim'];
		$aciklama=$_POST['aciklama'];

		echo '<script>
				alert("Dikkat! Kişinin Bu Paylaşımı Silinecektir.");
			</script>';

		$paylasim_sil=mysqli_query($connection,"DELETE FROM paylasimlar WHERE sID='$sID'");

		if ($paylasim_sil) {
			echo "paylasim silindi";
			//header("Location:paylasim-duzenle.php?id=".$."");
		}else{
			echo "paylasim silinmedi";
			//header("Location:paylasim-duzenle.php?id=".$."");
		}
	}	


	//Yorum Düzenle

	if (isset($_POST['yorum-duzenle'])) {

		$yorumID=$_POST['yorumID'];
		$resimID=$_POST['resimID'];
		$kullaniciID=$_POST['kullaniciID'];
		$yorum_yapan=$_POST['yorum_yapan'];
		$yapilan_yorum=$_POST['yapilan_yorum'];

		$yorum_guncelle=mysqli_query($connection,"UPDATE yorumlar SET yorumID='$yorumID',resimID='$resimID',kullaniciID='$kullaniciID',yorum_yapan='$yorum_yapan',yorum='$yapilan_yorum' WHERE yorumID='$yorumID'");
		
		if ($yorum_guncelle) {
			header("Location:yorum-duzenle.php?id=".$yorumID."");
		}else{
			header("Location:yorum-duzenle.php?id=".$yorumID."");
		}
	}


	if (isset($_POST['btn-yorum-sil'])) {
		
		$yorumID=$_POST['yorumID'];
		$resimID=$_POST['resimID'];
		$kullaniciID=$_POST['kullaniciID'];
		$yorum_yapan=$_POST['yorum_yapan'];
		$yapilan_yorum=$_POST['yapilan_yorum'];

		echo '<script>
				alert("Dikkat! Kişinin Bu Yorumu Silinecektir.");
			</script>';

		$yorum_sil=mysqli_query($connection,"DELETE FROM yorumlar WHERE resimID='$resimID'");

		if ($yorum_sil) {
			echo "Yorum silindi";
			header("Location:yorumlar.php");
		}else{
			echo "Yorum silinmedi";
			header("Location:yorumlar.php");
		}
	}	


	//Takipçileri Düzenle

	if (isset($_POST['takipci-duzenle'])) {
		
		$takipci_id=$_POST['takipci_id'];
		$takipci_adi=$_POST['takipci_adi'];
		$takip_edilen_id=$_POST['takip_edilen_id'];		
		$takip_edilen_kisi=$_POST['takip_edilen_kisi'];

		$takipci_guncelle=mysqli_query($connection,"UPDATE takipciler SET takipci_id='$takipci_id',takipci_adi='$takipci_adi',takip_edilen_id='$takip_edilen_id',takip_edilen_kisi='$takip_edilen_kisi' WHERE takipci_id='$takipci_id' AND takip_edilen_id='$takip_edilen_id'");

		if ($takipci_guncelle) {
			header("Location:takipci-duzenle.php?id=".$takipci_id."");
		}else{
			header("Location:takipci-duzenle.php?id=".$takipci_id."");
		}
	}

	//Takipçi sil

	if (isset($_POST['btn-takipci-sil'])) {
		
		$takipci_id=$_POST['takipci_id'];
		$takipci_adi=$_POST['takipci_adi'];
		$takip_edilen_id=$_POST['takip_edilen_id'];		
		$takip_edilen_kisi=$_POST['takip_edilen_kisi'];

		echo '<script>
				alert("Dikkat! Kişinin Bu Yorumu Silinecektir.");
			</script>';
		
		$takipci_sil=mysqli_query($connection,"DELETE FROM takipciler WHERE takipci_id='$takipci_id' AND takip_edilen_id='$takip_edilen_id'");

		if ($takipci_sil) {
			echo "takipçi silindi";
			header("Location:takipciler.php");
		}else{
			echo "takipçi silinmedi";
			header("Location:takipci-duzenle.php?id=".$takipci_id."");
		}

	}	






















 ?>
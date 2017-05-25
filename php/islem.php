<?php require_once("config.php"); 

		if (isset($_POST['btn_register'])) {
			
		$username=trim($_POST["username"]);
		$fullname=trim($_POST["fullname"]);
		$email=trim($_POST["email"]);
		$password=trim(md5($_POST["password"]));
		
		
	
			$sql=mysqli_query($connection,"SELECT * FROM kullanicilar WHERE username='$username' or email='$email'");
			if(mysqli_num_rows($sql)>0)
			{
				echo '<script language="javascript">;
						alert("Kullanıcı adı yada email zaten kullanılmakta");  
					 </script>';
			}
			else
			{
				//Kullanıcı kayıt olduğu anda takipciler tablosunda kendsini takip etmesini sağlayacağız.(Anasayfada görünmesi için)
				$add	=	mysqli_query($connection,"INSERT INTO kullanicilar(username,fullname,email,password,Presim)VALUES('$username','$fullname','$email','$password','../Profil-Photo/account.jpg')");

				if($add)
				{
					echo '<script language="javascript">
							alert("Kayıt işleminiz başarı ile tamamlandı. "'.$username.'") 
						 </script>';	

					header("refresh:0.05;url=account_signup.php");
				}
				else
				{
					echo '<script language="javascript">;
							alert("Kayıt Gerçekleştirilemedi!");  
						  </script>';
					header("refresh:0.05;url=account.php");
				}
			}
		}
		
	//Kişinin bilgilerini güncelliyoruz.

    if (isset($_POST['bilgi_guncelle'])) {
        $sorgu = mysqli_query($connection,"UPDATE kullanicilar SET username='" . $_POST['e_Kadi'] . "',fullname='" . $_POST['e_adi'] . "',email='" . $_POST['e_email']."',pBiyografi='" . $_POST['e_biyografi'] . "',durum='" . $_POST['e_durum']."'  WHERE id='".$_SESSION['id']."'");
		
	        if (mysqli_affected_rows($connection)) 
	        {
	            header("refresh:0.05;url=edit-profil.php?dr=$");//Kayıt Güncellendi.
	        } else
			{
	            header("Location:edit-profil.php?dr=&");//Kayıt Güncellenemedi.
			}
    	}

    	if (isset($_POST['sifre_guncelle'])) {

    		$yenisifre=trim(md5($_POST['yenisifre']));
    		$yenisifretekrar=trim(md5($_POST['yenisifretekrar']));

    		if ($yenisifre==$yenisifretekrar) {

				$sorgu = mysqli_query($connection,"UPDATE kullanicilar SET password='" . $yenisifre . "' WHERE id='".$_SESSION['id']."'");
			
		        if (mysqli_affected_rows($connection)) 
		        {
		            header("refresh:0.05;url=edit-profil.php?dr=sp");//Kayıt Güncellendi.
		        } else
				{
		            header("Location:edit-profil.php?dr=sl");////Kayıt Güncellenemedi.
				}
    		}
    	}

    	//Resime yorum yapma

    	if (isset($_POST['yaz']))
    	{
    		$resimID=$_POST['resimID'];
    		
    		if ($_POST['yaz']!='') {
    			$add=mysqli_query($connection,"INSERT INTO yorumlar(resimID,kullaniciID,yorum_yapan,yorum)VALUES('".$resimID."','".$_SESSION['id']."','".$_SESSION['username']."','".$_POST['comment']."')");
				if(mysqli_affected_rows($connection))
				{
					header("refresh:0.05;url=index.php");
				}
    		}
    	}

    	//Resmin yorumuna yorum yapma

    	if (isset($_POST['btn_yoruma_yorum']))
    	{
    		$resimID=$_POST['resimID'];
    		$yorumID=$_POST['yorumID'];
    		$yoruma_yorum=$_POST['yoruma-yorum'];//Gelen yorum

    		if ($_POST['btn_yoruma_yorum']!='') {
    			
    			$add=mysqli_query($connection,"INSERT INTO yoruma_yorum(yorum,yorumID,kullaniciID,kullanici_adi,resimID)VALUES('$yoruma_yorum','$yorumID','".$_SESSION['id']."','".$_SESSION['username']."','$resimID')");

				if(mysqli_affected_rows($connection))
				{
					header("refresh:0.05;url=index.php");
				}
    		}
    	}

    	//Resim Begeni
    	if (isset($_GET['bgn'])) {

    		$gelen_begeni=$_GET['bgn'];
    		$begenenID=$_SESSION['id'];
    		$begendi="..\\\img\\\heart-red.png";

    		$kontrol_sorgu=mysqli_query($connection,"SELECT * FROM begeniler WHERE sID='".$gelen_begeni."' AND kullaniciID='".$begenenID."'");

    		if (mysqli_num_rows($kontrol_sorgu)>0) {
    			
    			$sil=mysqli_query($connection,"DELETE FROM begeniler WHERE sID='".$gelen_begeni."' AND kullaniciID='".$begenenID."'");
    			
    			//Eğer resmi daha önceden beğenmiş beğeniyi silecek
	    		
	    		if (mysqli_affected_rows($connection)) {
	    			header("Location:index.php");
	    		}
    		}else{
    			$ekle=mysqli_query($connection,"INSERT INTO begeniler (sID,kullaniciID,kalp_yol)VALUES('$gelen_begeni','$begenenID','$begendi')");
    		
    			//Eğer resmi daha önceden beğenmemiş ise arttıracak

	    		if (mysqli_affected_rows($connection)) {
	    			header("Location:index.php");
	    		}
    		}
    	}



    	//Takip Et
    	if (isset($_POST['takip_et'])) {

    	$kullaniciID=$_POST['kullaniciID'];
    	$kullanici_adi=$_POST['kullanici_adi'];
    	$takipci_id=$_SESSION['id'];
    	$takipci_adi=$_SESSION['username'];

    	$sql=mysqli_query($connection,"SELECT * FROM takipciler WHERE takipci_id='$takipci_id' AND takip_edilen_id='$kullaniciID'");
    
    	if (mysqli_num_rows($sql)>0) {
				$takibi_birak=mysqli_query($connection,"DELETE FROM takipciler WHERE takipci_id='$takipci_id' AND takip_edilen_id='$kullaniciID'");
				echo '<script language="javascript">;
							alert("Kişiyi zaten takip ediliyor...");  
						  </script>';
					
				/*Yukarıdaki javascript kodu yerine keşfew te sadece takip edilenlerin bilgilerini getirirsek sorun çözülür.*/
    			header("refresh:0.05;url=kesfet.php"); 
    		}
    		else{
    		
    			$takip_et_sorgu=mysqli_query($connection,"INSERT INTO takipciler(takipci_id,takipci_adi,takip_edilen_id,takip_edilen_kisi)VALUES('$takipci_id','$takipci_adi','$kullaniciID','$kullanici_adi')");
    			
    			echo '<script language="javascript">;
							alert("Kişi Takip Ediliyor...");  
						  </script>';

    			if (mysqli_affected_rows($connection)) {
		            header("refresh:0.05;url=index.php");
    			}
    		}
    	}	

    	//Takibi bırak profil sayfası
    	if (isset($_GET['id'])) {

	    		$id=$_GET['id'];
				$takipci_id=$_SESSION['id'];
	    		$takibi_birak=mysqli_query($connection,"DELETE FROM takipciler WHERE takipci_id='$takipci_id' AND takip_edilen_id='$id'");
				header("Location:profil.php?id=".$id."");
				echo "Silindi";
    	}
    	//Takip et profil sayfası
    	if (isset($_GET['idok'])) {

	    		$kullaniciID=$_GET['idok'];
				$takipci_id=$_SESSION['id'];
				$takipci_adi=$_SESSION['username'];

				$kullanici_bilgi_sorgu=mysqli_query($connection,"SELECT username FROM kullanicilar WHERE id=".$kullaniciID."");			
				$isim_cek=mysqli_fetch_array($kullanici_bilgi_sorgu);

	    		$kullanici_adi=$isim_cek['username'];
	    
	    		
	    		$takibi_birak=mysqli_query($connection,"INSERT INTO takipciler(takipci_id,takipci_adi,takip_edilen_id,takip_edilen_kisi)VALUES('$takipci_id','$takipci_adi','$kullaniciID','$kullanici_adi')");

				header("Location:profil.php?id=".$kullaniciID."");
    	}


		?>
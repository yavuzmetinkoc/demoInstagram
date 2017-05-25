<?php require_once("config.php"); 

			if (isset($_POST['btn_register'])) {
		
			$username	=	$_POST['username'];
			$password	=	md5($_POST['password']);
									
			
			$sql=mysqli_query($connection,"SELECT * FROM kullanicilar WHERE username='$username' AND password='$password'");
			
			if(mysqli_num_rows($sql)>0)
			{
					$getir=mysqli_fetch_array($sql);
					$_SESSION['oturum']=true;
					$_SESSION['id']=$getir['id'];
					$_SESSION['username']=$getir['username'];
					$_SESSION['fullname']=$getir['fullname'];
					$_SESSION['Presim']=$getir['Presim'];
					$_SESSION['resimID']=$getir['sID'];

					$takipciler=mysqli_query($connection,"SELECT * FROM takipciler WHERE takipci_adi='$username' AND takip_edilen_kisi='$username'");
					
					if (mysqli_num_rows($takipciler)>0) {}/*Kişinin kendini takip etmesini sağlıyoruz*/
						else {
							$takip	=	mysqli_query($connection,"INSERT INTO takipciler(takipci_id,takipci_adi,takip_edilen_id,takip_edilen_kisi)VALUES('".$_SESSION['id']."','".$_SESSION['username']."','".$_SESSION['id']."','".$_SESSION['username']."')");
						}
					

					echo "Hoşgeldiniz  ".$_SESSION['username']." Anasayfaya yönlendiriliyorsunuz.";
					header("Location:index.php");
					return;
			}
			else{				
				header("refresh:0.05;Url=account_signup.php?dr=£");
			}
		}
?>
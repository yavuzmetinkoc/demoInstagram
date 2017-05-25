<?php
include "config.php";
include "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Kişi Ara</title>
</head>
<body>
	<?php 
	$aranan=trim($_POST['aranan']);
	if ($aranan==""){
		header("Location:index.php");
	}
	if (isset($_POST['ara']) && !empty($aranan)) {
		
			//$ara sorgusu döngüde olması gerekiyor.

			$ara_sorgusu="SELECT * FROM kullanicilar  WHERE fullname OR username LIKE '%$aranan%'";
			$ara=mysqli_query($connection,$ara_sorgusu);
			$ara_cek=mysqli_fetch_array($ara);
			
			/*JOIN takipciler ON takipciler.takipci_id=paylasimlar.kullaniciID JOIN kullanicilar on kullanicilar.id=takipciler.takipci_id*/

			if (mysqli_num_rows($ara)>0) {

					$sorgu=mysqli_query($connection,$ara_sorgusu)or die(mysqli_error($connection));
					
					while($kayit=mysqli_fetch_array($sorgu)){
							
					echo  	'<a href="profil.php?id='.$kayit["id"].'">
								<div class="aranan" title="Profilini Gör">';
					echo 		'<div class="profil_photo">';
					echo     		'<img src="'.$kayit['Presim'].'" alt="">';
					echo		'</div>';
						
					echo		'<div class="info">';
									echo $kayit['username']."<br>";
									echo $kayit['fullname'];
					echo 		'</div>';
					echo    '</div></a>';	

					}

				}
			else{
				echo '<script language="javascript">';
  				echo 'alert("Aranan Kişi Bulunamadı.")';
  				echo '</script>';
  				header("refresh:0.1;Url=index.php");
		}
	}

	?>
</body>
</html>



     
        
       
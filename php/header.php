<?php @session_start();?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

<title>Instagram</title>

<link rel="stylesheet" type="text/css" href="..\css\header.css">        <!--Menü css lerini içerir.-->
<link rel="stylesheet" type="text/css" href="..\css\index.css">         <!--Anasayfa css lerini içerir.-->
<link rel="stylesheet" type="text/css" href="..\css\footer.css">        <!--footer css lerini içerir.-->
<link rel="stylesheet" type="text/css" href="..\css\profil.css">        <!--profil sayfasının css lerini içerir.-->
<link rel="stylesheet" type="text/css" href="..\css\edit-profil.css">   <!--Kişi bilgilerini güncelleme sayfasısnın css lerini içerir.-->
<link rel="stylesheet" type="text/css" href="..\css\discover.css">      <!--keşfet sayfasının css lerini içerir.-->
<link rel="stylesheet" type="text/css" href="..\css\search.css">        <!--Arama sayfasının css lerini içerir.-->
<link rel="stylesheet" type="text/css" href="..\css\photo-review.css">  <!--Profildeki resimleri detaylı göstermek için tasarlaanan sayfanın css lerini içerir.-->

<script type="text/javascript" src="../js/profil-info-slide.js"></script>

<link rel="shortcut icon" href="..\img\instagram.ico" type="image/x-icon" />

</head>

<body>

<!--Resim paylaşma penceresi-->


<div hidden class="container" style="position: absolute;width: 100%;height: 900px;background-color: black;opacity: 0.8;"></div>
                            <!--Margin:0 auto yapılacak-->
<div hidden id="mesaj" style="margin:50px 0 0 470px;position: absolute;width:400px;height:280px;background-color:#EEEEEE;color:white;opacity: 0.9">
        <div class="photoshare" style="margin:0 5px 0 20px;height: 200px;width: 360px;">
         <form action="photo-upload.php" method="POST" enctype="multipart/form-data">
            <br /><br /><br />
            <table>
                <tr>
                    <td><input type="file" style="border:none;color:gray" name="share"/></td>
                    <td></td>
                </tr>
                <tr>
                    <td><input type="text" placeholder="Konum girin..." name="konum" /><br /><br /></td>
                    <td></td>
                </tr>
                <tr>
                    <td><input type="text" placeholder="Durum yazın..." name="aciklama" /><br /><br /></td>
                    <td></td>
                </tr>
                <tr>
                    <td><input type="submit" class="button-effect" name="share-submit" value="Paylaş"/><br /><br /><!--Eğer resim paylaşılabiliyorsa slide kapansın--></td>
                    <td><input type="button" value="Kapat" id="gizle" style="float: right: ;border: none;width: 100px;height: 40px;background-color: white;" /></td>
                </tr>
            </table>
         </form>
        </div>
</div>
<!--///-->


<!--Men navigasyon anasayfa logo,arama çubuğu ve ikonları içeriyor.-->


<div id="header-container" style=" height: 80px;width: 100%;background-color:white;margin:auto; box-shadow: 1px 1px #C8C3BE;">
	<div id="header" style="margin:auto;box-shadow:none">
		<div id="logo"><a href="index.php"><img src="..\img\instagram_logo.png" alt="Anasayfa" title="Anasayfa"/></a></div>
		
		<div id="search">
        <form action="search.php" method="POST">
			<input style="width:200px;height:30px;position:absolute;margin-left:580px;margin-top:20px;text-align: center" type="text" id="search" name="aranan" placeholder="Kişi Ara"/>
            <input type="submit" id="ara" name="ara" value="" title="Ara" />
        </form>
		</div>
		
		<div id="nav" style="width: 220px">
			<div class="nav_img" style="margin-top:25px;"><img src="..\img\upload.png" id="goster" alt="Resim Yükle" title="Resim Yükle"/></div>
			<div class="nav_img" style="margin-top:25px;"><a href="kesfet.php"><img src="..\img\persons_img.png" alt="Keşfet" title="Keşfet"/></a></div>
			<!--<div class="nav_img bdg" nbr="10" style="margin-top:25px;"><img src="..\img\heart_img.png" alt="Beğeniler"  title="Beğeniler"/></div>-->
			<div class="nav_img" style="margin-top:25px;">
            <?php
            echo '<a href="profil.php?id='.$_SESSION["id"].'"><img src="..\img\account_img.png" title="Profilim" alt="Profilim"/></a>';
            ?>
            </div>
		</div>
	</div>
	</div>


    <!--Javascript dosyalarını import ediyoruz.-->
  
    <script type="text/javascript" src="../js/jquery-3.2.0.min.js"></script> <!--JQuery Kütüphanesini içerir.-->
    <script type="text/javascript" src="../js/like.js"></script>             <!--beğeni efekt js  lerini içerir.-->
    <script type="text/javascript" src="../js/photo_slide.js"></script>      <!--resim yükleme ekranının js lerini içerir.-->
    <script type="text/javascript" src="../js/scroll_up.js"></script>        <!--yukarı tuşunun js lerini içerir.-->
    <script type="text/javascript" src="../js/takipci.js"></script>          <!--Kişiyi takip için css lerini içerir.-->
    <script type="text/javascript" src="../js/upSlide.js"></script>          




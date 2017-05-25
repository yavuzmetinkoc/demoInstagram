<?php   
    include "config.php";
    if (isset($_SESSION['oturum'])) {
    include "header.php"; 

    $sorgu=mysqli_query($connection,"SELECT * from takipciler JOIN kullanicilar on takipciler.takip_edilen_id=kullanicilar.id JOIN paylasimlar on takipciler.takip_edilen_id=paylasimlar.kullaniciID  WHERE takipci_id='".$_SESSION['id']."' ORDER BY paylasimlar.sTarih DESC")or die(mysqli_error($connection));/*tarihe göre descanding yapılacak GROUP BY sID*/
    
    //Alttaki kod eğer kullanıcının hiç resmi yoksa anasayfaya hoşgeldiniz desin varsa gizlesin
    $temp=mysqli_query($connection,"SELECT count(sYol) as top FROM paylasimlar WHERE kullaniciID='".$_SESSION['id']."'");
    $gonderi_sayisi = mysqli_fetch_array($temp);
   
    if ($gonderi_sayisi['top']==0) {
            echo   '<div id="content-welcome">
                        <img src="..\img\welcome_homepage.png" alt="" title="Resim yüklemek için sağ üstten resim yükleyi tıklayın"/>
                    </div>';
    }
    else{
         echo '<div id="content-welcome" hidden>;
                <img src="..\img\welcome_homepage.png" alt=""/>
                </div>';
    }

    while($kayit=mysqli_fetch_array($sorgu)){

        $begeni_cek=mysqli_query($connection,"SELECT * FROM begeniler WHERE sID='".$kayit['sID']."'");

        $toplam=mysqli_num_rows($begeni_cek);

        $begeni_kontrol=mysqli_query($connection,"SELECT * FROM begeniler WHERE sID='".$kayit['sID']."' AND kullaniciID='".$_SESSION['id']."'");

        $toplam_begeni_kontrol=mysqli_num_rows($begeni_kontrol);
        
        $yorum_cek=mysqli_query($connection,"SELECT * FROM yorumlar WHERE resimID='".$kayit['sID']."'")or die(mysqli_error($connection));//Bütün resimlere ayrı ayrı yorum yapılabilinecek
        
        echo '<div class="photo-container">
             <div id="content-photo-share">
             <div id="photo-share-top-bar" style="height: 64px;box-shadow:1px 1px 1px gray">
             <div id="photo-share-small-img"  style="background:url('.$kayit['Presim'].'); border-radius:80px;width:48px;margin:4px;height:48px;background-size:cover; background-position:center;" alt="" "/>
             </div>
             <ul id="photo-share">
                <li><a href="profil.php?id='.$kayit["id"].'" title="Profilini Gör" class="name">'.$kayit['takip_edilen_kisi'].'</a></li>
                <li><a href="" class="location">'.$kayit['sKonum'].'</a></li>
             </ul>
             <img src='.$kayit['sYol'].' width="602" height="538"/>
        
             <div id="photo-comment-like" style="box-shadow:1px 1px 1px gray">
               <div id="like-person">';


        /*--------------------------------------------------------------------------------------------*/
        $begeni_sayisi=mysqli_fetch_array($begeni_cek);//resmin toplam beğeni sayısını çekiyoruz.
        $kontrol=mysqli_fetch_array($begeni_kontrol);
        

        if ($toplam>0) {
            if ($toplam_begeni_kontrol==1) {//Kullanıcı ilgili resmi beğenmişse

            echo        '<a href="islem.php?bgn='.$kayit['sID'].'">'.'<img src="'.$kontrol['kalp_yol'].'" alt="Beğen" title="Beğen" class="btn-like">'.'</a>'.'<b>'.$toplam." Begenme".'</b>';  
            }elseif($toplam_begeni_kontrol==0){//Kullanıcı ilgili resmi beğenmemişse
                echo        '<a href="islem.php?bgn='.$kayit['sID'].'">'.'<img src="..\img\heart_img.png" alt="Beğen" title="Beğen" class="btn-like">'.'</a>'.'<b>'.$toplam." Begenme".'</b>'; 
            }
        }
        else{
            echo        '<a href="islem.php?bgn='.$kayit['sID'].'">'.'<img src="..\img\heart_img.png" alt="Beğen" title="Beğen" class="btn-like">'.'</a>'; 
        }

        if ($kayit['aciklama']=="") {}
            else{ echo '<p>'.'<b>'.$kayit['username'].'</b>'.'  '.$kayit['aciklama'].'</p>';}
       
        echo    '</div>';
        echo '<div class="photo-comment-show" style="margin-left:20px;width:auto;">';
         //yorum_cek sorgusu inner join cekerek yapılacak
        while ($cek=mysqli_fetch_array($yorum_cek))  {
         
            $yoruma_yorum_sorgu=mysqli_query($connection,"SELECT * FROM yoruma_yorum WHERE yorumID='".$cek['yorumID']."'");

            echo "</br>".'<b><a href="profil.php?id='.$cek["kullaniciID"].'">'.$cek['yorum_yapan'].' : </a></b>';echo $cek['yorum']."</br>";
            
            while ($yoruma_yorum_cek=mysqli_fetch_array($yoruma_yorum_sorgu)) {
                 if (mysqli_num_rows($yoruma_yorum_sorgu)>0) {
                echo '<b>&nbsp;&nbsp;&nbsp;'.$yoruma_yorum_cek["kullanici_adi"]." : ".'</b>'.$yoruma_yorum_cek["yorum"]."<br/>";
            }
            }
             echo   '<form action="islem.php" method="POST">
                            <input style="margin-left:35px;margin-top:10px;width:75%;height:30px;" type="text" placeholder="Yorum yazın..." name="yoruma-yorum"/>
                            <input type="hidden" name="resimID" value="'.$kayit['sID'].'"/>
                            <input type="hidden" name="yorumID" value="'.$cek['yorumID'].'"/>
                            <input  style="width:80px;height:35px;" type="submit" name="btn_yoruma_yorum" value="Yanıtla"/>
                        </form>'; 
        }

        echo '</div>';

        //Yorum yapma işlemleri
        echo  '<form method="POST" action="islem.php">
                <div id="comment"><br>
                    <input style="margin-left:10px;width:80%;height:35px;" type="hidden" name="resimID" value="'.$kayit['sID'].'"/>
                    <input style="margin-left:10px;width:80%;height:35px;" type="text" placeholder="Yorum yazın..." name="comment"/>
                    <input  style="width:80px;height:40px;" type="submit" name="yaz" value="Gönder"/>
                </div>
               </form>
            </div>';
        }
    ?>
    
     <?php } 
     else{
        header("location:account_signup.php");
     }
     ?>
     <div class="void"></div> <!--Kişinin resimlerinin bulunduğu content ile footer arasına boşluk koymak için--> 

    <!--Scroll Up-->
    <a href="#" class="up">
        <img src="../img/up.png" style="width: 40px;height: 40px;" alt="Yukarı Çık" title="Yukarı Çık">
    </a>
    
</div>





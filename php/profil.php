<?php
include "config.php";
include "header.php";
?>
<!--CONTENT-->
<?php if(isset($_GET["id"])) { 
   
    $_SESSION["gelen"]=$_GET["id"];
    
    $kontrol_sorgusu = mysqli_query($connection,"SELECT * FROM kullanicilar WHERE id='".$_GET["id"]."'");
    
    if (mysqli_affected_rows($connection)) {
    ?>
<div id="content-profil-info">
    <div id="profil-photo-container">
        <div id="profil-photo" style="margin-left: 75px">
                <?php
                    $say = mysqli_query($connection,"SELECT count(*) AS top FROM paylasimlar WHERE kullaniciID='".$_GET["id"]."'");
                    $gonderi_sayisi = mysqli_fetch_array($say); //Gönderi Sayısı

                    /*-----------Takip edilen kişi------------*/
                    $takip_edilen_sorgu = mysqli_query($connection,"SELECT COUNT(*)-1 AS takip_ediliyor FROM takipciler WHERE takipci_id='".$_GET["id"]."'");
                    $takip_edilen_sayisi_cek = mysqli_fetch_array($takip_edilen_sorgu);
                    

                    /*----------Takip ettiğin sayı-----------*/
                    $seni_takip_ediyor_sorgu = mysqli_query($connection,"SELECT COUNT(*)-1 AS takipciler FROM takipciler WHERE takip_edilen_id='".$_GET["id"]."'");
                    $seni_takip_edenleri_cek = mysqli_fetch_array($seni_takip_ediyor_sorgu);
                    /*---------------------------------------*/              


                    //Kullanıcı profil resmini çekiyoruz
                    $sql=mysqli_query($connection,"SELECT * FROM kullanicilar  WHERE id='".$_GET["id"]."'");

                    if(mysqli_num_rows($sql)>0)
                    {
                        $getir=mysqli_fetch_array($sql);
                        if (isset($getir)) {
                             echo "<img id='upload' style='border-radius:80px; width: 150px; height: 150px;cursor:pointer'title='Profil Resmi Yükle' src='".$getir['Presim']."'>";
                        }
                    }
                ?>
        </div>
    </div>
    
    <div id="user-info">
        <h3><?php echo $getir['username'];?></h3>
        
        <?php if($_SESSION["id"]==$_GET["id"]){?>    

        <form action="photo-upload.php" method="POST" enctype="multipart/form-data">
            
            <table border="0">
                <tr>
                    <td><input hidden type="file" name="resim" id="file"/></td>
                    <td><input type="submit" class="button-effect" name="gonder" id="kaydet" value="Kaydet"/><br/></td>
                    <td><a href="edit-profil.php"><input  class="button-effect" type="button" value="Profili Düzenle"></td>
                    <td><a class="button-effect" href="logout.php"><img src="../img/logout.png" alt="" title="Çıkış Yap"></a></td>
                </tr>    
            </table>
            <?php }?>

        <br>

        <a href="" title="Paylaştığın gönderi sayısı"><?php echo "<b>".$gonderi_sayisi['top'].'</b> Gönderi '; ?></a>
        <a href="" title="Seni takip edenler">| <b><?php echo $seni_takip_edenleri_cek['takipciler']; ?></b> Takipçiler</a>
        <a href="" title="Senin takip ettiklerin">| <b><?php echo $takip_edilen_sayisi_cek['takip_ediliyor']; ?></b> Takip Ediliyor</a>
        
        <?php 
            $takipci_bul_sorgu=mysqli_query($connection,"SELECT * FROM takipciler WHERE takipci_id='".$_SESSION['id']."' AND takip_edilen_id='".$_GET['id']."'");

            if (mysqli_affected_rows($connection)) {
                if ($_SESSION['id']==$_GET['id']) {}
                else{
                    echo '<span>&nbsp;&nbsp;&nbsp; <a href="islem.php?id='.$_GET['id'].'"><input type="button" class="btn" value="Takibi Bırak"></a></span>';}
            }
            else{ 
                echo  '<span>&nbsp;&nbsp;&nbsp; <a href="islem.php?idok='.$_GET['id'].'"><input type="button" class="btn" value="Takip Et"></a></span>';}
         ?>

        <hr style="margin:20px 0 10px 0;width:300px;">
        <br>
        <a href=""><?php echo "<b>".$getir['fullname']."</b>"; echo " ".$getir['pBiyografi']."<br/>"; echo "</br><b>Durum  : </b>".$getir['durum'];?></a><br>
        </form>
    </div>
    
    <?php
        /*Kişinin profil sayfasında paylaştığı resimlerin gözükmesini sağlıyor.*/
        $sorgu=mysqli_query($connection,"SELECT * FROM paylasimlar INNER JOIN kullanicilar ON kullanicilar.id=paylasimlar.kullaniciID WHERE paylasimlar.KullaniciID='".$_GET['id']."'")or die(mysqli_error($connection));
        
        if (mysqli_num_rows($sorgu)){ //Kişinin paylaşımları listeleniyor.
           
            while($sorgu_cek=mysqli_fetch_array($sorgu)){

                 echo  '<div id="shared-photo-container">';
                 echo       '<div class="shared-photo">';
                 echo           "<a href='photo-review.php?id=".$sorgu_cek['sID']."'>"."<img style='width: 250px; height: 250px;' src='".$sorgu_cek['sYol']."' width='100' height='100'/>"."</a>";
                 echo       '</div>';
                 echo  '</div>';
            }
        }
    ?>
    </div>
    <?php 
        }
        else{
            header("Location:../index.php");
        }
    } 
    ?>
    
    <!--Profil Fotoğrafı Yüklemek için script dosyasını import ediyoruz-->

   <script type="text/javascript" src="../js/profilUpload.js"></script>
   
   <div class="void"></div> <!--Kişinin resimlerinin bulunduğu content ile footer arasına boşluk koymak için-->    

<?php include "footer.php" ?>
<?php
 ##Ender İMEN
 ##25.03.2017
 include "config.php";
 //Profil resmi güncelleme

if(isset($_POST['gonder'])){//Form gönderildi mi?
  
    if ($_FILES["resim"]["size"]<1024*1024*1024*1024){//Dosya boyutu 2Mb tan az olsun
        if ($_FILES["resim"]["type"]=="image/jpeg" || $_FILES["resim"]["type"]=="image/png" || $_FILES["resim"]["type"]=="image/gif"){
            $dosya_adi=$_FILES["resim"]["name"];
            //Dosyaya yeni bir isim oluşturuluyor
            $uzanti=substr($dosya_adi,-4,4);
            $uret=array("as","rt","ty","yu","fg");
            $sayi_tut=rand(1,10000);
            $yeni_ad="../Profil-Photo/photo".$uret[rand(0,4)].$sayi_tut.$uzanti;
            
            //Dosya yeni adıyla Share klasörüne kaydedilecek 
            
            if (move_uploaded_file($_FILES["resim"]["tmp_name"],$yeni_ad)){

                echo 'Dosya başarıyla güncellendi.';

                //Bilgiler veri tabanına kaydedilsin.

                $add=mysqli_query($connection,"UPDATE kullanicilar SET Presim='".$yeni_ad."' WHERE id='".$_SESSION['id']."'");

                if (mysqli_affected_rows($connection)){
                    echo 'Profil Resmi kaydedildi.';header("refresh:1;url=profil.php"."?id=".$_SESSION['id']);
                }                                                         
                else{
                    header("refresh:1;url=profil.php"."?id=".$_SESSION['id']);
                }
            }else{
                echo 'Dosya Yüklenemedi!';
                header("refresh:1;url=profil.php"."?id=".$_SESSION['id']);
            }
        }else{
            header("refresh:1;url=profil.php"."?id=".$_SESSION['id']); 
        }
    }else{
        echo 'Dosya boyutu 2 Mb ı geçemez!';header("refresh:1;url=profil.php"."?id=".$_SESSION['id']);
    }
}
/******Resim paylaşma kodları******/
if(isset($_POST['share-submit']))
{
    if ($_FILES["share"]["size"]<1024*1024*1024*1024){//Dosya boyutu 2Mb tan az olsun dedik
        if ($_FILES["share"]["type"]=="image/jpeg" || $_FILES["share"]["type"]=="image/png" || $_FILES["share"]["type"]=="image/gif"){//dosya tipi jpeg olsun dedik
            $dos_adi=$_FILES["share"]["name"];
            //Dosyaya yeni bir isim oluşturduk
            $uzanti=substr($dos_adi,-4,4);
            $uret=array("as","rt","ty","yu","fg");
            $sayi_tut=rand(1,10000);
            $yeni_ad="../Share/photo".$uret[rand(0,4)].$sayi_tut.$uzanti;
            
            //Dosya yeni adıyla Profil-Photo klasörüne kaydedilecek.
            //$kullanici_adi=$_session['username']; session start olan kişinin ismine göre profil resmi değiştirilecek.

            if (move_uploaded_file($_FILES["share"]["tmp_name"],$yeni_ad)){
                echo 'Dosya Başarıyla Kaydedildi.';

                //Bilgiler veri tabanına kaydedilsin.
                //Paylaşılan resimlerin bilgileri farklı bir ekrandan alınacak
              
                $tarih = date('Y-m-d H:i:s');//Uzun Tarih Yazılacak 
                $konum=$_POST['konum'];
                $aciklama=$_POST['aciklama'];
                
                $add=mysqli_query($connection,"INSERT INTO paylasimlar(kullaniciID,sTarih,sKonum,sYol,aciklama)VALUES('".$_SESSION['id']."','$tarih','$konum','".$yeni_ad."','$aciklama')");

                if ($add){
                    echo 'Paylaşım Veritabanına kaydedildi.';header("refresh:1;url=index.php");
                }
                else{
                    header("refresh:1;url=profil.php"."?id=".$_SESSION['id']);
                }
            }else{
                echo 'Dosya Yüklenemedi!';header("refresh:1;url=profil.php");
            }
        }else{
            header("refresh:1;url=profil.php"."?id=".$_SESSION['id']);
        }
    }else{
        echo 'Dosya boyutu 2 Mb ı geçemez!';header("refresh:1;url=profil.php"."?id=".$_SESSION['id']);
    }
}
?>
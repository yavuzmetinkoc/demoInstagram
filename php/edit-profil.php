<?php  include "config.php";include "header.php";

    $sorgu=mysqli_query($connection,"SELECT * FROM paylasimlar JOIN kullanicilar ON kullanicilar.id=paylasimlar.kullaniciID WHERE id='".$_SESSION['id']."'")or die(mysql_error($connection));
    $menucek=mysqli_fetch_assoc($sorgu);
    
    if ($_SESSION["id"]==$_SESSION["gelen"]) {    
 ?>
<!--CONTENT-->

<div id="content-profil-edit">
    <div id="menu">
        <input type="button" class="button"  onclick="Goster()" value="Profil Bilgilerini Düzenle">
        <input type="button" class="button"  onclick="Gizle()" value="Şifre Değiştir">
    </div>

    <form action="islem.php" method="POST">

        <div hidden id="password">
            <table style="margin:0px auto;margin-left:100px;">
                <tr>
                    <td style="padding:20px;">
                    <?php 
                    $sql=mysqli_query($connection,"SELECT * FROM kullanicilar  WHERE id='".$_SESSION['id']."'");
                
                   if(mysqli_num_rows($sql)>0)
                    {
                      $getir=mysqli_fetch_array($sql);
                    echo "<a href='../php/profil.php"."?id=".$_SESSION['id']."'><img title='Profilimi Gör' style='border-radius:80px; width: 48px; height: 48px;cursor:pointer' src='".$getir['Presim']."'></a>"; 
                    }
                    echo '</td>';
                    ?>
                    <td> <h3 style="color:#1798F0"><?php echo  $getir['username']; ?></h3>  </td>
                </tr>
                <tr>
                    <td style="padding:15px;">Eski Şifre</td>
                    <td><input type="password" name="eskisifre" placeholder="Şifre Giriniz"></td>
                </tr>
                <tr>
                    <td style="padding:15px;">Yeni Şifre</td>
                    <td><input type="password" name="yenisifre" placeholder="Şifre Giriniz"></td>
                </tr>
                <tr>
                    <td style="padding:15px;">Yeni Şifre Tekrar</td>
                    <td><input type="password" name="yenisifretekrar" placeholder="Şifre Giriniz"></td>
                </tr>
                <tr>
                    <td>
                    <?php if(isset($_GET['dr'])){

                        if ($_GET['dr']=="sp") {
                            echo '<h5 style="color:green">Güncelleme İşlemi Başarılı.</h5>'; 
                        }
                        if ($_GET['dr']=="sl")
                        {
                            echo '<h5 style="color:red">Güncelleme İşlemi Başarısız.</h5>'; 
                        }
                    } ?>
                    </td>
                    <td><input style="width:100px;height: 30px;float: right;text-align: center" class="button-effect" type="submit" name="sifre_guncelle" value="Kaydet"></td>
                </tr>
            </table>
        </div>
        </form>
        <!--Kullanıcı bilgilerini içeren  kısım-->
        <form action="islem.php" method="POST">
        <div id="edit">
            <table style="margin:0px auto;">
                <tr>
                    <td style="padding:20px;">
                    <?php 
                    $sql=mysqli_query($connection,"SELECT * FROM kullanicilar  WHERE id='".$_SESSION['id']."'");

                   if(mysqli_num_rows($sql)>0)
                    {
                      $getir=mysqli_fetch_array($sql);
                      
                    echo "<a href='../php/profil.php"."?id=".$_SESSION['id']."'><img title='Profilimi Gör' style='border-radius:80px; width: 48px; height: 48px;cursor:pointer' src='".$getir['Presim']."'></a>";
                    }
                    echo '</td>';
                    ?>
                    <td> <h3 style="color:#1798F0"><?php echo  $getir['username']; ?></h3> </td>
                </tr>
                <tr>
                    <td style="padding:15px;">Adı</td>
                    <td><input type="text" name="e_adi"  value="<?=$getir['fullname']?>"></td>
                </tr>
                <tr>
                    <td style="padding:15px;">Kullanıcı Adı</td>
                    <td><input type="text" name="e_Kadi" value="<?=$getir['username']?>"></td>
                </tr>
                 <tr>
                    <td style="padding:15px;">Durum</td>
                    <td><input type="text" name="e_durum" placeholder="Durum yaz..." value="<?=$getir['durum']?>"></td>
                </tr>
                <tr>
                    <td style="padding:15px;">Biyografi</td>
                    <td><textarea style="border-radius:5px; resize:none;" name="e_biyografi" cols="40" rows="7"><?=$getir['pBiyografi']?></textarea></td>
                </tr>
                <tr>
                    <td style="padding:15px;">E-mail</td>
                    <td><input type="text" name="e_email" value="<?=$getir['email']?>"></td>
                </tr>
                <tr>
                    <td>
                    
                    <?php if(isset($_GET['dr'])){
                        
                        if ($_GET['dr']=="$") {
                            echo '<h5 style="color:green">Güncelleme İşlemi Başarılı.</h5>'; 
                        }
                         if ($_GET['dr']=="&"){
                            echo '<h5 style="color:red">Güncelleme İşlemi Başarısız.</h5>'; 
                        }

                    } ?>
                        
                    </td>
                    <td><input style="width:100px;height: 30px;float: right;text-align: center" class="button-effect" type="submit" name="bilgi_guncelle" value="Kaydet"></td>
                </tr>
            </table>
         </div>
    </form>
</div>
<?php } ?>
<?php include "footer.php"; ?>

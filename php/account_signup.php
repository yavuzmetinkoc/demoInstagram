<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Page-Enter" content="revealTrans(Duration=3,Transition=0)">
    <title>Instagram-Giriş yap</title>
    <link rel="stylesheet" type="text/css" href="..\css\account_signup.css">
    <link rel="stylesheet" type="text/css" href="..\css\footer.css">
    <link rel="shortcut icon" href="..\img\instagram.ico" type="image/x-icon"/>
    
</head>
<body>
<!--Content-->
<div id="content">
    <!--Left_Content-->
    <div id="left-content">
        <img src="..\img\phone_img.png" alt=""/>
    </div>
    <!--Right-Content-->

    <div id="right-content">
        <form name="login_form" method="POST" action="giris.php">
            <table id="table_design" border="0">
                <tr>
                    <td>
                        <center><img src="..\img\instagram_logo.png" alt=""/></center>
                    </td>
                </tr>
                <tr>
                    <td>
                        <center style="font-family: 'Roboto Condensed', sans-serif;Color:#CCCCCC;font-weight:bold;">
                            Arkadaşlarının fotoğraflarını görmek için kaydol.

                            <!--<?php
                             if ($_GET['login']=='no') {
                                echo "Kullanıcı bulunamadı.";
                            } ?>-->
                        </center>
                    </td>
                </tr>
                <tr>
                    <td>
                        <hr style="width:100px;float:left;">
                        <hr style="width:100px;float:right;">
                    </td>
                </tr>
                <tr>
                    <td>
                        <center><input style="width:80%;height:30px;" type="text" name="username"
                                       placeholder="Kullanıcı Adı" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <center><input style="width:80%;height:30px;" type="password" name="password"
                                       placeholder="Şifre" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <center><input
                                    style="width:80%;height:30px;background-color:#228CD8;border-radius:4px;Color:white;"
                                    type="submit" name="btn_register" Value="Giriş yap">
                        <?php                           
                            /*if (isset($_GET['dr'])) {
                                if ($_GET['dr']=="£") {
                                    echo '<h4 style="color:red">Giriş Yapılamadı</h4>';
                                }
                            }*/
                        ?>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <!--Right-Content-Login-->
    <div id="right-content-login">
        <p>
        <center style="font-family:'Roboto Condensed', sans-serif;">Hesabın Yok mu? <a href="account.php" style="text-decoration:none;">Kaydol</a>
        </center>
        </p>
    </div>
</div>
</body>
</html>

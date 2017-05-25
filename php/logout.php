<?php
session_start();
session_unset('id');
header('Location:account_signup.php');
/*Yukarıdaki kod satırları mevcut bulunan oturumların silinmesini sağlıyor.*/
?>

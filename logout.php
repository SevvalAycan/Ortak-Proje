<?php
session_start();
session_destroy();

// Giriş sayfasına yönlendirme
header("Location: giris-yap.php");
exit();
?>
<?php
session_start();
if (isset($_SESSION["kullanici"])) {
    $name = $_SESSION["kullanici"];
    // Örnek kullanıcı bilgileri
    $email = $_SESSION["email"];
} else {
    // Kullanıcı girişi yapılmamışsa, giriş sayfasına yönlendir
    header("Location: giris-yap.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="neonlogo.png">
    <title>Bandırma Mühendisliği</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <header>
        <nav class="nav-container">
          <title>Bandırma Mühendisliği</title>
            <img src="neonlogo.png" width="50" height="50" alt="Web site logo" id="logo" style="cursor: pointer;" class="logo"/> 
            
            <div class="hamburger">
              <span class="lines"></span>
              <span class="lines"></span>
              <span class="lines"></span>
            </div>
      
            <ul id="nav-links">
                <li><a href="anasayfa.php" class="links">Anasayfa</a></li>
                <li><a href="profile.php" class="links">Profil</a></li>
                <li><a href="https://www.bandirma.edu.tr/tr/www/Iletisim" class="links">İletişim</a></li>
                <li><a href="giris-yap.php" class="links">Giriş Yap</a></li>
                <li><a href="kaydol.php" class="links">Kayıt Ol</a></li>
              </ul>
      
          </nav>
    </header>
<body>
  <div class="container">
    <h1>Hoş Geldiniz, <?php echo $name; ?>!</h1>
    <p>Profil bilgileriniz:</p>
    <ul>
      <li><strong>Email:</strong> <?php echo $email; ?></li>
    </ul>
    <form action="blog_ekle.php" method="post" class="button-container">
  <button type="submit">Blog Eklemek İçin Tıklayınız</button>
</form>
 
    <a href="logout.php">Çıkış Yap</a>
  </div>
</body>
</html>

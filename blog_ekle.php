<?php
include("baglanti.php");
// Blog ekleme işlemi
if (isset($_POST["baslik"]) && isset($_POST["metin"]) && isset($_POST["rumuz"])) {
    $baslik = $_POST["baslik"];
    $metin = $_POST["metin"];
    $rumuz = $_POST["rumuz"];

    $ekle = "INSERT INTO blog (baslik, metin, rumuz) VALUES ('$baslik', '$metin', '$rumuz')";
    $calistir_ekle = mysqli_query($baglanti, $ekle);

    if ($calistir_ekle) {
        echo '<div class="alert alert-success" role="alert">
                Blog gönderisi başarıyla eklendi!
            </div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">
                Blog gönderisi eklenirken bir hata oluştu!
            </div>';
    }
    mysqli_close($baglanti);
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
    <h1>Blog Gönderisi Ekle</h1>
    <form action="" method="POST">
      <label for="baslik">Başlık:</label>
      <input type="text" id="baslik" name="baslik" required>
  
      <label for="metin">Metin:</label>
      <textarea id="metin" name="metin" rows="5" required></textarea>
  
      <label for="rumuz">Rumuz:</label>
      <input type="text" id="rumuz" name="rumuz" required>
  
      <input type="submit" value="Gönder">
    </form>
  </body>
  </html>

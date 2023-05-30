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
  <nav class="nav-container">


    <img src="neonlogo.png" width="50" height="50" alt="Web site logo" id="logo" style="cursor: pointer;"
      class="logo" />


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

  <script>
    let hamburger = document.querySelector('.hamburger');
    let navLinks = document.getElementById('nav-links');
    let links = document.querySelectorAll('.links');

    hamburger.addEventListener('click', () => {
      navLinks.classList.toggle('hide');
      hamburger.classList.toggle('lines-rotate');
    });

    for (let i = 0; i < links.length; i++) {
      links[i].addEventListener('click', () => {
        navLinks.classList.toggle('hide');
      });
    }
  </script>

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


    <style>
      h1 {
        text-align: center;
        margin-bottom: 20px;
        color: #c1a2ca;
      }

      form {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #c1a2ca;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(75, 24, 97, 0.873);
      }


      label {
        display: block;
        font-weight: bold;
        margin-bottom: 4px;
      }

      input[type="text"],
      textarea {
        width: 80%;
        padding: 8px;
        border: 2px solid #ccc;
        border-radius: 3px;
      }

      textarea {
        resize: vertical;
      }

      input[type="submit"] {
        width: 20%;
        padding: 5px;
        background-color: purple;
        color: #ffffff;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        display: flex;
        justify-content: center;
      }

      input[type="submit"]:hover {
        width: 20%;
        padding: 5px;
        background-color: #881e86;
        color: #ffffff;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        display: flex;
        justify-content: center;
      }
    </style>
  </body>

</html>
<?php
include("baglanti.php");
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <link rel="icon" type="image/png" href="neonlogo.png">
  <title>Bandırma Mühendisliği</title>
  <link rel="stylesheet" href="style.css">
  <style>
  @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap');
  
    .blog-post {
        background-color: #f5f5f5;
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 5px;
    }

    .blog-title {
        font-size: 24px;
        color: #333;
        margin-bottom: 10px;
    }

    .blog-content {
        font-size: 16px;
        color: #666;
        margin-bottom: 5px;
    }


  .zoomed {
    font-size: 1.2em;
  }
</style>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    var tableCells = document.querySelectorAll("th, td");
    tableCells.forEach(function(cell) {
      cell.addEventListener("click", function() {
        this.classList.toggle("zoomed");
      });
    });
  });
</script>

</head>

<body>

  <nav class="nav-container">
    <img src="neonlogo.png" width="50" height="50" alt="Web site logo" id="logo" class="logo" />
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
    
      <?php
include("baglanti.php");

$secim = "SELECT * FROM blog";
$calistir = mysqli_query($baglanti, $secim);
$kayitsayisi = mysqli_num_rows($calistir);

if ($kayitsayisi > 0) {
    while ($ilgilikayit = mysqli_fetch_assoc($calistir)) {
        $baslik = $ilgilikayit["baslik"];
        $metin = $ilgilikayit["metin"];
        $rumuz = $ilgilikayit["rumuz"];
        ?>

        <div class="blog-post">
            <h2 class="blog-title"><?php echo $baslik; ?></h2>
            <p class="blog-content"><strong></strong> <?php echo $metin; ?></p>
            <p class="blog-content"><strong>Rumuz:</strong> <?php echo $rumuz; ?></p>
        </div>
        <br>

        <?php
    }
} else {
    echo "Hiç kayıt bulunamadı.";
}

mysqli_close($baglanti);
?>

      </tbody>
    </table>
  </div>

  <form action="profile.php" method="post" class="button-container">
    <button type="submit">Blog Eklemek İçin Tıklayınız</button>
  </form>

  </article>

  <footer>
    <p>&copy; 2023 My bbPress Blog</p>
  </footer>

  <script>
    // Footer'ın sayfanın en altında görünmesini sağla
    function setFooterToBottom() {
      var footer = document.querySelector('footer');
      var body = document.querySelector('body');
      var bodyHeight = body.offsetHeight;
      var windowHeight = window.innerHeight;

      if (bodyHeight < windowHeight) {
        footer.style.position = 'fixed';
        footer.style.bottom = '0';
      } else {
        footer.style.position = 'relative';
      }
    }

    // Sayfa yüklendiğinde ve pencere boyutu değiştiğinde footer'ı altta tut
    window.addEventListener('DOMContentLoaded', setFooterToBottom);
    window.addEventListener('resize', setFooterToBottom);
  </script>
</body>

</html>
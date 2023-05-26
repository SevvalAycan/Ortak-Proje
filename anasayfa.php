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
    <table>
    <style>
    body {
      font-family: Arial, sans-serif;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #f2f2f2;
    }

    th:first-child, td:first-child {
      width: 20%;
    }

    th:nth-child(2), td:nth-child(2) {
      width: 50%;
    }

    th:last-child, td:last-child {
      width: 30%;
    }
  </style>
    <thead>
      <tr>
        <th>Başlık</th>
        <th>Metin</th>
        <th>Yazan Kişi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // Başlıkları, metinleri ve rumuzları al
      $sorgu = "SELECT baslik, metin, rumuz FROM blog";
      $calistir_sorgu = mysqli_query($baglanti, $sorgu);

      // Veritabanından gelen verileri tablo içinde döngüyle yazdır
      while ($row = mysqli_fetch_assoc($calistir_sorgu)) {
          $baslik = $row['baslik'];
          $metin = $row['metin'];
          $yazanKisi = $row['rumuz'];

          echo '<tr>
                  <td>' . $baslik . '</td>
                  <td>' . $metin . '</td>
                  <td>' . $yazanKisi . '</td>
                </tr>';
      }

      mysqli_close($baglanti);
      ?>
    </tbody>
  </table>
      </article>
      <form action="profile.php" method="post" class="button-container">
        <button type="submit">Blog Eklemek İçin Tıklayınız</button>
    </main>
    <footer>
      <p>&copy; 2023 My bbPress Blog</p>
    </footer>
    <script src="script.js"></script>
  </body>
</html>

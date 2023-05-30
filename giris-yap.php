<?php
include("baglanti.php");

$name_err = "";
$sifre_err = "";

if (isset($_POST["giris"])) {
    // Kullanıcı adı doğrulama
    if (empty($_POST["kullanici"])) {
        $name_err = "Kullanıcı adı boş geçilemez";
    } else if (strlen($_POST["kullanici"]) < 6) {
        $name_err = "Kullanıcı adı altı harften boş olamaz";
    } else if (!preg_match('/^[a-z\d_]{5,20}$/i', $_POST["kullanici"])) {
        $name_err = "Sadece harfler ve sayılar kullanılabilir";
    } else {
        $name = $_POST["kullanici"];
    }

    // Şifre doğrulama
    if (empty($_POST["sifre"])) {
        $sifre_err = "Şifre boş geçilemez";
    } else {
        $password = $_POST["sifre"];
    }

    // Giriş Eylemi
    if (isset($name) && isset($password)) { // Değişken adını $sifre olarak değiştirildi.
        $secim = "SELECT * FROM kullanicilar WHERE kullanici ='$name'";
        $calistir = mysqli_query($baglanti, $secim);
        $kayitsayisi = mysqli_num_rows($calistir);

        if ($kayitsayisi > 0) {
            $ilgilikayit = mysqli_fetch_assoc($calistir);
            $hashlisifre = $ilgilikayit["sifre"]; // Değişken adını $hashlisifre olarak değiştirildi.

            if (password_verify($password, $hashlisifre)) {
                session_start();
                $_SESSION["kullanici"] = $ilgilikayit["kullanici"];
                $_SESSION["email"] = $ilgilikayit["email"];
                header("location: profile.php");
                exit();
            } else {
                echo '<script>alert("Şifreyi veya Kullanıcı Adını yanlış girdiniz")</script>';
            }
        } else {
            echo '<script>alert("Kullanıcı adı bulunamadı")</script>';
        }
    }
    mysqli_close($baglanti);
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Giriş Yap</title>
    <link rel="icon" type="image/png" href="neonlogo.png">
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



    <div class="container">
        <form action="giris-yap.php" method="POST">
            <h2>Giriş Yap</h2>
            <label for="kullanici">Kullanıcı Adı</label>
            <input type="text" name="kullanici"
                class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" placeholder="Kullanıcı Adı"
                required>
            <div class="invalid-feedback">
                <?php echo $name_err; ?>
            </div>
            <label for="sifre">Şifre</label>
            <input type="password" name="sifre"
                class="form-control <?php echo (!empty($sifre_err)) ? 'is-invalid' : ''; ?>" placeholder="Şifre"
                required>
            <div class="invalid-feedback">
                <?php echo $sifre_err; ?>
            </div>
            <button type="submit" name="giris" id="button">Giriş Yap</button>
        </form>
        <p>Hesabın yok mu? <a href="kaydol.php">Kaydol</a></p>
    </div>







</body>

</html>
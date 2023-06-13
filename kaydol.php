<?php
include("baglanti.php");

$name_err = "";
$email_err = "";
$sifre_err = "";
$sifretkr_err = "";
if (isset($_POST["kaydet"])) {

    // Kullanıcı adı doğrulama
    if (empty($_POST["kullanici"])) {
        $name_err = "Kullanıcı adı boş geçilemez";
    } else if (strlen($_POST["kullanici"]) < 6) {
        $name_err = "Kullanıcı adı en az altı harften oluşmalıdır";
    } else if (!preg_match('/^[a-z\d_]{5,20}$/i', $_POST["kullanici"])) {
        $name_err = "Sadece harfler ve sayılar kullanılabilir";
    } else {
        $name = $_POST["kullanici"];
    }

    // Email doğrulama
    if (empty($_POST["email"])) {
        $email_err = "Email boş geçilemez";
    } else {
        $email = $_POST["email"];
    }

    // Şifre doğrulama
    if (empty($_POST["sifre"])) {
        $sifre_err = "Şifre boş geçilemez";
    } else {
        $password = $_POST["sifre"];
    }

    // Şifre tekrar doğrulama
    if (empty($_POST["sifretkr"])) {
        $sifretkr_err = "Şifre tekrarı boş geçilemez";
    } else if ($_POST["sifre"] != $_POST["sifretkr"]) {
        $sifretkr_err = "Şifreler eşleşmiyor";
    } else {
        $sifretkr = $_POST["sifretkr"];
    }

    // Kayıt işlemi
    if (isset($name) && isset($email) && isset($password) && isset($sifretkr)) {
        $name = $_POST["kullanici"];
        $email = $_POST["email"];
        $password = password_hash($_POST["sifre"], PASSWORD_DEFAULT);

        $ekle = "INSERT INTO kullanicilar(kullanici, email, sifre) VALUES ('$name','$email','$password')";
        $calistirekle = mysqli_query($baglanti, $ekle);
        if ($calistirekle) {
            echo '<div class="alert alert-success" role="alert">
                    Kayıt başarılı!
                </div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">
                    Kayıt sırasında bir hata oluştu!
                </div>';
        }
        mysqli_close($baglanti);

    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Kayıt Ol</title>
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
        <form action="kaydol.php" method="POST">
            <h2>Kaydol</h2>
            <label for="kullanici">Kullanıcı Adı</label>
            <input type="text" name="kullanici" class="form-control is-invalid" placeholder="Kullanıcı Adı" required>
            <div class="invalid-feedback">
                <?php echo $name_err; ?>
            </div>
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control is-invalid" placeholder="E-posta" required>
            <div class="invalid-feedback">
                <?php echo $email_err; ?>
            </div>
            <label for="sifre">Şifre</label>
            <input type="password" name="sifre" class="form-control is-invalid" placeholder="Şifre" required>
            <div class="invalid-feedback">
                <?php echo $sifre_err; ?>
            </div>
            <label for="sifretkr">Şifre Tekrarı</label>
            <input type="password" name="sifretkr" class="form-control is-invalid" placeholder="Şifre Tekrarı" required>
            <div class="invalid-feedback">
                <?php echo $sifretkr_err; ?>
            </div>

            <button type="submit" name="kaydet" id="button">Kayıt Ol</button>
        </form>
        <p>Hesabın var mı? <a href="giris-yap.php">Giriş Yap</a></p>

    </div>
</body>

</html>
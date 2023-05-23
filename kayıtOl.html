<?php
include("baglanti.php");

$name_err = "";
$email_err = "";
$sifre_err = "";
$sifretkr_err = "";
if (isset($_POST["kaydet"])) {


    //Kullanıcı adı doğrulama
    if (empty($_POST["kullanici"])) {
        $name_err = "Kullanıcı adı boş geçilmez";
    } else if (strlen($_POST["kullanici"]) < 6) {
        $name_err = "Kullanıcı adı altı harften boş olamaz";
    } else if (!preg_match('/^[a-z\d_]{5,20}$/i', $_POST["kullanici"])) {
        echo "Sadece harfler ve sayılar kullanınız.";
    } else {
        $name = $_POST["kullanici"];
    }
    //Email Doğrulama
    if (empty($_POST["email"])) {
        $email_err = "Email boş geçilmez";
    } else {
        $email = $_POST["email"];
    }
    //Sifre Doğrulama
    if (empty($_POST["sifre"])) {
        $sifre_err = "Şifre boş geçilmez";
    } else {
        $password = $_POST["sifre"];
    }

    //Parola Tekrar Doğrusu

    if (empty($_POST["sifretkr"])) {
        $sifretkr_err = "Şifre tekraı boş geçilmez";
    } else if ($_POST["sifre"] != $_POST["sifretkr"]) {
        $sifretkr_err = "Şifreler eşleşmiyor";
    } else {
        $sifretkr = $_POST["sifretkr"];
    }





    //Giriş Eylemi
    $name = $_POST["kullanici"];
    $email = $_POST["email"];
    $password = $_POST["sifre"];

    if (isset($name) && isset($email) && isset($password)) {

        $ekle = "INSERT INTO kullanicilar(kullanici, email, sifre) VALUES ('$name','$email','$password')";
        $calistirekle = mysqli_query($baglanti, $ekle);
        if ($calistirekle) {
            echo '<div class="alert alert-succes" role="alert">
  succes it out!
</div>';
        } else {
            echo '<div class="alert alert-alert" role="alert">
   check it out!
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
            <li><a href="neonblog.html" class="links">Anasayfa</a></li>
            <li><a href="#" class="links">Forum</a></li>
            <li><a href="https://www.bandirma.edu.tr/tr/www/Iletisim" class="links">İletişim</a></li>
            <li><a href="giris-yap.php" class="links">Giriş Yap</a></li>
            <li><a href="kaydol.php" class="links">Kayıt Ol</a></li>
        </ul>

    </nav>

    <div class="container">
        <form action="kaydol.php" method="POST">
            <h2>Kaydol</h2>
            <label for=kullanici>Kullanıcı Adı</label>
            <input type="text" name="kullanici" class="form-control is invalid" placeholder="Kullanıcı Adı" required>
            <div class="invalid-feedback">
                <?php
                echo $name_err;
                ?>
            </div>
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control is invalid" placeholder="E-posta" required>
            <div class="invalid-feedback">
                <?php
                echo $email_err;
                ?>
            </div>
            <label for="sifre">Şifre</label>
            <input type="password" name="sifre" class="form-control is invalid" placeholder="Şifre" required>
            <div class="invalid-feedback">
                <?php
                echo $sifre_err;
                ?>
            </div>
            <label for="sifretkr">Şifre Tekrarı</label>
            <input type="password" name="sifretkr" class="form-control is invalid" placeholder="Şifre Tekrarı" required>
            <div class="invalid-feedback">
                <?php
                echo $sifretkr_err;
                ?>
            </div>

            <button type="submit" name="kaydet" id="button">Kayıt Ol</button>
        </form>
        <p>Hesabın var mı? <a href="giris-yap.php">Giriş Yap</a></p>

    </div>
</body>

</html>

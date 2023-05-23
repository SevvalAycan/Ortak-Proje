<?php
include("baglanti.php");

$name_err = "";
$sifre_err = "";
if (isset($_POST["giris"])) {
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
    //Sifre Doğrulama
    if (empty($_POST["sifre"])) {
        $sifre_err = "Şifre boş geçilmez";
    } else {
        $password = $_POST["sifre"];
    }






    //Giriş Eylemi
    $name = $_POST["kullanici"];
    $password = $_POST["sifre"];

    if (isset($name) && isset($password)) {

        $secim = "SELECT * FROM kullanicilar WHERE kullanici ='$name ' ";
        $calistir = mysqli_query($baglanti, $secim);
        $kayitsayisi = mysqli_num_rows($calistir);
        if ($kayitsayisi > 0) {
            $ilgilikayit = mysqli_fetch_assoc($calistir);
            $sifreler = $ilgilikayit["sifre"];

            if (password_verify($parola, $sifreler)) {
                session_start();
                $_SESSION["kullanici"] = $ilgilikayit["kullanici"];
                $_SESSION["email"] = $ilgilikayit["kullanici"];
                header("location:profile.php");
            } else {
                echo '<script>alert("Şifreyi yada Kullanıcı Adını yanlış girdiniz")</script>';
            }
        } else {
            echo '<script>alert("Şifreyi yanlış girdiniz")</script>';
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
            <li><a href="neonblog.html" class="links">Anasayfa</a></li>
            <li><a href="#" class="links">Forum</a></li>
            <li><a href="https://www.bandirma.edu.tr/tr/www/Iletisim" class="links">İletişim</a></li>
            <li><a href="giris-yap.php" class="links">Giriş Yap</a></li>
            <li><a href="kaydol.php" class="links">Kayıt Ol</a></li>
        </ul>

    </nav>

    <div class="container">
        <form action="giris-yap.php" method="POST">
            <h2>Giriş Yap</h2>
            <label for=kullanici>Kullanıcı Adı</label>
            <input type="text" name="kullanici" class="form-control is invalid" placeholder="Kullanıcı Adı" required>
            <div class="invalid-feedback">
                <?php
                echo $name_err;
                ?>
            </div>
            <label for="sifre">Şifre</label>
            <input type="password" name="sifre" class="form-control is invalid" placeholder="Şifre" required>
            <div class="invalid-feedback">
                <?php
                echo $sifre_err;
                ?>
            </div>


            <button type="submit" name="giris" id="button">Giriş Yap</button>
        </form>
        <p>Hesabın yok mu? <a href="kaydol.html">Kaydol</a></p>

    </div>
</body>

</html>

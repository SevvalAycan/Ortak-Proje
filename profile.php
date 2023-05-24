<?php
session_start();
if (isset($_SESSION["kullanici"])) {
    $name = $_SESSION["kullanici"];
    // Örnek kullanıcı bilgileri
    $email = "";
} else {
    // Kullanıcı girişi yapılmamışsa, giriş sayfasına yönlendir
    header("Location: giris-yap.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Giriş Yaptığınız Profil Sayfası</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Hoş Geldiniz,
            <?php echo $name; ?>!
        </h1>
        <p>Profil bilgileriniz:</p>
        <ul>
            <li><strong>Email:</strong>
                <?php echo $email; ?>
            </li>
        </ul>
        <a href="logout.php">Çıkış Yap</a>
    </div>
</body>

</html>

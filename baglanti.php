    <?php

$host="localhost";
$kullanici="root";
$parola="";
$vt="bandirmamühendisliği";

$baglanti = mysqli_connect($host,$kullanici,$parola,$vt) ;
mysqli_set_charset($baglanti, "UTF8");
if (!$baglanti) {
    die("Veritabanı bağlantısı başarısız oldu: " . mysqli_connect_error());
}

?>
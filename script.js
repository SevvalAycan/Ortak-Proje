const blogList = document.querySelector('.blog-list');
const blogItems = document.querySelectorAll('.blog-item');
const leftButton = document.querySelector('.left');
const rightButton = document.querySelector('.right');
let activeIndex = 0;


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

function scroll(direction) {
    const activeItem = document.querySelector('.blog-item.active');
    let distance = 0;

    if (direction === 'left' && activeIndex > 0) {
        // sola kaydır
        activeIndex -= 2;
        distance = activeIndex * (blogItems[0].offsetWidth + 20);
    } else if (direction === 'right' && activeIndex < blogItems.length - 2) {
        // sağa kaydır
        activeIndex += 2;
        distance = activeIndex * (blogItems[0].offsetWidth + 20);
    } else {
        // kaydırma yok
        return;
    }

    // aktif blog öğesini güncelle
    activeItem.classList.remove('active');
    blogItems[activeIndex].classList.add('active');

    // kaydırma animasyonu
    blogList.style.transform = `translateX(-${distance}px)`;
}

// sol ve sağ butonlara tıklama olayları ekle
leftButton.addEventListener('click', () => scroll('left'));
rightButton.addEventListener('click', () => scroll('right'));
var button = document.getElementById("blog-button");

button.addEventListener("click", function () {
    if (!isUserLoggedIn()) {
        alert("Giriş yapmanız gerekiyor!");
    } else {
        // Blog yazısı ekleme işlemleri burada gerçekleştirilir.
        // Blog yazısı ekleme kodları buraya gelecek.
    }
});

var button = document.getElementById("blog-button");

button.addEventListener("click", function () {
    if (!isUserLoggedIn()) {
        window.location.href = "giris-yap.html"; // Giriş yapma ekranının URL'sini buraya yazın
    } else {
        // Blog yazısı ekleme işlemleri burada gerçekleştirilir.
        // Blog yazısı ekleme kodları buraya gelecek.
    }
});

function isUserLoggedIn() {
    // Kullanıcının giriş yapmış olup olmadığını kontrol eden bir fonksiyon.
    // Gerçek kullanıcı oturumu durumunu burada kontrol etmelisiniz.
    // Örneğin, kullanıcının oturum açtığı bir kullanıcı yönetimi sistemi varsa,
    // bu fonksiyon oturum durumunu kontrol etmeli ve doğru değeri döndürmelidir.
    // Eğer kullanıcı giriş yapmışsa true, yapmamışsa false döndürmelidir.
}
button.addEventListener("click", function () {
    window.location.href = "giris-yap.html"; // Yönlendirilecek sayfanın URL'sini buraya yazın
});

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

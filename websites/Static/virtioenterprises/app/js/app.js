// header

window.addEventListener('scroll', (e) => {
    var headerWarp = document.querySelector('header');
    var pagescrolll = this.pageYOffset;
    if (pagescrolll >= 150) {
        headerWarp.classList.add('active');

    }
    else {
        headerWarp.classList.remove('active');
    }
})
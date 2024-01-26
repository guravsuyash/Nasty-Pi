// $(function() {

//     $('[data-toggle="modal"]').hover(function() {
//         var modalId = $(this).data('target');
//         $(modalId).modal('show');

//     });

// });

function linkedin() {
    window.open("https://www.linkedin.com/in/mehul-jadhav-75411a1a6/")
}

function twitter() {
    window.open("https://twitter.com/MehulJadhav13")
}

function github() {
    window.open("https://github.com/JadhavMehul")
}

function facebook() {
    window.open("https://www.facebook.com/mehul.jadhav.7355")
}

function instagram() {
    window.open("https://www.instagram.com/jadhav.mehul/")
}
$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    items: 2,
    autoplay: true,
    autoplayTimeout: 2000,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:2
        }
    }
})
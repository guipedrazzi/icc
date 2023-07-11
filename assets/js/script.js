

// SCROLL TRANSITION OBJECT   
$(document).ready(function() {
AOS.init({
    easing: 'ease-out-back',
    duration: 2000
    })

});



// NAV MENU SCROLL BACKGROUND 
// $(document).ready(function(){
//   $(window).scroll(function(event){
//     var y = $(this).scrollTop();
//     if ( y >= 10 ) {
//       $('.navigation').addClass('nav-transparent').removeClass('nav-color');   
//     } else {
//       $('.navigation').removeClass('nav-transparent').addClass('nav-color');
//     }
//   })
// });


// NAV MENU SCROLL BACKGROUND
$(document).ready(function() {
    $(window).scroll(function () {
        if ($(document).scrollTop() > 30) {
            $('.nav').addClass('affix');
            $('.nav').removeClass('hide-box-shadow');


            $(".button-collapse i svg g g g g path").css('fill', '#0c2758');
            $(".menu-link li a").css('color', '#4c4c4c');
            $(".btn-burger").css('color', '#349895');

            $('.logoicc').css('display', 'block');

        } else {
            
            $('.nav').removeClass('affix');
            $('.nav').addClass('hide-box-shadow');

            $(".btn-burger").css('color', '#fff');
            $(".menu-link li a").css('color', '#fff');

            $('.logoicc').css('display', 'none');

        }
    })
});


//  SLIDER 
  $(document).ready(function(){
    $('.slider').slider();
  });



//  OWL CAROUSEL
var owl = $('.owl-carousel');
owl.owlCarousel({
    items:3,
    loop:true,
    margin:15,   
    autoplay:true,
    autoplayTimeout:4000,
    autoplayHoverPause:true,
         responsive:{
        0:{
            items:1,
            stagePadding: 10
        },
        600:{
            items:2
        },
        780:{
            items:2
        },
        1000:{
            items:3
        },
        1400:{
            items:3
        }
    }
});
$('.play').on('click',function(){
    owl.trigger('play.owl.autoplay',[1000])
})
$('.stop').on('click',function(){
    owl.trigger('stop.owl.autoplay')
});



//  CAROUSEL MATERIALIZE
$('.carousel').carousel({
    padding: 200, 
     dist: 10   
});
autoplay();
function autoplay() {
    $('.carousel').carousel('next');
    setTimeout(autoplay, 4000);
}



// move next carousel
$('.moveNextCarousel').click(function(e){
    e.preventDefault();
    e.stopPropagation();
    $('.carousel').carousel('next');
});

// move prev carousel
$('.movePrevCarousel').click(function(e){
    e.preventDefault();
    e.stopPropagation();
    $('.carousel').carousel('prev');
});


 // Voltar a Página Anterior
function goBack() {
      window.history.go(-1);
    };


// ===== Scroll to Top ==== 
$(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
        $('#return-to-top').fadeIn(200);    // Fade in the arrow
    } else {
        $('#return-to-top').fadeOut(200);   // Else fade out the arrow
    }
});
$('#return-to-top').click(function() {      // When arrow is clicked
    $('body,html').animate({
        scrollTop : 0                       // Scroll to top of body
    }, 500);
});
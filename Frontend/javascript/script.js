var menu = document.querySelector('.noor-menu');
var open = document.querySelector('.open-btn');
var close = document.querySelector('.close-btn');

open.addEventListener("click", () => {
    menu.classList.add('active');
});

close.addEventListener("click", () => {
    menu.classList.remove('active');
});


// destination-script

$(".card").click(function () {
    $(".card").removeClass("active");
    $(this).addClass("active");
});


const navgbar = document.querySelector("#noor-navgbar");

const sticky = navgbar.offsetTop;

console.log(sticky);

window.addEventListener('scroll', () => {
  if(window.pageYOffset > sticky){
    navgbar.classList.add('sticky');
  }else{
    navgbar.classList.remove('sticky');
  }
});

// This is script file

$('.testimonials-container').owlCarousel({
  loop:true,
  autoplay:true,
  autoplayTimeout:5000,
  margin:10,
  nav:true,
  navText:["<i class='fa-solid fa-arrow-left'></i>",
           "<i class='fa-solid fa-arrow-right'></i>"],
  responsive:{
      0:{
          items:1,
          nav:false
      },
      600:{
          items:1,
          nav:true
      },
      768:{
          items:2
      },
  }
});

var TrandingSlider = new Swiper('.tranding-slider', {
  effect: 'coverflow',
  grabCursor: true,
  centeredSlides: true,
  loop: true,
  slidesPerView: 'auto',
  coverflowEffect: {
    rotate: 0,
    stretch: 0,
    depth: 100,
    modifier: 2.5,
  },
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  }
});


// packages-card-slider

var swiper = new Swiper(".slide-container", {
  slidesPerView: 4,
  spaceBetween: 20,
  sliderPerGroup: 4,
  loop: true,
  centerSlide: "true",
  fade: "true",
  grabCursor: "true",
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
    dynamicBullets: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    520: {
      slidesPerView: 2,
    },
    768: {
      slidesPerView: 3,
    },
    1000: {
      slidesPerView: 4,
    },
  },
});



















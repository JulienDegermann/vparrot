

// mobile menu calls through burger menu
$('.menu').click(() => {
  console.log('click')
  $('.header-nav').toggleClass('hidden')
  $('header').toggleClass('hidden')
})



// slick slide comments
$('.comments-slider').slick({
  infinite: true,
  autoplay: true,
  slidesToShow: 3,
  arrows: true,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        arrows: true
      }
    },
    {
      breakpoint: 800,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        arrows: false 
      }
    }
  ]
});
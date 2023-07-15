// slick slide services
$('.show-services').slick({
  infinite: true,
  autoplay: true,
  slidesToShow: 3,
  speed: 1500,
  autoplaySpeed: 3000,
  arrows: false,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
      }
    },
    {
      breakpoint: 520,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
      }
    }
  ]
});

// slick slide comments
$('.comments-slider').slick({
  infinite: true,
  autoplay: true,
  slidesToShow: 3,
  arrows: true,
  slidesToScroll: 1,
  speed: 500,
  autoplaySpeed: 2500,
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
      breakpoint: 520,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        arrows: false
      }
    }
  ]
});
$('#add-comment').click((e) => {
  $('#new-comment').removeClass('hidden');
})

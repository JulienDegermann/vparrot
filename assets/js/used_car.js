// miniatures slider
$('.picture-min').slick({
  infinite: true,
  autoplay: false,
  slidesToShow: 4,
  speed: 1500,
  autoplaySpeed: 3000,
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

$('.picture-min img').each(function () {
  $(this).click(function () {
    console.log($(this).attr('src'))
    $('.main-picture').attr('src', ($(this).attr('src')))
  });
});


$('#form_call').click(() => {
  $('.form_wrapper').toggleClass('hidden');
})

// miniatures slider
$('.picture-min').slick({
  infinite: true,
  autoplay: false,
  slidesToShow: 4,
  speed: 1500,
  autoplaySpeed: 3000,
  arrows: true,
  slidesToScroll: 1,
});


$('.picture-min img').each(function () {
  $(this).click(function () {
    console.log($(this).attr('src'))
    $('.main-picture').attr('src', ($(this).attr('src')))
  });
});


$('#form_call, .close').click(() => {
  $('.form_wrapper').toggleClass('hidden');
})

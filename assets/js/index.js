console.log('index.js')
// mobile menu calls through burger menu
$('.menu').click(() => {
  console.log('click')
  $('.header-nav').toggleClass('hidden')
  $('header').toggleClass('hidden')
})
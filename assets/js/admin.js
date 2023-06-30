





//.each((element) => {
//$('.admin-nav li').each((element) => {
//console.log(element.addClass('bonjour'));
//this.element.hasClass('active') ? $('#'+element.attr('id')+'-display').addClass('active') : null;
//})


$('.admin-nav li').each(function () {
  $(this).click(function () {
    $('.admin-nav li').removeClass('active'); 
    $(this).addClass('active');

    $('#display').removeClass('garage employee comments messages');
    $('#display').addClass(($(this).attr('id')));
  });
});

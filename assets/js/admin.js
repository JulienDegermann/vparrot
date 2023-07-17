
// activate each section while clicking aside link
$('.admin-nav li').each(function () {
  $(this).click(function () {
    $('.admin-nav li').removeClass('active');
    $(this).addClass('active');

    $('#display').removeClass('garage employee comments messages cars');
    $('#display').addClass(($(this).attr('id')));
  });
});

// set variables
let lastActivity = new Date().getTime();
let delayTime = 1000 * 60 * 15;
let autoLogout;

// check if delay > lastActivity
setInterval(() => {
  autoLogout = new Date().getTime() - lastActivity > delayTime ? logout() : null;
}, 1000)


function logout() {
  fetch('../logout.php', {
    method: 'POST'
  })
    .then(response => {
      // La session est détruite, vous pouvez rediriger l'utilisateur vers la page de connexion ou effectuer d'autres actions appropriées
      window.location.href = 'login.php';
    })
    .catch(error => {
      console.log('Une erreur s\'est produite lors de la déconnexion :', error);
    });
}
// !!! call fonction without () : direct call instead
$('#logout').click(logout);


// setTimeout(logout, 60 * 1000);
function update() {
  lastActivity = new Date().getTime();
}

$('aside li').click(() => {
  update();
})


$('input[type="time"]').each(() => {
  min = '06:00';
  max = '21:00' 
  $(this).on('input', function () {
    const selectedTime = this.value;
    const isValidTime = selectedTime >= min && selectedTime <= max;

    if (!isValidTime) {
      this.value = '';
    }
  })
})
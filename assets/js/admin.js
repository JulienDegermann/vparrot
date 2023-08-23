
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
      window.location.href = 'login.php';
      alert('Vous êtes déconnecté');
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
// --------------------------------------------------------------------------------------------------------------- FOCUS
// $('.editemployee').each(function () {
//   $(this).click(function () {
//     let id = $(this).attr('id')
//     urlEdit = 'config/update_employee.php?id=' + id;
//     fetch(urlEdit, { method: 'POST' })
//       .then(response => {
//         console.log(response); // Vérifiez si response contient les données
//         let data = response.json();
//         console.log(data);
//       })
//       .then(data => {
//         console.log("data", data);
//       })
//       .catch(error => {
//         console.log('il y a une erreur : ' + error)
//       })
//   $('.modal_employee.hidden').removeClass('hidden');
//     $('.modal_employee input').each(function () {
//       $(this).val(id);
//     });
//   })
// })
// --------------------------------------------------------------------------------------------------------------- FOCUS


$('.deleteemployee').each(function () {
  $(this).click(function () {
    urlDelete = 'config/employee_delete.php?id=' + $(this).attr('id')
    fetch(urlDelete, {
      method: 'POST'
    })
      .then(response => {
        window.location.href = 'admin.php';
        alert('compte supprimé');
      })
      .catch(error => {
        console.log('il y a une erreur : ' + error)
      })
  })
})
// -------------------------------------------------------------- COMMENTS FETCH
$('.cancel').each(function () {
  $(this).click(function () {
    urlEdit = 'config/comment_delete.php?id=' + $(this).attr('id')
    console.log(urlEdit);

    fetch(urlEdit, {
      method: 'POST'
    })
      .then(response => {
        window.location.href = 'admin.php';
        alert('le commentaire a été supprimé de la base de données');
      })
      .catch(error => {
        console.log('il y a une erreur : ' + error)
      })
  })
})
$('.save').each(function () {
  $(this).click(function () {
    urlEdit = 'config/comment_save.php?id=' + $(this).attr('id')
    console.log(urlEdit);

    fetch(urlEdit, {
      method: 'POST'
    })
      .then(response => {
        window.location.href = 'admin.php';
        alert('le commentaire a été validé avec succès');
      })
      .catch(error => {
        console.log('il y a une erreur : ' + error)
      })
  })
})
// ------------------------------------------------------------- MESSGAGES FETCH
$('.message-delete').each(function () {
  $(this).click(function () {
    urlEdit = 'config/message_delete.php?id=' + $(this).attr('id')
    console.log(urlEdit);
    fetch(urlEdit, {
      method: 'POST'
    })
      .then(response => {
        window.location.href = 'admin.php';
        alert('le message a été supprimé avec succès');
      })
      .catch(error => {
        console.log('il y a une erreur : ' + error)
      })
  })
})
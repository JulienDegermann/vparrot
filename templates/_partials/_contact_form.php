<h3>Formulaire de contact</h3>
<!-- <form action="config/contact_form_config.php" method="post"> -->
<form method="post">
  <?php
  // get id from URL if form from car page
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $car = get_car_by_id($bdd, $id);
    $title =  $car['brand'] . ' ' . $car['model'] . ' ' . $car['price'].'€';
  }
  ?>
  <input type="hidden" name="title" id="title" value="<?= isset($title) ? $title : null; ?>">
  <label for="message_first_name">
    <input type="text" name="message_first_name" id="message_first_name" placeholder="Votre prénom">
  </label>
  <label for="message_last_name">
    <input type="text" name="message_last_name" id="message_last_name" placeholder="Votre nom">
  </label>
  <label for="message_email">
    <input type="email" name="message_email" id="message_email" placeholder="Votre email">
  </label>
  <label for="message_phone">
    <input type="tel" name="message_phone" id="message_phone" maxlength="10" minlength="10" placeholder="Votre téléphone">
  </label>
  <label for="message_message">
    <textarea name="message_message" id="message_message" cols="30" rows="10" placeholder="Votre message…"></textarea>
  </label>
  <label for="message_tos" class="tos">
    <input type="checkbox" id="message_tos" name="message_tos">
    J'accepte les <a href="#">conditions générales d'utilisation</a>
  </label>
  <input class="button" type="submit" value="Envoyer" name="send_message">
</form>
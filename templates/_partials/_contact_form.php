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
  <label for="first_name">
    <input type="text" name="first_name" id="first_name" placeholder="Votre prénom">
  </label>
  <label for="last_name">
    <input type="text" name="last_name" id="last_name" placeholder="Votre nom">
  </label>
  <label for="email">
    <input type="email" name="email" id="email" placeholder="Votre email">
  </label>
  <label for="tel">
    <input type="tel" name="tel" id="tel" maxlength="10" minlength="10" placeholder="Votre téléphone">
  </label>
  <label for="message">
    <textarea name="message" id="message" cols="30" rows="10" placeholder="Votre message…"></textarea>
  </label>
  <label for="TOS" class="tos">
    <input type="checkbox" id="TOS" name="TOS">
    J'accepte les <a href="#">conditions générales d'utilisation</a>
  </label>
  <input class="button" type="submit" value="Envoyer" name="send_message">
</form>

<form action="" method="post">
  <label for="first-name">
    <input type="text" name="first-name" id="first-name" placeholder="Votre prénom">
  </label>
  <label for="last-name">
    <input type="text" name="last-name" id="last-name" placeholder="Votre nom">
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
  <input class="button" type="submit" value="Enoyer">
</form
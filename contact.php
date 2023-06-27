<!-- --------------------------------------------------------- PHP FUNCTIONS -->
<!-- PAGE NAME -->
<?php $current_page = 'contact'; ?>

<!-- ----------------------------------------------------------- HEADER CALL -->
<?php require_once 'templates/header.php'; ?>

<!-- ----------------------------------------------------------- CONTACT.PHP -->

<section id="section-1">

  <div class="container">
    <div class="row">
      <h1>nous contacter</h1>

      <div class="bloc-2">
        <address>
          <p>
            <strong>
              Garage V. PARROT
            </strong> <br>
            239 Rue des Fontaines <br>
            31300 Toulouse
          </p>
        </address>
          <a href="tel:0581234567" class="phone">05 81 23 45 67</a>

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d34330.92974007327!2d1.3936229909978515!3d43.57037792989938!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12aebb1b856f137b%3A0x5954fadaefb6da7d!2sCitro%C3%ABn%20GARAGE%20VAUTOUR!5e0!3m2!1sfr!2sfr!4v1687701591237!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
      <div class="bloc-2">
        <form action="page.php" method="post">
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
        </form>
      </div>
    </div>
  </div>

</section>
<!-- ----------------------------------------------------------- FOOTER CALL -->
<?php require_once 'templates/footer.php'; ?>
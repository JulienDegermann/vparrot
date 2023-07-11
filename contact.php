<!-- --------------------------------------------------------- PHP FUNCTIONS -->
<!-- PAGE NAME -->
<?php $current_page = 'contact'; ?>
<?php require_once 'lib/workshop_datas.php'; ?>

<!-- ----------------------------------------------------------- HEADER CALL -->
<?php require_once 'templates/header.php'; ?>

<!-- ----------------------------------------------------------- CONTACT.PHP -->

<section id="section-1">

  <div class="container">
    <div class="row">
      <h1>nous contacter</h1>
      <div class="bloc-2">
        <?php echo address($address_input); ?>
        <a href="tel:<?php echo $phone; ?>" class="phone"><?php echo $phone; ?></a>

        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d184906.80584344934!2d1.410156!3d43.60302600000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12aebb1b856f137b%3A0x5954fadaefb6da7d!2sCitro%C3%ABn%20GARAGE%20VAUTOUR!5e0!3m2!1sfr!2sfr!4v1688311474067!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
      <div class="bloc-2">
        <?php require_once 'templates/contact_form.php'; ?>
      </div>
    </div>
  </div>

</section>
<!-- ----------------------------------------------------------- FOOTER CALL -->
<?php require_once 'templates/footer.php'; ?>
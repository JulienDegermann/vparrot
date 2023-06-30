<!----------------------------------------------------------------- MAIN END -->
<?php require_once 'lib/workshop_datas.php'; ?>
<!------------------------------------------------------------- FOOTER START -->
<footer>
  <div class="container">
    <div class="row">

      <div class="planning">
        <h2>Horaires d'ouverture</h2>

        <?php
        foreach ($hours as $key => $hour) {
          if ($hour['am_opening'] === null && $hour['am_closure'] === null) {
            $am = 'fermé';
          } else {
            $am = $hour['am_opening'] . ' - ' . $hour['am_closure'];
          };
          if ($hour['pm_opening'] === null && $hour['pm_closure'] === null) {
            $pm = 'fermé';
          } else {
            $pm = $hour['pm_opening'] . ' - ' . $hour['pm_closure'];
          };
          if ($am === 'fermé' && $pm === 'fermé') {
            $day = $key . ' : fermé';
          } else {
            $day = $key . ' : ' . $am . ' // ' . $pm;
          };
        ?>
          <p>
            <?php echo $day; ?>
          </p>
        <?php }; ?>
      </div>

      <div class="copyrights">
        <p>
          <a href="">mentions légales</a> -
          <a href="">politique de confidentialité</a> -
          &copy; Julien Degermann 2023
        </p>
      </div>

      <div class="contact">
        <a href="contact.php" class="button contact-button">
          Contactez-nous
          <a href="tel:<?php echo $phone; ?>" class="phone"><?php echo $phone; ?></a>
      </div>
    </div>
  </div>
</footer>
<!--------------------------------------------------------------- FOOTER END -->


<!------------------------------------------------------------ SCRIPTS CALLS -->
<!-- jQuery -->
<script src="assets/js/jQuery_v3.7.0.js"></script>
<!-- Slick JS (sliders) -->
<script type="text/javascript" src="assets/js/slick-1.8.1/slick/slick.min.js"></script>
<!--  -->
<script src="assets/js/index.js"></script>
<!-- page scpecific JS -->
<script src="assets/js/<?php echo $current_page ?>.js"></script>

</body>

</html>
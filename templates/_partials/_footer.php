<!----------------------------------------------------------------- MAIN END -->

<!------------------------------------------------------------- FOOTER START -->
</main>
<footer>
  <div class="container">
    <div class="row">

      <div class="planning">
        <h2>Horaires d'ouverture</h2>

        <?php
        // $req = "SELECT * FROM openings ;";
        $openings = get_openings($bdd);
        foreach ($openings as $opening) {

          $am_opening = date('H:i', strtotime($opening['am_opening']));
          $am_closure = date('H:i', strtotime($opening['am_closure']));
          $pm_opening = date('H:i', strtotime($opening['pm_opening']));
          $pm_closure = date('H:i', strtotime($opening['pm_closure']));

          if ($am_opening === $am_closure && $pm_opening === $pm_closure) {
            echo $opening['day'] . ' : fermé <br>';
          } elseif ($am_opening === $am_closure) {
            echo $opening['day'] . ' : fermé // ' . $pm_opening . ' - ' .  $pm_closure . '<br>';
          } elseif ($pm_opening === $pm_closure) {
            echo $opening['day'] . ' : ' . $am_opening . ' - ' .  $am_closure . ' // fermé <br>';
          } else {
            echo $opening['day'] . ' : ' . $am_opening . ' - ' .  $am_closure . ' // ' . $pm_opening . ' - ' .  $pm_closure . '<br>';
          }
        }
        ?>
      </div>

      <div class="copyrights">
        <p>
          <a href="legal_notice.php">mentions légales</a> -
          <a href="privacy_policy.php">politique de confidentialité</a> <br>
          &copy; Julien Degermann 2023
        </p>
      </div>

      <div class="contact">
        <a href="contact.php" class="button contact-button">
          Contactez-nous
          <a href="tel:<?= $company['phone']; ?>" class="phone"><?= $company['phone']; ?></a>
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
<?php
if (file_exists("assets/js/$current_page.js")) :
  echo '<script src="assets/js/' . $current_page . '.js"></script>';
endif;
?>

</body>

</html>
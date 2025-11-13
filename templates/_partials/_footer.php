<!----------------------------------------------------------------- MAIN END -->

<!------------------------------------------------------------- FOOTER START -->
</main>
<footer>
  <div class="container">
    <div class="row">
      <div class="planning">
        <h2>Horaires d'ouverture</h2>


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
          <a href="tel:01938421" class="phone">01938421</a>
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
<!-- page scpecific JS -->
<?php
if (file_exists("assets/js/$current_page.js")) :
  echo '<script src="assets/js/' . $current_page . '.js"></script>';
endif;
?>
<script src="assets/js/index.js" type="module"></script>


</body>

</html>
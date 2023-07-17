<!-- --------------------------------------------------------- PHP FUNCTIONS -->
<!-- PAGE NAME -->
<?php
$current_page = 'home';
$current_pageFR = 'Accueil';
require_once 'classes/class_comments.php';
require_once 'lib/workshop_datas.php';
?>

<!-- ----------------------------------------------------------------------- -->

<!-- ----------------------------------------------------------- HEADER CALL -->
<?php require_once 'templates/header.php';
require_once 'lib/users.php';
?>

<!-- -------------------------------------------------------------- HOME.PHP -->
<!-- ------------------------------------------------------ SERVICES SECTION -->
<section id="section-1">
  <!-- HERO BANNER BACKGROUND -->
  <!-- <figure> -->
  <img src="assets/images/pictures/repair.jpeg" alt="hero banner">
  <!-- </figure> -->
  <div class="container">
    <div class="row">
      <h1>
        15 ans d'expertise
      </h1>
      <div class="show-services">
        <?php
        $req = "SELECT * FROM services;";
        foreach ($bdd->query($req) as $service) {
        ?>

          <div class="services">
            <h2><?= $service['title']; ?></h2>
            <ul>
              <?php
              $contents = json_decode($service['content']);
              foreach ($contents as $content) { ?>
                <li><?= $content; ?> </li>
              <?php
              }
              ?>
            </ul>

            <?php if ($service['title'] == 'Véhicules d\'occasion') { ?>
              <a class="button" href="used_cars.php">Nos occasions</a>

            <?php } else { ?>
              <a class="button" href="contact.php">Demander un devis</a>
            <?php } ?>
          </div>
        <?php }
        ?>
      </div>
      <?php //$bdd = null; ?>
    </div>
  </div>
</section>
<!-- ----------------------------------------------------------------------- -->

<!-- ------------------------------------------------------ COMMENTS SECTION -->
<section id="section-2">
  <div class="container">
    <div class="row">
      <h2>Votre avis compte</h2> <br>
      <button type="button" id="add-comment">ajoutez-le</button>

      <div class=" comments-slider">
        <?php
        foreach ($users['client'] as $user) {


          $current_comment = new Comments($user['id'], $user['first_name'], $user['note']['note'], $user['note']['comment']);
          $current_comment->display_item();
        ?>
          <div class="comment">
            <h3 class="comment-title">
              <?php echo $user['first_name'] . ' ' .  $user['last_name'] ?>
            </h3>
            <div class="comment-note">

              <?php
              for ($i = 1; $i <= $user['note']['note']; $i++) {
                require 'assets/images/icons/star-filled.svg';
              };
              for ($i = 0; $i < (5 - $user['note']['note']); $i++) {
                require 'assets/images/icons/star.svg';
              }; ?>
            </div>
            <p class="comment-text">
              <?= $user['note']['comment']; ?>
            </p>
          </div>

        <?php
        };
        ?>
      </div>
    </div>
    <div id="new-comment" class="row hidden">
      <h2>Ajouter un commentaire</h2>

      <form action="config/comment_config.php" method="post">
        <label for="name">Votre nom :
          <input type="text" id="name" name="name">
        </label>
        <fieldset>
          <legend>Note :</legend>
          <label for="1">1
            <input type="radio" id="1" name="note" value="1">
          </label>
          <label for="2">2
            <input type="radio" id="2" name="note" value="2">
          </label>
          <label for="3">3
            <input type="radio" id="3" name="note" value="3">
          </label>
          <label for="4">4
            <input type="radio" id="4" name="note" value="4">
          </label>
          <label for="5">5
            <input type="radio" id="5" name="note" value="5">
          </label>

          </label>
        </fieldset>

        <label for="comment">Commentaire :
          <textarea name="comment" id="comment" placeholder="Votre commentaire…"></textarea>
        </label>
        <input type="submit" class="button" value="Envoyer">
      </form>
    </div>

  </div>
</section>
<!-- ----------------------------------------------------------------------- -->

<!-- ----------------------------------------------------------- FOOTER CALL -->
<?php require_once 'templates/footer.php'; ?>
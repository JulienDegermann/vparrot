<!-- --------------------------------------------------------- PHP FUNCTIONS -->
<!-- PAGE NAME -->
<?php $current_page = 'home' ?>

<!-- ----------------------------------------------------------------------- -->

<!-- ----------------------------------------------------------- HEADER CALL -->
<?php require_once 'templates/header.php' ?>

<!-- ------------------------------------------------------ SERVICES SECTION -->
<section id="section-1">
  <!-- HERO BANNER BACKGROUND -->
  <!-- <figure> -->
  <img src="assets/images/pictures/car.jpeg" alt="hero banner">
  <!-- </figure> -->
  <div class="container">
    <div class="row">
      <h1>
        15 ans d'expertise
      </h1>
      <div class="show-services">
        <div class="services">
          <h2>Réparation</h2>
          <ul>
            <li>Moteur</li>
            <li>Embrayage & boite de vitesses</li>
            <li>Carrosserie</li>
            <li>Diagnostic</li>
            <li>Pièces neuves ou reconditionnées</li>

          </ul>
          <a class="workshop button" ref="workshop.php">Demander un devis</a>

        </div>
        <div class="services">
          <h2>Entretien</h2>
          <ul>
            <li>Pneus</li>
            <li>Révision</li>
            <li>Freinage</li>
            <li>Vidange</li>
            <li>Climatisation</li>

          </ul>
          <a class="workshop button" a href="workshop.php">Demander un devis</a>

        </div>
        <div class="services">
          <h2>Véhicules d'occasion</h2>
          <ul>
            <li>Véhicules particuliers & utilitaires</li>
            <li>Véhicules révisés</li>
            <li>Garantie jusqu'à 12 mois</li>
          </ul>
          <a class="workshop button" href="used_cars.php">Nos véhicules d'occasion</a>

        </div>
      </div>

    </div>
  </div>
</section>
<!-- ----------------------------------------------------------------------- -->

<!-- ------------------------------------------------------ COMMENTS SECTION -->
<section id="section-2">
  <div class="container">
    <div class="row">
      <!-- 
        NOTE THANKS TO JS OR PHP
        note = x;
          .note-element.append(star-filled x X)
          AND
          .note-element.append(star x 5-X)
        }
      -->
      <div class="comments-slider">
        <?php
        $notes = [
          [
            'name' => 'John',
            'note' => 5,
            'comment' => 'je suis très content'
          ],
          [
            'name' => 'John',
            'note' => 5,
            'comment' => 'je suis très content'
          ],
          [
            'name' => 'John',
            'note' => 5,
            'comment' => 'je suis très content'
          ],
          [
            'name' => 'Doe',
            'note' => 3,
            'comment' => 'je suis content'
          ]
          ];
        foreach($notes as $note) {
          ?>
          <div class="comment">
          <h3 class="comment-title"><?php echo $note['name']?></h 3>
          <div class="comment-note">
            <?php require 'assets/images/icons/star-filled.svg' ?>
            <?php require 'assets/images/icons/star-filled.svg' ?>
            <?php require 'assets/images/icons/star.svg' ?>
            <?php require 'assets/images/icons/star.svg' ?>
            <?php require 'assets/images/icons/star.svg' ?>
          </div>
          <p class="comment-text">
          <?php echo $note['comment']?>
          </p>
        </div>

      <?php 
        }
        ?>
      </div>
    </div>
  </div>
</section>
<!-- ----------------------------------------------------------------------- -->

<!-- ----------------------------------------------------------- FOOTER CALL -->
<?php require_once 'templates/footer.php' ?>
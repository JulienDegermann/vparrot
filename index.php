<!-- --------------------------------------------------------- PHP FUNCTIONS -->
<!-- PAGE NAME -->
<?php $current_page = 'home'; ?>

<!-- ----------------------------------------------------------------------- -->

<!-- ----------------------------------------------------------- HEADER CALL -->
<?php require_once 'templates/header.php'; ?>

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
        <div class="services">
          <h2>Réparation</h2>
          <ul>
            <li>Moteur</li>
            <li>Embrayage & boite de vitesses</li>
            <li>Carrosserie</li>
            <li>Diagnostic</li>
            <li>Pièces neuves ou reconditionnées</li>

          </ul>
          <a class="button" href="http://localhost:8888/pages/contact.php">Demander un devis</a>


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
          <a class="button" href="http://localhost:8888/pages/contact.php">Demander un devis</a>

        </div>
        <div class="services">
          <h2>Véhicules d'occasion</h2>
          <ul>
            <li>Véhicules particuliers & utilitaires</li>
            <li>Véhicules révisés</li>
            <li>Garantie jusqu'à 12 mois</li>
          </ul>
          <a class="button" href="http://localhost:8888/pages/used_cars.php">Nos véhicules d'occasion</a>

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
      <div class="comments-slider">
        <?php
        $notes = [
          [
            'name' => 'John',
            'note' => 5,
            'comment' => 'Garage au top du top !!'
          ],
          [
            'name' => 'Patrice',
            'note' => 4,
            'comment' => 'Réactif et prix dans la moyenne'
          ],
          [
            'name' => 'Martine',
            'note' => 3,
            'comment' => 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa100aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa200'
          ],
          [
            'name' => 'Alfred',
            'note' => 2,
            'comment' => 'Compétent mais désagréable, dommage'
          ],
          [
            'name' => 'Barbie',
            'note' => 1,
            'comment' => 'Comportement déplacé et regard pesant…'
          ],
          [
            'name' => 'Ken',
            'note' => 0,
            'comment' => 'Le personnel n\'a pas arrêté de reluquer ma copine !!'
          ]
        ];
        foreach ($notes as $note) {
        ?>
          <div class="comment">
            <h3 class="comment-title"><?php echo $note['name'] ?></h 3>
              <div class="comment-note">

                <?php
                for ($i = 1; $i <= $note['note']; $i++) {
                  require 'assets/images/icons/star-filled.svg';
                };
                for ($i = 0; $i < (5 - $note['note']); $i++) {
                  require 'assets/images/icons/star.svg';
                }; ?>
              </div>
              <p class="comment-text">
                <?php echo $note['comment']; ?>
              </p>
          </div>

        <?php
        };
        ?>
      </div>
    </div>
  </div>
</section>
<!-- ----------------------------------------------------------------------- -->

<!-- ----------------------------------------------------------- FOOTER CALL -->
<?php require_once 'templates/footer.php'; ?>
<section id="section-1">
  <div class="container">
    <div class="car-ad">
      <a href="/nos-vehicules">
        <?php require 'assets/images/icons/arrow_prev.svg'; ?>
        retour
      </a>

      <div class="car-ad-images">
        <?php
        if (count($car['images']) > 0) {
          foreach ($car['images'] as $image) { ?>
            <img
              src="<?= UPLOADS_DIR . '/images/' . $image; ?>"
              class="car-add-image"
              alt="">

        <?php }
        } ?>
      </div>
      <div class="car-description">
        <h2 class="car-ad-title"><?= $car['brand'] . ' ' . $car['model']; ?></h2>
        <p>Marque : <?= $car['brand'] ?></p>
        <p>Modèle : <?= $car['model'] ?></p>
        <p>Année : <?= $car['year'] ?></p>
        <p>Kilométrage : <?= $car['mileage'] ?> kms</p>
        <p>Prix : <?= $car['price'] ?> €</p>
      </div>
    </div>
    <div class="row">
      <?php

      $pictures = get_all_pictures($bdd, $id);
      $carObject = new Cars($car['id'], $car['brand'], $car['model'], $car['mileage'], $car['year'], $car['energy'], $car['price'], $car['file_name']);
      $carObject->display_item();

      ?>
    </div>
    <div class="form_wrapper hidden">
      <button type="button" class="close"> <?php include_once 'assets/images/icons/close.svg'; ?></button>
      <?php require_once 'templates/contact_form.php'; ?>
    </div>
  </div>
</section>
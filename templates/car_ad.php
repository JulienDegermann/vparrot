<h1><?= $this->brand . ' ' . $this->model; ?></h1>
<div class="bloc-2">
  <?php
  foreach ($this->pictures as $picture) {
    if ($picture['is_main']) { ?>
      <img class="main-picture" src="<?= 'uploads/images/' . $picture['file_name'] ?>" alt="image principale de">
  <?php }
  } ?>
  <div class="picture-min">
    <?php
    if (count($this->pictures) > 1) {
      foreach ($this->pictures as $picture) { ?>
        <img src="<?= 'uploads/images/' . $picture['file_name'] ?>" alt="image principale de">
    <?php }
    }
    ?>
  </div>
</div>
<div class="bloc-2">
  <h2>Informations sur le véhicule</h2>
  <p>Marque: <?= $this->brand; ?></p>
  <p>Modèle: <?= $this->model; ?></p>
  <p>Année de 1ère mise en cicrulation: <?= $this->year; ?></p>
  <p>Carburant: <?= $this->energy; ?></p>
  <p>Kilométrage: <?= $this->mileage; ?> kms</p>
  <p>Prix: <?= $this->price; ?> €</p>
  
  <button id="form_call" type="button" class="button">Nous contacter</button>
</div>
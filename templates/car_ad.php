<h1><?= $this->brand . ' ' . $this->model; ?></h1>
<div class="bloc-2">
  <img class="main-picture" src="<?= _UPLOAD_IMAGES_ . $this->pictures; ?>" alt="image principale de">
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
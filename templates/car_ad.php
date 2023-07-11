<h1><?= $this->brand . ' ' . $this->model; ?></h1>


<div class="bloc-2">
  <img class="main-picture" src="<?= _CAR_IMAGE_PATH_ . $this->id . $this->brand . $this->model . '0.jpeg'; ?>" alt="image principale de <?= $this->brand . ' ' . $this->model; ?>">
  <div class="picture-min">
    <img src="<?= _CAR_IMAGE_PATH_ . $this->id . $this->brand . $this->model . '0.jpeg'; ?>" alt="image principale de <?= $this->brand . ' ' . $this->model; ?>">
    <img src="<?= _CAR_IMAGE_PATH_ . $this->id . $this->brand . $this->model . '1.jpeg'; ?>" alt="image principale de <?= $this->brand . ' ' . $this->model; ?>">
    <img src="<?= _CAR_IMAGE_PATH_ . $this->id . $this->brand . $this->model . '2.jpeg'; ?>" alt="image principale de <?= $this->brand . ' ' . $this->model; ?>">
    <img src="<?= _CAR_IMAGE_PATH_ . $this->id . $this->brand . $this->model . '3.jpeg'; ?>" alt="image principale de <?= $this->brand . ' ' . $this->model; ?>">
  </div>
</div>
<div class="bloc-2">
<h2>Informations sur le véhciule</h2>
<p>Marque: <?= $this->brand;?></p>
<p>Modèle: <?= $this->model;?></p>
<p>Année de 1ère mise en cicrulation: <?= $this->year;?></p>
<p>Carburant: <?= $this->energy;?></p>
<p>Kilométrage: <?= $this->mileage;?> kms</p>
<p>Prix: <?= $this->price;?> €</p>

<!-- <p>Informations complémentaires: <?//= $this->more;?></p> -->


<button id="form_call" type="button" class="button">Nous contacter</button>
</div>
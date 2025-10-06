<a
  class="car-vignette"
  href="/nos-vehicules/<?= $car['id'] ?? 1 ?>">

  <?php
  if (isset($car['id'])) {
  ?>
    <div class="img">
      <img src="<?= _UPLOAD_IMAGES_ . $car->pictures; ?>" alt="photo <?= $car->brand . ' ' . $car->model; ?>">
    </div>

    <div>
      <ul>
        <li>Année: <?= $car->year; ?></li>
        <li>Kilométrage: <?= $car->mileage; ?> kms</li>
        <li class="price"><?= $car->price; ?> €</li>
      </ul>
      <a href="/nos-vehicules/<?= $car->id ?>" class="button">+ d'infos</a>

    </div>
  <?php }
  ?>
  <img class="img" src="/uploads/images/2VolkswagenGolf0.jpeg" alt="photo <?= $car['brand'] . ' ' . $car['model']; ?>">


  <div class="text">
    <h2><?= $car['brand'] . " " . $car['model']; ?></h2>
  </div>
</a>
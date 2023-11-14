<div class="car-vignette">
  <div class="img">
    <img src="<?= _UPLOAD_IMAGES_ . $this->pictures; ?>" alt="photo <?= $this->brand . ' ' . $this->model; ?>">
  </div>
  <div class="text">
    <h2><?php echo $this->brand . " " . $this->model; ?></h2>
    <div>
      <ul>
        <li>Année: <?php echo $this->year; ?></li>
        <li>Kilométrage: <?php echo $this->mileage; ?> kms</li>
        <li class="price"><?php echo $this->price; ?> €</li>
      </ul>
      <a href="used_car.php?id=<?php echo $this->id ?>" class="button">+ d'infos</a>

    </div>
  </div>
</div>
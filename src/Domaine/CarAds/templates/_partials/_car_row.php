<a
  href=""
  style="text-decoration: none; color: inherit;"
  title="<?= htmlspecialchars($car['brand']) . ' ' . htmlspecialchars($car['model']) ?>"
  class="car-vignette">
  <!-- 
  <div class="img">
    <img src="<? //= _UPLOAD_IMAGES_ . $car->pictures; 
              ?>" alt="photo <? //= $car->brand . ' ' . $car->model; 
                              ?>">
  </div>
  -->
  <div class="text">
    <h2><?php echo $car['brand'] . " " . $car['model']; ?></h2>
    <div>
      <ul>
        <li>Année: <?php echo $car['year']; ?></li>
      </ul>
      <li>Kilométrage: <?php echo $car['mileage']; ?> kms</li>
      <li class="price"><?php echo $car['price']; ?> €</li>
    </div>
  </div>
</a>
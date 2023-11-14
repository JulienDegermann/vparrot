  <tr>
    <td><?= $this->brand; ?></td>
    <td><?= $this->model; ?></td>
    <td><?= $this->year; ?></td>
    <td><?= $this->mileage; ?> kms</td>
    <td><?= $this->price; ?> €</td>
    <td><img src="<?= _UPLOAD_IMAGES_ . $this->pictures; ?>" alt=""></td>
    <td class="center">
      <a href="admin.php?admin=cars-update-<?= $this->id; ?>">
        <?php require 'assets/images/icons/edit.svg' ?>
      </a>
      <a href="admin.php?admin=cars-delete-<?= $this->id; ?>">
        <?php require 'assets/images/icons/cancel.svg'; ?>
      </a>
    </td>
  </tr>
  <tr>
    <td><?= $this->brand; ?></td>
    <td><?= $this->model; ?></td>
    <td><?= $this->year; ?></td>
    <td><?= $this->mileage; ?> kms</td>
    <td><?= $this->price; ?> €</td>
    <td>
      <?php
      foreach ($this->pictures as $picture) {
        if ($picture['is_main']) {
      ?>
          <img src="uploads/images/<?= $picture['file_name']; ?>" alt="">
      <?php }
      };
      ?>
    </td>
    <!-- <td>Photos</td> -->
    <!-- add filled icon on :hover : JS mouseenter -->
    <td class="center">
      <span class="update-car" id="updatecar-<?= $this->id; ?>"><?php require 'assets/images/icons/edit.svg' ?></span>
      <a href="admin.php?admin=cars-delete-<?= $this->id; ?>">
      <?php require 'assets/images/icons/cancel.svg'; ?>
    </a>
    </td>
  </tr>
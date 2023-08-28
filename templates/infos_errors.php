<div class="container">
      <?php
      foreach ($errors as $error) { ?>
        <div class="error">
          <?= $error; ?>
        </div>
      <?php }
      foreach ($infos as $info) { ?>

        <div class="info">
          <?= $info; ?>
        </div>
      <?php } ?>

    </div>
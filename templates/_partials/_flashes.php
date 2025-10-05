<div class="container">
  <?php
  foreach ($flashes as $flash) { ?>
    <div class="flash <?= $flash['type'] ?>">
      <?= $flash['message']; ?>
    </div>
  <?php } ?>
</div>
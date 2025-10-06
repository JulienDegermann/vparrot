<div class="flash-wrapper">
  <?php
  foreach ($flashes as $flash) { ?>
    <div class="flash <?= $flash['type'] ?>">
      <?= $flash['message']; ?>
    </div>
  <?php } ?>
</div>
<?php // for display in index.php => slick

?>
<div class="comment">
  <h3 class="comment-title">
    <?= $this->name; ?>
  </h3>
  <div class="comment-note">
    <?php
    for ($i = 1; $i <= $this->note; $i++) {
      require 'assets/images/icons/star-filled.svg';
    };
    for ($i = 0; $i < (5 - $this->note); $i++) {
      require 'assets/images/icons/star.svg';
    }; ?>
  </div>
  <p class="comment-text">
    <?= $this->comment; ?>
  </p>
</div>
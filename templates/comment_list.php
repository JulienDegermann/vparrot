<?php // for comments display in admin view (table)
?>

<tr>
  <td><?= $this->first_name . ' ' . $this->last_name; ?></td>
  <!-- add filled icon on :hover : JS mouseenter -->
  <td class="center"><?= $this->note ?></td>
  <td><?= $this->comment; ?></td>
  <td class="center">

    <a href="admin.php?admin=comments-validate-<?= $this->id; ?>">
      <?php require 'assets/images/icons/checked.svg'; ?></span>
    </a>
    <a href="admin.php?admin=comments-delete-<?= $this->id; ?>">
      <?php require 'assets/images/icons/cancel.svg'; ?>
    </a>
  </td>
</tr>
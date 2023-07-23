<?php // for comments display in admin view (table)
?>

<tr>
  <td><?= $this->first_name . ' ' . $this->last_name; ?></td>
  <!-- add filled icon on :hover : JS mouseenter -->
  <td class="center"><?= $this->note ?></td>
  <td><?= $this->comment; ?></td>
  <td class="center">
    <span class="save"id="save-<?= $this->id; ?>"><?php require 'assets/images/icons/checked.svg'; ?></span>
    <span class="cancel"id="cancel-<?= $this->id; ?>"><?php require 'assets/images/icons/cancel.svg'; ?></span>
  </td>
</tr>
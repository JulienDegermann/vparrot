<?php // for comments display in admin view (table)
?>

<tr>
  <td><?= $this->first_name . ' ' . $this->last_name; ?></td>
  <!-- add filled icon on :hover : JS mouseenter -->
  <td class="center"><?= $this->note ?></td>
  <td><?= $this->comment; ?></td>
</tr>
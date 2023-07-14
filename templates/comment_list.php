<?php // for comments display in admin view (table)
?>

<tr>
  <td><?= $this->author; ?></td>
  <!-- add filled icon on :hover : JS mouseenter -->
  <td class="center"><?= $this->note ?></td>
  <td><?= $this->comment; ?></td>
</tr>
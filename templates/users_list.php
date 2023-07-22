<tr>
<td><?= $this->last_name; ?></td>
  <td><?= $this->first_name; ?></td>
  <td class="desktop_only"><?= $this->email; ?></td>
  <!-- add filled icon on :hover : JS mouseenter -->
  <td class="center">
    <span id="edit-<?= $this->id ;?>" class="edit"><?php require 'assets/images/icons/edit.svg' ?></span>
    <span id="delete-<?= $this->id ;?>" class="delete"><?php require 'assets/images/icons/delete.svg' ?></span> </td>
</tr>
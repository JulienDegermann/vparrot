<tr>
<td><?= $this->last_name; ?></td>
  <td><?= $this->first_name; ?></td>
  <td class="desktop_only"><?= $this->email; ?></td>
  <!-- add filled icon on :hover : JS mouseenter -->
  <td class="center">
    <!-- <span id="editemployee-<?//= $this->id ;?>" class="editemployee"><?//php require 'assets/images/icons/edit.svg' ?></span> -->
    <a href="admin.php?admin=employees-delete-<?= $this->id; ?>">
      <?php require 'assets/images/icons/cancel.svg'; ?>
    </a>
  
  </td>
</tr>
<tr>
  <td><?= $this->last_name; ?></td>
  <td><?= $this->first_name; ?></td>
  <td><?= $this->email; ?></td>
  <!-- add filled icon on :hover : JS mouseenter -->
  <td><?= $this->title; ?></td>
  <td><?= $this->message; ?></td>
  <td class="center">
    <span class="message-delete"id="message-<?= $this->id; ?>"><?php require 'assets/images/icons/cancel.svg'; ?></span>
  </td>
</tr>
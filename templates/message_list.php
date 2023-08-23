<tr>
  <td>
    Nom : <?= $this->first_name; ?> <?= strtoupper($this->last_name); ?> <br>
    E-mail : <a href="mailto:<?= $this->email; ?>"><?= $this->email; ?></a> <br>
    Tél. : <a href="tel:<?= $this->tel; ?>"><?= $this->tel; ?></a>
  </td>
  <!-- add filled icon on :hover : JS mouseenter -->
  <td><?= $this->title; ?></td>
  <td><?= $this->message; ?></td>
  <td class="center">
    <span class="message-delete" id="message-<?= $this->id; ?>"><?php require 'assets/images/icons/cancel.svg'; ?></span>
  </td>
</tr>
<tr>
<td><?= $this->last_name; ?></td>
  <td><?= $this->first_name; ?></td>
  <td><?= $this->email; ?></td>
  <!-- add filled icon on :hover : JS mouseenter -->
  <td class="center"><?php require 'assets/images/icons/edit.svg' ?>
    <?php require 'assets/images/icons/delete.svg' ?> </td>
</tr>

<form action="">
  <legend>Redéfinir le mot de passe</legend>
  <label for="admin_password">Mot de passe Administrateur :
    <input type="password" name="admin_password" id="admin_password">
  </label>

  <label for="new_password">Nouveau mot de passe :
    <input type="password" name="new_password" id="new_password">
  </label>
  <label for="password_confirm">Confirmation du mot de passe :
    <input type="password" name="password_confirm" id="password_confirm">
  </label>


</form>
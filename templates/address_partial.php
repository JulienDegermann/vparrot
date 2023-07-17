<?php
function address($company)
{ ?>
  <address>
    <strong>
      <?= $company['name']; ?>
    </strong> <br>
    <?= $company['street_number'] . ' ' . $company['street_name']; ?><br>
    <?= $company['zip_code'] . ' ' . $company['city']; ?>
  </address>
<?php };
?>
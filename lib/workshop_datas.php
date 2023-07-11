<?php
$hours = [
  'lundi' => [
    'am_opening' => '8:00',
    'am_closure' => '12:00',
    'pm_opening' => '14:00',
    'pm_closure' => '18:00'
  ],
  'mardi' => [
    'am_opening' => '8:00',
    'am_closure' => '12:00',
    'pm_opening' => '14:00',
    'pm_closure' => '18:00'
  ],
  'mercredi' => [
    'am_opening' => '8:00',
    'am_closure' => '12:00',
    'pm_opening' => '14:00',
    'pm_closure' => '18:00'
  ],
  'jeudi' => [
    'am_opening' => '8:00',
    'am_closure' => '12:00',
    'pm_opening' => '14:00',
    'pm_closure' => '18:00'
  ],
  'vendredi' => [
    'am_opening' => '8:00',
    'am_closure' => '12:00',
    'pm_opening' => '14:00',
    'pm_closure' => '18:00'
  ],
  'samedi' => [
    'am_opening' => '9:00',
    'am_closure' => '12:00',
    'pm_opening' => '14:00',
    'pm_closure' => '19:00'
  ],
  'dimanche' => [
    'am_opening' => null,
    'am_closure' => null,
    'pm_opening' => null,
    'pm_closure' => null
  ]
];

$phone = '05 81 23 45 67';

$email = 'contact@parrot.com';

$address_input = [
  'name' => 'Garage V. PARROT',
  'street_number' => 239,
  'street_name' => 'Rue des Fontaines',
  'zip_code' => 31300,
  'city' => 'Toulouse'
];

function address($address_input)
{ ?>
  <address>
    <p>
      <strong>
        <?= $address_input['name']; ?>
      </strong> <br>
      <?= $address_input['street_number'] . ' ' . $address_input['street_name']; ?><br>
      <?= $address_input['zip_code'] . ' ' . $address_input['city']; ?>
    </p>
  </address>
<?php };
?>
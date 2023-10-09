<?php

define('_UPLOAD_IMAGES_', 'uploads/images/');

function slugify($text, string $divider = '-')
{
    // Apply slugification to the text
    $text = preg_replace('~[^\pL\d.-]+~u', $divider, $text);
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    $text = preg_replace('~[^-\w.]+~', '', $text);
    $text = trim($text, $divider);
    $text = preg_replace('~-+~', $divider, $text);
    $text = strtolower($text);
    if (empty($text)) {
        $text = 'n-a';
    }

    return $text;
}

// convert textarea to array
function stringToArray(string $string)
{
    return explode(PHP_EOL, $string);
}

// display address
function address($address_input)
{ ?>
    <address>
        <strong>
            <?= $address_input['name']; ?>
        </strong> <br>
        <?= $address_input['street_number'] . ' ' . $address_input['street_name']; ?><br>
        <?= $address_input['zip_code'] . ' ' . $address_input['city']; ?>
    </address>
<?php };

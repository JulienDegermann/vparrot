<?php

define('_UPLOAD_IMAGES_', 'uploads/images/');

define('_FIRST_NAME_REGEX_', '/^[a-zA-Z\s\-\p{L}]{1,50}+$/u');
define('_LAST_NAME_REGEX_', '/^[a-zA-Z\s\-\p{L}]{1,100}+$/u');
define('_PWD_REGEX_', '/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{12,}$/');
define('_MAIL_REGEX_', '/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/');
define('_PHONE_REGEX_', '/^0[1-9]\d{8}$/');
define('_COMMENT_REGEX_', '/^[a-zA-Z0-9\s\-,:?!."\'\p{L}]{1,255}$/u');
define('_MESSAGE_REGEX_', '/^[a-zA-Z0-9\s\-,:?!."\'\p{L}]+$/u');
define('_NOTE_REGEX_', '/^[1-5]{1}/');
define('_CODE_REGEX_', '/^[0-9]{5}/');
define('_STREET_REGEX_', '/^[0-9]{1,4}/');
define('_SERVICE_REGEX_', '/^[a-zA-Z0-9\s\-, &:?!."\'\p{L}]+$/u');
define('_TIME_REGEX_', '/^([0-1]?[0-9]|2[0-3]):[0-5][0-9]$/');
define('_YEAR_REGEX_', '/^(19|20)\d{2}$/');
define('_MILEAGE_REGEX_', '/^\d{4,6}$/');
define('_BRAND_REGEX_', '/^[a-zA-Z0-9\s\-\p{L}]{1,50}+$/u');
define('_MODEL_REGEX_', '/^[a-zA-Z0-9\s\-\p{L}]{1,100}+$/u');


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

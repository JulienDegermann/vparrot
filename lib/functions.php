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
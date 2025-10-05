<?php
include_once __DIR__ . "/_partials/_header.php";



if (isset($content)) {
    include_once($content);
} else {
    echo "ERROR : NO CONTENT FOUND";
}

include_once __DIR__ . "/_partials/_footer.php";

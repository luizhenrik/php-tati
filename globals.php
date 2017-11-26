<?php
 if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
    // this is HTTPS
    $protocol  = "https";
} else {
    // this is HTTP
    $protocol  = "http";
}

DEFINE('HTTP_ROOT', $_SERVER['HTTP_HOST']);
DEFINE('BASE_URL', $protocol . "://" . HTTP_ROOT .  str_replace("\\", "/", substr(__DIR__, strlen($_SERVER[ 'DOCUMENT_ROOT' ]))) . '/');
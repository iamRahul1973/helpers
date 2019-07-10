<?php

/* ------------------------------------------------------
 * | HTML HELPERS
 * ------------------------------------------------------ */

function print_array($data) {
    echo '<pre>', print_r($data), '</pre>';
}

function hr($count = 1) {
    $response = '';
    for ($i = 0; $i <= $count; $i++) {
        $response .= '<hr>';
    }
    return $response;
}

function br($count = 1) {
    $response = '';
    for ($i = 0; $i <= $count; $i++) {
        $response .= '<br>';
    }
    return $response;
}

function h($hierarchy, $text) {
    $response = '';
    if ($hierarchy >= 1 && $hierarchy <= 6) {
        $response .= '<h' . $hierarchy . '>' . $text . '</h' . $hierarchy . '>';
    } else {
        $response .= 'OOPS !!!';
    }
    return $response;
}

function em($text) {
    return '<em>' . $text . '</em>';
}
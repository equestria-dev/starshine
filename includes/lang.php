<?php

$_lang = [];

function _preload_lang($array, $preKey) {
    global $_lang;

    foreach ($array as $key => $item) {
        if (is_string($item)) {
            $_lang["$preKey.$key"] = $item;
        } elseif (is_array($item)) {
            _preload_lang($item, "$preKey.$key");
        }
    }
}

function l($key) {
    global $_lang;

    return $_lang[$key] ?? $key;
}

_preload_lang(json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/includes/lang/fr.json"), true), "lang");

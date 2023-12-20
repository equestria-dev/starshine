<?php

$_lang = [];

function _preload_lang($array, $preKey): void {
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

_preload_lang(json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/includes/lang/en.json"), true), "lang");

function size($n) {
    if ($n < 1024) {
        return $n . " " . l("lang.storage.b");
    } elseif ($n < 1024**2) {
        return round($n / 1024, 1) . " " . l("lang.storage.kb");
    } elseif ($n < 1024**3) {
        return round($n / 1024**2, 1) . " " . l("lang.storage.mb");
    } elseif ($n < 1024**4) {
        return round($n / 1024**3, 1) . " " . l("lang.storage.gb");
    } elseif ($n < 1024**5) {
        return round($n / 1024**4, 1) . " " . l("lang.storage.tb");
    } elseif ($n < 1024**6) {
        return round($n / 1024**5, 1) . " " . l("lang.storage.pb");
    } elseif ($n < 1024**7) {
        return round($n / 1024**6, 1) . " " . l("lang.storage.eb");
    }

    return $n . " " . l("lang.storage.b");
}
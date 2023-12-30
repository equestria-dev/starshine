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

function lp() {
    global $realLang;
    return $realLang;
}

function l($key) {
    global $_lang;

    return $_lang[$key] ?? $key;
}

global $realLang;
if (!isset($realLang)) {
    $useLang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? "en", 0, 2) ?? "en";
    $realLang = file_exists($_SERVER['DOCUMENT_ROOT'] . "/includes/lang" . $useLang . ".json") ? $useLang : "en";
}

_preload_lang(json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/includes/lang/" . $realLang . ".json"), true), "lang");

function size($n, $precision = 1) {
    if ($n < 1024) {
        return $n . " " . l("lang.storage.b");
    } elseif ($n < 1024**2) {
        return round($n / 1024, $precision) . " " . l("lang.storage.kb");
    } elseif ($n < 1024**3) {
        return round($n / 1024**2, $precision) . " " . l("lang.storage.mb");
    } elseif ($n < 1024**4) {
        return round($n / 1024**3, $precision) . " " . l("lang.storage.gb");
    } elseif ($n < 1024**5) {
        return round($n / 1024**4, $precision) . " " . l("lang.storage.tb");
    } elseif ($n < 1024**6) {
        return round($n / 1024**5, $precision) . " " . l("lang.storage.pb");
    } elseif ($n < 1024**7) {
        return round($n / 1024**6, $precision) . " " . l("lang.storage.eb");
    }

    return $n . " " . l("lang.storage.b");
}

function timeAgo($time, $showTense = true): string {
    if (!is_numeric($time)) {
        $time = strtotime($time);
    }

    $periods = [l("lang.time.second.0"), l("lang.time.minute.0"), l("lang.time.hour.0"), l("lang.time.day.0"), l("lang.time.week.0"), l("lang.time.month.0"), l("lang.time.year.0"), l("lang.time.age.0")];
    $periods2 = [l("lang.time.second.1"), l("lang.time.minute.1"), l("lang.time.hour.1"), l("lang.time.day.1"), l("lang.time.week.1"), l("lang.time.month.1"), l("lang.time.year.1"), l("lang.time.age.1")];
    $lengths = ["60", "60", "24", "7", "4.35", "12", "100"];

    $now = time();

    $difference = $now - $time;
    if ($difference <= 10 && $difference >= 0) {
        return l("lang.time.now");
    } elseif ($difference > 0) {
        $tense = l("lang.time.ago");
    } else {
        $tense = l("lang.time.later");
    }

    for ($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
        $difference /= $lengths[$j];
    }

    $difference = round($difference);

    $period = $difference > 1 ? $periods2[$j] : $periods[$j];

    if ($showTense) {
        return "{$difference} {$period} {$tense}";
    } else {
        return "{$difference} {$period}";
    }
}
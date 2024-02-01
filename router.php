<?php

$url = $_GET["_"] ?? $_SERVER["REQUEST_URI"];
$parts = array_map(function ($i) {
    return trim($i);
}, array_values(array_filter(explode("/", $url), function ($i) { return trim($i) !== ""; })));

function error($code) {
    global $c;
    $c = $code;
    require_once $_SERVER['DOCUMENT_ROOT'] . "/error.php";
    die();
}

if (isset($parts[0])) {
    if ($parts[0] === "assets") {
        $assetPath = implode("/", array_values(array_filter(array_slice($parts, 1), function ($i) {
            return !str_contains($i, "..");
        })));

        if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/assets/" . $assetPath)) {
            if (str_ends_with($assetPath, ".css")) {
                header("Content-Type: text/css");
            } elseif (str_ends_with($assetPath, ".js")) {
                header("Content-Type: application/javascript");
            } else {
                header("Content-Type: " . mime_content_type($_SERVER['DOCUMENT_ROOT'] . "/assets/" . $assetPath));
            }

            header("Content-Length: " . filesize($_SERVER['DOCUMENT_ROOT'] . "/assets/" . $assetPath));
            readfile($_SERVER['DOCUMENT_ROOT'] . "/assets/" . $assetPath);
        } else {
            error(404);
        }
    } elseif ($parts[0] === "warrant" || $parts[0] === "pubkey") {
        header("Content-Type: text/plain");
        header("Content-Length: " . filesize($_SERVER['DOCUMENT_ROOT'] . "/" . $parts[0]));
        readfile($_SERVER['DOCUMENT_ROOT'] . "/" . $parts[0]);
    } else {
        global $realLang;

        if (preg_match("/[a-zA-Z_\-\d]/m", $parts[0])) {
            if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/includes/lang/" . $parts[0] . ".json") && $parts[0] !== "package" && $parts[0] !== "package-lock") {
                $realLang = $parts[0];

                $resourcePathParts = array_values(array_filter(array_slice($parts, 1), function ($i) {
                    return !str_contains($i, "..");
                }));

                if (isset($resourcePathParts[0]) && ($resourcePathParts[0] === "includes" || str_starts_with($resourcePathParts[0], ".") || $resourcePathParts[0] === "version" || $resourcePathParts[0] === "annoucement" || $resourcePathParts[0] === "warrantgen.js")) {
                    error(403);
                }

                if (isset($resourcePathParts[0]) && $resourcePathParts[0] === "projects" && isset($resourcePathParts[1]) && $resourcePathParts[1] !== "archive") {
                    unset($resourcePathParts[1]);
                }

                $resourcePath = implode("/", $resourcePathParts);

                if (!file_exists($_SERVER['DOCUMENT_ROOT'] . "/" . $resourcePath . "/index.php")) {
                    error(404);
                }

                if (!is_dir($_SERVER['DOCUMENT_ROOT'] . "/" . $resourcePath)) {
                    error(400);
                }

                require_once $_SERVER['DOCUMENT_ROOT'] . "/" . $resourcePath . "/index.php";
            } else {
                $useLang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? "en", 0, 2) ?? "en";
                $realLang = file_exists($_SERVER['DOCUMENT_ROOT'] . "/includes/lang/" . $useLang . ".json") ? $useLang : "en";
                header("Location: /$realLang/" . implode("/", $parts));
                die();
            }
        } else {
            global $realLang;
            $useLang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? "en", 0, 2) ?? "en";
            $realLang = file_exists($_SERVER['DOCUMENT_ROOT'] . "/includes/lang/" . $useLang . ".json") ? $useLang : "en";
            header("Location: /$realLang/" . implode("/", $parts));
            die();
        }
    }
} else {
    global $realLang;
    $useLang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? "en", 0, 2) ?? "en";
    $realLang = file_exists($_SERVER['DOCUMENT_ROOT'] . "/includes/lang/" . $useLang . ".json") ? $useLang : "en";
    header("Location: /$realLang");
    die();
}
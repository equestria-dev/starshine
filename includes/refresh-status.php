<?php

if (!isset($_SERVER['argv'])) die("This script can only be run in a CLI environment.");

// Status

$servers = [
    json_decode(exec("ssh -p 2222 root@zephyrheights.equestria.dev starshine-status"), true),
    json_decode(exec("ssh -p 2224 root@zephyrheights-testing.equestria.dev starshine-status"), true),
    json_decode(exec("ssh -p 2223 root@maretimebay.equestria.dev starshine-status"), true),
    json_decode(exec("ssh -p 22 fedora@bridlewood.equestria.dev starshine-status"), true),
];

$total = [
    "ram" => array_reduce(array_map(function ($i) {
        return $i["ram"];
    }, $servers), function ($a, $b) {
        return $a + $b;
    }),
    "ramTotal" => array_reduce(array_map(function ($i) {
        return $i["ramTotal"];
    }, $servers), function ($a, $b) {
        return $a + $b;
    }),
    "disk" => array_reduce(array_map(function ($i) {
        return $i["disk"];
    }, $servers), function ($a, $b) {
        return $a + $b;
    }),
    "diskTotal" => array_reduce(array_map(function ($i) {
        return $i["diskTotal"];
    }, $servers), function ($a, $b) {
        return $a + $b;
    }),
    "cores" => array_reduce(array_map(function ($i) {
        return $i["cores"];
    }, $servers), function ($a, $b) {
        return $a + $b;
    }),
    "ghz" => array_reduce(array_map(function ($i) {
        return $i["ghz"];
    }, $servers), function ($a, $b) {
        return $a + $b;
    }),
    "ghzMax" => array_reduce(array_map(function ($i) {
        return $i["ghzMax"];
    }, $servers), function ($a, $b) {
        return $a + $b;
    }),
    "ghzMin" => array_reduce(array_map(function ($i) {
        return $i["ghzMin"];
    }, $servers), function ($a, $b) {
        return $a + $b;
    }),
    "cache" => array_reduce(array_map(function ($i) {
        return $i["cache"];
    }, $servers), function ($a, $b) {
        return $a + $b;
    }),
    "cpuLoad" => array_reduce(array_map(function ($i) {
        return $i["cpuLoad"];
    }, $servers), function ($a, $b) {
        return $a + $b;
    }) / count($servers),
    "processes" => array_reduce(array_map(function ($i) {
        return $i["processes"];
    }, $servers), function ($a, $b) {
        return $a + $b;
    }),
    "io" => max(array_map(function ($i) {
        return $i["io"];
    }, $servers)),
    "kernel" => array_values(array_unique(array_map(function ($i) {
        return $i["kernel"];
    }, $servers)))
];

var_dump($total);

file_put_contents("./data/status.json", json_encode([
    "services" => json_decode(file_get_contents("https://status.equestria.dev/status.json"), true),
    "servers" => $total,
    "updated" => time()
]));
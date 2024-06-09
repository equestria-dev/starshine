<?php

if (!isset($_SERVER['argv'])) die("This script can only be run in a CLI environment.");

// Projects

$secrets = json_decode(file_get_contents("./secrets.json"), true);
$equivalents = [];
$descriptions = [];
$projects = [];

print("GitLab > equestria.dev\n");

$gitea = [];
$page = 1;
$current = json_decode(file_get_contents("https://source.equestria.dev/api/v4/groups/2/projects?page=$page&private_token=" . $secrets["gitlab"], false, stream_context_create(["ssl"=>["verify_peer"=>false,"verify_peer_name"=>false]])), true);
array_push($gitea, ...$current);

while (count($current) > 0) {
    $page++;
    $current = json_decode(file_get_contents("https://source.equestria.dev/api/v4/groups/2/projects?page=$page&private_token=" . $secrets["gitlab"], false, stream_context_create(["ssl"=>["verify_peer"=>false,"verify_peer_name"=>false]])), true);
    array_push($gitea, ...$current);
}

foreach ($gitea as $project) {
    if ($project["visibility"] !== "public") continue;

    print("    " . $project["name"] . "\n");
    $languages = json_decode(file_get_contents("https://source.equestria.dev/api/v4/projects/$project[id]/languages?private_token=" . $secrets["gitlab"], false, stream_context_create(["ssl"=>["verify_peer"=>false,"verify_peer_name"=>false]])), true);

    $readme_dl = json_decode(@file_get_contents("https://source.equestria.dev/api/v4/projects/$project[id]/repository/files/README.md?ref=HEAD&private_token=" . $secrets["gitlab"], false, stream_context_create(["ssl"=>["verify_peer"=>false,"verify_peer_name"=>false]])), true);
    $commit = json_decode(file_get_contents("https://source.equestria.dev/api/v4/projects/$project[id]/repository/commits?per_page=1&private_token=" . $secrets["gitlab"], false, stream_context_create(["ssl"=>["verify_peer"=>false,"verify_peer_name"=>false]])), true)[0];
    $stats = json_decode(file_get_contents("https://source.equestria.dev/api/v4/projects/$project[id]?statistics=true&per_page=1&private_token=" . $secrets["gitlab"], false, stream_context_create(["ssl"=>["verify_peer"=>false,"verify_peer_name"=>false]])), true)["statistics"];

    if (isset($readme_dl) && $readme_dl !== false) {
        $readme = base64_decode($readme_dl["content"]);
    } else {
        $readme = null;
    }

    $projects[] = [
        "id" => md5($project["path_with_namespace"]),
        "owner" => $project["namespace"]["path"],
        "name" => $project["path"],
        "display_name" => $project["name"] ?? $project["path"],
        "description" => $project["description"],
        "source" => $project["web_url"],
        "icon" => $project["avatar_url"] ?? null,
        "website" => $project["web_url"],
        "size" => $stats["storage_size"],
        "language" => array_keys($languages)[0] ?? null,
        "languages" => $languages,
        "update" => strtotime($project["updated_at"]),
        "commit" => isset($commit) ? strtotime($commit["created_at"]) : strtotime($project["updated_at"]),
        "archive" => $project["archived"],
        "readme" => $readme
    ];
}

print("GitLab > minteck.org\n");

$minteckorg = [];
$page = 1;
$current = json_decode(file_get_contents("https://source.equestria.dev/api/v4/groups/7/projects?page=$page&private_token=" . $secrets["gitlab"], false, stream_context_create(["ssl"=>["verify_peer"=>false,"verify_peer_name"=>false]])), true);
array_push($minteckorg, ...$current);

while (count($current) > 0) {
    $page++;
    $current = json_decode(file_get_contents("https://source.equestria.dev/api/v4/groups/7/projects?page=$page&private_token=" . $secrets["gitlab"], false, stream_context_create(["ssl"=>["verify_peer"=>false,"verify_peer_name"=>false]])), true);
    array_push($minteckorg, ...$current);
}

foreach ($minteckorg as $project) {
    if ($project["visibility"] !== "public") continue;

    print("    " . $project["name"] . "\n");
    $languages = json_decode(file_get_contents("https://source.equestria.dev/api/v4/projects/$project[id]/languages?private_token=" . $secrets["gitlab"], false, stream_context_create(["ssl"=>["verify_peer"=>false,"verify_peer_name"=>false]])), true);

    $commit = json_decode(file_get_contents("https://source.equestria.dev/api/v4/projects/$project[id]/repository/commits?per_page=1&private_token=" . $secrets["gitlab"], false, stream_context_create(["ssl"=>["verify_peer"=>false,"verify_peer_name"=>false]])), true)[0];
    $stats = json_decode(file_get_contents("https://source.equestria.dev/api/v4/projects/$project[id]?statistics=true&per_page=1&private_token=" . $secrets["gitlab"], false, stream_context_create(["ssl"=>["verify_peer"=>false,"verify_peer_name"=>false]])), true)["statistics"];

    $projects[] = [
        "archive" => true,
        "id" => md5($project["path_with_namespace"]),
        "owner" => $project["namespace"]["path"],
        "name" => $project["path"],
        "display_name" => $project["name"] ?? $project["path"],
        "description" => $project["description"],
        "source" => $project["web_url"],
        "icon" => $project["avatar_url"] ?? null,
        "website" => $project["web_url"],
        "size" => $stats["storage_size"],
        "language" => array_keys($languages)[0] ?? null,
        "languages" => $languages,
        "update" => strtotime($project["updated_at"]),
        "commit" => isset($commit) ? strtotime($commit["created_at"]) : strtotime($project["updated_at"])
    ];
}

/*print("GitHub > CloudburstSys\n");

$cloudburst = json_decode(file_get_contents("https://api.github.com/users/CloudburstSys/repos?per_page=100", false, stream_context_create([
    "http" => [
        "header" => "User-Agent: Mozilla/5.0 (+equestria.dev-horses/1.0) PHP/" . PHP_VERSION . "\r\nAuthorization: Bearer " . $secrets["github"] . "\r\n"
    ]
])), true);

foreach ($cloudburst as $project) {
    print("    " . $project["name"] . "\n");

    $languages = json_decode(file_get_contents("https://api.github.com/repos/CloudburstSys/$project[name]/languages", false, stream_context_create([
        "http" => [
            "header" => "User-Agent: Mozilla/5.0 (+equestria.dev-horses/1.0) PHP/" . PHP_VERSION . "\r\nAuthorization: Bearer " . $secrets["github"] . "\r\n"
        ]
    ])), true);

    $commit = json_decode(file_get_contents("https://api.github.com/repos/CloudburstSys/$project[name]/commits?per_page=1", false, stream_context_create([
        "http" => [
            "header" => "User-Agent: Mozilla/5.0 (+equestria.dev-horses/1.0) PHP/" . PHP_VERSION . "\r\nAuthorization: Bearer " . $secrets["github"] . "\r\n"
        ]
    ])), true)[0];

    if (!$project["fork"]) {
        $projects[] = [
            "archive" => true,
            "id" => md5("conep.one/" . $project["id"]),
            "owner" => "conep.one",
            "name" => $project["name"],
            "display_name" => $equivalents[$project["name"]] ?? $project["name"],
            "description" => $descriptions[$project["name"]] ?? $project["description"],
            "source" => $project["html_url"],
            "icon" => null,
            "website" => trim($project["homepage"] ?? "") === "" ? $project["html_url"] : $project["homepage"],
            "size" => $project["size"],
            "language" => $project["language"],
            "languages" => $languages,
            "update" => strtotime($project["updated_at"]),
            "commit" => isset($commit) ? strtotime($commit["commit"]["author"]["date"]) : strtotime($project["updated_at"])
        ];
    }
}*/

file_put_contents("./data/projects.json", json_encode($projects, JSON_PRETTY_PRINT));

// Icons
echo("Icons!\n");
foreach ($projects as $project) {
    if (isset($project["icon"])) {
        echo($project["name"] . "\n");
        file_put_contents("../assets/projects/" . $project["id"] . ".png", file_get_contents($project["icon"]));
    }
}

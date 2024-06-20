<?php

if (!isset($_SERVER['argv'])) die("This script can only be run in a CLI environment.");

// Projects

$secrets = json_decode(file_get_contents("./secrets.json"), true);
$equivalents = [];
$descriptions = [];
$projects = [];

print("GitHub > equestria.dev\n");

$gitea = [];
$page = 1;
$current = json_decode(file_get_contents("https://api.github.com/orgs/equestria-dev/repos?page=$page&per_page=100", false, stream_context_create(["ssl"=>["verify_peer"=>false,"verify_peer_name"=>false],"http"=>["header"=>"User-Agent: Mozilla/5.0 (Equestria.dev; +Starshine; hello@equestria.dev)\r\n"]])), true);
array_push($gitea, ...$current);

while (count($current) > 0) {
    $page++;
    $current = json_decode(file_get_contents("https://api.github.com/orgs/equestria-dev/repos?page=$page&per_page=100", false, stream_context_create(["ssl"=>["verify_peer"=>false,"verify_peer_name"=>false],"http"=>["header"=>"User-Agent: Mozilla/5.0 (Equestria.dev; +Starshine; hello@equestria.dev)\r\n"]])), true);
    array_push($gitea, ...$current);
}

foreach ($gitea as $project) {
    if ($project["visibility"] !== "public") continue;

    print("    " . $project["name"] . "\n");
    $languages = json_decode(file_get_contents("https://api.github.com/repos/equestria-dev/$project[name]/languages", false, stream_context_create(["ssl"=>["verify_peer"=>false,"verify_peer_name"=>false],"http"=>["header"=>"User-Agent: Mozilla/5.0 (Equestria.dev; +Starshine; hello@equestria.dev)\r\n"]])), true);

    if (count($languages) > 0) {
        $languages2 = [];
        $languages_total = array_sum(array_values($languages));

        foreach ($languages as $key => $value) {
            $languages2[$key] = ($value / $languages_total) * 100;
        }
    }

    $projects[] = [
        "id" => md5($project["full_name"]),
        "owner" => $project["owner"]["login"],
        "name" => $project["name"],
        "display_name" => $project["name"],
        "description" => $project["description"],
        "source" => $project["html_url"],
        "icon" => null,
        "website" => $project["html_url"],
        "size" => $project["size"] * 1024,
        "language" => array_keys($languages2)[0] ?? null,
        "languages" => $languages2,
        "update" => strtotime($project["updated_at"]),
        "commit" => strtotime($project["pushed_at"]),
        "archive" => false,
        "readme" => null
    ];
}

file_put_contents("./data/projects.json", json_encode($projects, JSON_PRETTY_PRINT));

// Icons
echo("Icons!\n");
foreach ($projects as $project) {
    echo($project["name"] . "\n");
    file_put_contents("../assets/projects/" . $project["id"] . ".png", file_get_contents("../assets/img/favicon.svg"));
}

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/lang.php"; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php if (isset($title)) {
        echo "$title - Equestria.dev";
    } else {
        echo l("lang.title");
    } ?></title>
    <link rel="stylesheet" href="/assets/styles/main.css" type="text/css">
    <link rel="stylesheet" href="/assets/icons/icons.min.css" type="text/css">
    <link rel="icon" href="/assets/img/favicon.svg" type="image/svg+xml">
    <script src="/assets/src/main.js"></script>
</head>
<body>
<?php $announcement = trim(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/announcement")); if ($announcement !== ""):
    $clickable = false;
    if (str_contains($announcement, "%%")) $clickable = true; ?>
<header id="announcement" <?php if ($clickable): ?> class="announcement-clickable"<?php endif; ?>>
    <?= $clickable ? '<a href="' . str_replace("@@", lp(), explode("%%", $announcement)[0]) . '" id="announcement-inner">' : '<div id="announcement-inner">' ?>
    <?= $clickable ? explode("%%", $announcement)[1] . '<i class="bi bi-chevron-right" id="announcement-chevron"></i>' : $announcement ?>
    <?= $clickable ? "</a>" : "</div>" ?>
</header>
<?php endif; ?>
<nav id="navbar" <?= $announcement !== "" ? 'class="with-announcement"' : '' ?>>
    <div id="navbar-container" class="container">
        <div id="navbar-inner">
            <a id="navbar-logo" href="/<?= lp() ?>">
                <img alt="Equestria.dev" id="navbar-logo-img" src="/assets/img/logo.svg">
            </a>
            <ul id="navbar-items">
                <li id="navbar-item-projects" class="navbar-item navbar-item-closed">
                        <span class="navbar-item-inner-desktop">
                            <span class="navbar-item-text"><?= l("lang.navigation.headers.projects") ?></span>
                            <i class="navbar-item-icon-closed bi bi-chevron-down"></i>
                            <i class="navbar-item-icon-open bi bi-chevron-up"></i>
                        </span>
                    <span class="navbar-item-inner-mobile">
                            <i class="navbar-item-icon-closed bi bi-kanban"></i>
                            <i class="navbar-item-icon-open bi bi-kanban-fill"></i>
                        </span>
                    <div class="navbar-item-menu-container">
                        <div class="navbar-item-menu navbar-projects">
                            <?php $projects = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/includes/data/projects.json"), true); uasort($projects, function ($a, $b) {
                                return strcmp($a["display_name"] ?? $a["name"], $b["display_name"] ?? $b["name"]);
                            }); ?>
                            <div class="navbar-projects-flagships">
                                <?php $flagships = []; $i = 0; $projects2 = array_values(array_filter($projects, function ($i) {
                                    return !$i["archive"] && isset($i["icon"]);
                                })); uasort($projects2, function ($a, $b) {
                                    return $b["size"] - $a["size"];
                                }); foreach ($projects2 as $project): $i++; if ($i <= 4): $flagships[] = $project["id"]; ?>
                                    <a href="/<?= lp() ?>/projects/<?= $project['name'] ?? $project['id'] ?>" class="navbar-projects-flagship" id="navbar-projects-flagship-<?= $project["id"] ?>">
                                        <img alt="Project icon" src="/assets/projects/<?= $project["id"] ?>.png" class="navbar-projects-flagship-icon">
                                        <span class="navbar-projects-flagship-name"><?= $project["display_name"] ?? $project["name"] ?></span>
                                    </a>
                                <?php endif; endforeach; ?>
                            </div>

                            <hr>

                            <div class="navbar-projects-other">
                                <?php foreach ($projects as $project): if (!$project["archive"] && !in_array($project["id"], $flagships)): ?>
                                    <a href="/<?= lp() ?>/projects/<?= $project['name'] ?? $project['id'] ?>" class="navbar-projects-other-item" id="navbar-projects-other-item-<?= $project['id'] ?>"><?= $project["display_name"] ?? $project["name"] ?></a>
                                <?php endif; endforeach; ?>
                            </div>

                            <hr class="navbar-projects-archive-hr">

                            <a href="/<?= lp() ?>/projects/archive" class="navbar-projects-archive">
                                <span class="navbar-projects-archive-text"><?= l("lang.navigation.projects.archives") ?></span>
                                <i class="navbar-item-icon-open bi bi-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </li>
                <li id="navbar-item-network" class="navbar-item navbar-item-closed">
                        <span class="navbar-item-inner-desktop">
                            <span class="navbar-item-text"><?= l("lang.navigation.headers.network") ?></span>
                            <i class="navbar-item-icon-closed bi bi-chevron-down"></i>
                            <i class="navbar-item-icon-open bi bi-chevron-up"></i>
                        </span>
                    <span class="navbar-item-inner-mobile">
                            <i class="navbar-item-icon-closed bi bi-diagram-3"></i>
                            <i class="navbar-item-icon-open bi bi-diagram-3-fill"></i>
                        </span>
                    <div class="navbar-item-menu-container">
                        <div class="navbar-item-menu">
                            <?php $status = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/includes/data/status.json"), true); if ($status["services"]["code"] === 0): ?>
                            <a href="/<?= lp() ?>/network/status" class="navbar-status navbar-status-ok">
                                <i class="bi bi-check-circle-fill"></i>
                                <span class="navbar-status-text"><?= l("lang.navigation.network.status.0") ?></span>
                            </a>
                            <?php elseif ($status["services"]["code"] === 1): ?>
                            <a href="/<?= lp() ?>/network/status" class="navbar-status navbar-status-warn">
                                <i class="bi bi-exclamation-circle-fill"></i>
                                <span class="navbar-status-text"><?= l("lang.navigation.network.status.1") ?></span>
                            </a>
                            <?php else: ?>
                            <a href="/<?= lp() ?>/network/status" class="navbar-status navbar-status-fail">
                                <i class="bi bi-x-circle-fill"></i>
                                <span class="navbar-status-text"><?= l("lang.navigation.network.status.2") ?></span>
                            </a>
                            <?php endif; ?>

                            <div class="navbar-stats">
                                <div class="navbar-stats-item">
                                    <i class="bi bi-memory"></i>
                                    <span class="navbar-network-item-text"><?= size($status["servers"]["ram"]) ?></span>
                                </div>
                                <div class="navbar-stats-item">
                                    <i class="bi bi-hdd"></i>
                                    <span class="navbar-network-item-text"><?= size($status["servers"]["disk"]) ?></span>
                                </div>
                                <div class="navbar-stats-item">
                                    <i class="bi bi-wifi"></i>
                                    <span class="navbar-network-item-text"><?= round($status["services"]["ping"]) ?> ms</span>
                                </div>
                            </div>

                            <hr>

                            <div class="navbar-network">
                                <a href="/<?= lp() ?>/network/account" class="navbar-network-item">
                                    <i class="bi bi-person-circle"></i>
                                    <span class="navbar-network-item-text"><?= l("lang.navigation.network.account") ?></span>
                                </a>
                                <!--<a href="/<?= lp() ?>/network" class="navbar-network-item">
                                    <i class="bi bi-hdd-network"></i>
                                    <span class="navbar-network-item-text"><?= l("lang.navigation.network.infra") ?></span>
                                </a>
                                <a href="/<?= lp() ?>/network/security" class="navbar-network-item">
                                    <i class="bi bi-lock"></i>
                                    <span class="navbar-network-item-text"><?= l("lang.navigation.network.security") ?></span>
                                </a>-->
                                <a href="/<?= lp() ?>/network/gitlab" class="navbar-network-item">
                                    <i class="bi bi-gitlab"></i>
                                    <span class="navbar-network-item-text">GitLab</span>
                                </a>
                                <a href="/<?= lp() ?>/network/bugs" class="navbar-network-item">
                                    <i class="bi bi-bug"></i>
                                    <span class="navbar-network-item-text"><?= l("lang.navigation.network.bugs") ?></span>
                                </a>
                                <a href="/<?= lp() ?>/network/blog" class="navbar-network-item">
                                    <i class="bi bi-book"></i>
                                    <span class="navbar-network-item-text"><?= l("lang.navigation.network.blog") ?></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                <li id="navbar-item-contact" class="navbar-item navbar-item-closed">
                        <span class="navbar-item-inner-desktop">
                            <span class="navbar-item-text"><?= l("lang.navigation.headers.contact") ?></span>
                            <i class="navbar-item-icon-closed bi bi-chevron-down"></i>
                            <i class="navbar-item-icon-open bi bi-chevron-up"></i>
                        </span>
                    <span class="navbar-item-inner-mobile">
                            <i class="navbar-item-icon-closed bi bi-chat-left"></i>
                            <i class="navbar-item-icon-open bi bi-chat-left-fill"></i>
                        </span>
                    <div class="navbar-item-menu-container">
                        <div class="navbar-item-menu">
                            <a href="mailto:hello@equestria.dev" class="navbar-email">
                                <i class="bi bi-envelope"></i>
                                <span class="navbar-email-text"><?= l("lang.navigation.contact.email") ?></span>
                            </a>

                            <div class="navbar-contact">
                                <a href="/<?= lp() ?>/contact/mastodon" class="navbar-contact-item">
                                    <i class="bi bi-mastodon"></i>
                                    <span class="navbar-contact-item-text">Mastodon</span>
                                </a>
                                <a href="/<?= lp() ?>/contact/twitter" class="navbar-contact-item">
                                    <i class="bi bi-twitter-x"></i>
                                    <span class="navbar-contact-item-text">Twitter/X</span>
                                </a>
                                <a href="/<?= lp() ?>/contact/reddit" class="navbar-contact-item">
                                    <i class="bi bi-reddit"></i>
                                    <span class="navbar-contact-item-text">Reddit</span>
                                </a>
                                <a href="/<?= lp() ?>/contact/github" class="navbar-contact-item">
                                    <i class="bi bi-github"></i>
                                    <span class="navbar-contact-item-text">GitHub</span>
                                </a>
                                <a href="/<?= lp() ?>/contact/steam" class="navbar-contact-item">
                                    <i class="bi bi-steam"></i>
                                    <span class="navbar-contact-item-text">Steam</span>
                                </a>
                                <a href="/<?= lp() ?>/contact/youtube" class="navbar-contact-item">
                                    <i class="bi bi-youtube"></i>
                                    <span class="navbar-contact-item-text">YouTube</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                <li id="navbar-item-legal" class="navbar-item navbar-item-closed">
                        <span class="navbar-item-inner-desktop">
                            <span class="navbar-item-text"><?= l("lang.navigation.headers.legal") ?></span>
                            <i class="navbar-item-icon-closed bi bi-chevron-down"></i>
                            <i class="navbar-item-icon-open bi bi-chevron-up"></i>
                        </span>
                    <span class="navbar-item-inner-mobile">
                            <i class="navbar-item-icon-closed bi bi-shield"></i>
                            <i class="navbar-item-icon-open bi bi-shield-fill"></i>
                        </span>
                    <div class="navbar-item-menu-container">
                        <div class="navbar-item-menu">
                            <div class="navbar-legal">
                                <a href="/<?= lp() ?>/legal/privacy" class="navbar-legal-item">
                                    <i class="bi bi-eye"></i>
                                    <span class="navbar-legal-item-text"><?= l("lang.navigation.legal.privacy") ?></span>
                                </a>
                                <a href="/<?= lp() ?>/legal/terms" class="navbar-legal-item">
                                    <i class="bi bi-key"></i>
                                    <span class="navbar-legal-item-text"><?= l("lang.navigation.legal.terms.0") ?><span class="navbar-legal-item-text-large"> <?= l("lang.navigation.legal.terms.1") ?></span></span>
                                </a>
                                <a href="/<?= lp() ?>/legal/license" class="navbar-legal-item">
                                    <i class="bi bi-patch-check"></i>
                                    <span class="navbar-legal-item-text"><?= l("lang.navigation.legal.license") ?></span>
                                </a>
                                <a href="/<?= lp() ?>/legal/notices" class="navbar-legal-item">
                                    <i class="bi bi-eyeglasses"></i>
                                    <span class="navbar-legal-item-text"><?= l("lang.navigation.legal.disclaimer") ?></span>
                                </a>
                                <a href="/<?= lp() ?>/legal/branding" class="navbar-legal-item">
                                    <i class="bi bi-brush"></i>
                                    <span class="navbar-legal-item-text"><?= l("lang.navigation.legal.branding") ?></span>
                                </a>
                                <a target="_blank" href="/<?= lp() ?>/legal/jetbrains" class="navbar-legal-item">
                                    <i class="bi bi-gift"></i>
                                    <span class="navbar-legal-item-text"><span class="navbar-legal-item-text-large"><?= l("lang.navigation.legal.support") ?> </span>JetBrains</span>
                                </a>
                            </div>

                            <hr>

                            <div class="navbar-notices">
                                <div class="navbar-notices-version">
                                    <a href="https://source.equestria.dev/equestria.dev/starshine" target="_blank" class="navbar-notices-version-link"><?= l("lang.navigation.legal.version") ?> <?= trim(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/version")) ?></a> · <?= l("lang.navigation.legal.made") ?> <i class="bi bi-heart-fill"></i> (<?= l("lang.navigation.legal.phpstorm") ?>)
                                </div>
                                <div class="navbar-notices-trademarks">
                                    <?= l("lang.navigation.legal.trademark") ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<main <?= $announcement !== "" ? 'class="with-announcement"' : '' ?>>
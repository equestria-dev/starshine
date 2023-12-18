<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/lang.php"; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Equestria.dev</title>
    <link rel="stylesheet" href="/assets/style.css" type="text/css">
    <link rel="stylesheet" href="/assets/icons.min.css" type="text/css">
    <link rel="icon" href="/assets/favicon.svg" type="image/svg+xml">
    <script src="/assets/main.js"></script>
</head>
<body>
    <nav id="navbar">
        <div id="navbar-inner">
            <a id="navbar-logo" href="/">
                <img alt="Equestria.dev" id="navbar-logo-img" src="/assets/logo.svg">
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
                            <div class="navbar-projects-flagships">
                                <a href="#" class="navbar-projects-flagship" id="navbar-projects-flagship-01">
                                    <img alt="Project icon" src="/assets/placeholder.jpg" class="navbar-projects-flagship-icon">
                                    <span class="navbar-projects-flagship-name">Lorem ipsum</span>
                                </a>
                                <a href="#" class="navbar-projects-flagship" id="navbar-projects-flagship-02">
                                    <img alt="Project icon" src="/assets/placeholder.jpg" class="navbar-projects-flagship-icon">
                                    <span class="navbar-projects-flagship-name">Dolor sit</span>
                                </a>
                                <a href="#" class="navbar-projects-flagship" id="navbar-projects-flagship-03">
                                    <img alt="Project icon" src="/assets/placeholder.jpg" class="navbar-projects-flagship-icon">
                                    <span class="navbar-projects-flagship-name">Amet consectetur</span>
                                </a>
                                <a href="#" class="navbar-projects-flagship" id="navbar-projects-flagship-04">
                                    <img alt="Project icon" src="/assets/placeholder.jpg" class="navbar-projects-flagship-icon">
                                    <span class="navbar-projects-flagship-name">Adipiscing elit</span>
                                </a>
                                <a href="#" class="navbar-projects-flagship" id="navbar-projects-flagship-01">
                                    <img alt="Project icon" src="/assets/placeholder.jpg" class="navbar-projects-flagship-icon">
                                    <span class="navbar-projects-flagship-name">Sed do eiusmod</span>
                                </a>
                                <a href="#" class="navbar-projects-flagship" id="navbar-projects-flagship-02">
                                    <img alt="Project icon" src="/assets/placeholder.jpg" class="navbar-projects-flagship-icon">
                                    <span class="navbar-projects-flagship-name">Tempor incididunt</span>
                                </a>
                                <a href="#" class="navbar-projects-flagship" id="navbar-projects-flagship-03">
                                    <img alt="Project icon" src="/assets/placeholder.jpg" class="navbar-projects-flagship-icon">
                                    <span class="navbar-projects-flagship-name">Ut labore</span>
                                </a>
                                <a href="#" class="navbar-projects-flagship" id="navbar-projects-flagship-04">
                                    <img alt="Project icon" src="/assets/placeholder.jpg" class="navbar-projects-flagship-icon">
                                    <span class="navbar-projects-flagship-name">Et dolore</span>
                                </a>
                            </div>

                            <hr>

                            <div class="navbar-projects-other">
                                <a href="#" class="navbar-projects-other-item" id="navbar-projects-other-item-01">Magna aliqua</a>
                                <a href="#" class="navbar-projects-other-item" id="navbar-projects-other-item-02">Ut enim ad</a>
                                <a href="#" class="navbar-projects-other-item" id="navbar-projects-other-item-03">Minim veniam</a>
                                <a href="#" class="navbar-projects-other-item" id="navbar-projects-other-item-04">Quis nostrud</a>
                                <a href="#" class="navbar-projects-other-item" id="navbar-projects-other-item-05">Exercitation ullamco</a>
                                <a href="#" class="navbar-projects-other-item" id="navbar-projects-other-item-06">Laboris nisi</a>
                                <a href="#" class="navbar-projects-other-item" id="navbar-projects-other-item-07">Ut aliquip ex ea</a>
                                <a href="#" class="navbar-projects-other-item" id="navbar-projects-other-item-08">Commodo consequat very long</a>
                                <a href="#" class="navbar-projects-other-item" id="navbar-projects-other-item-09">Duis aute irure</a>
                                <a href="#" class="navbar-projects-other-item" id="navbar-projects-other-item-01">Magna aliqua</a>
                                <a href="#" class="navbar-projects-other-item" id="navbar-projects-other-item-02">Ut enim ad</a>
                                <a href="#" class="navbar-projects-other-item" id="navbar-projects-other-item-03">Minim veniam</a>
                                <a href="#" class="navbar-projects-other-item" id="navbar-projects-other-item-04">Quis nostrud</a>
                                <a href="#" class="navbar-projects-other-item" id="navbar-projects-other-item-05">Exercitation ullamco</a>
                                <a href="#" class="navbar-projects-other-item" id="navbar-projects-other-item-06">Laboris nisi</a>
                                <a href="#" class="navbar-projects-other-item" id="navbar-projects-other-item-07">Ut aliquip ex ea</a>
                                <a href="#" class="navbar-projects-other-item" id="navbar-projects-other-item-08">Commodo consequat very long</a>
                                <a href="#" class="navbar-projects-other-item" id="navbar-projects-other-item-09">Duis aute irure</a>
                                <a href="#" class="navbar-projects-other-item" id="navbar-projects-other-item-01">Magna aliqua</a>
                                <a href="#" class="navbar-projects-other-item" id="navbar-projects-other-item-02">Ut enim ad</a>
                                <a href="#" class="navbar-projects-other-item" id="navbar-projects-other-item-03">Minim veniam</a>
                                <a href="#" class="navbar-projects-other-item" id="navbar-projects-other-item-04">Quis nostrud</a>
                                <a href="#" class="navbar-projects-other-item" id="navbar-projects-other-item-05">Exercitation ullamco</a>
                                <a href="#" class="navbar-projects-other-item" id="navbar-projects-other-item-06">Laboris nisi</a>
                                <a href="#" class="navbar-projects-other-item" id="navbar-projects-other-item-07">Ut aliquip ex ea</a>
                                <a href="#" class="navbar-projects-other-item" id="navbar-projects-other-item-08">Commodo consequat very long</a>
                                <a href="#" class="navbar-projects-other-item" id="navbar-projects-other-item-09">Duis aute irure</a>
                            </div>

                            <hr class="navbar-projects-archive-hr">

                            <a href="#" class="navbar-projects-archive">
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
                            <a href="" class="navbar-status navbar-status-ok">
                                <i class="bi bi-check-circle-fill"></i>
                                <span class="navbar-status-text"><?= l("lang.navigation.network.status.0") ?></span>
                            </a>

                            <div class="navbar-stats">
                                <div class="navbar-stats-item">
                                    <i class="bi bi-memory"></i>
                                    <span class="navbar-network-item-text">11 <?= l("lang.storage.gb") ?></span>
                                </div>
                                <div class="navbar-stats-item">
                                    <i class="bi bi-hdd"></i>
                                    <span class="navbar-network-item-text">1.3 <?= l("lang.storage.tb") ?></span>
                                </div>
                                <div class="navbar-stats-item">
                                    <i class="bi bi-wifi"></i>
                                    <span class="navbar-network-item-text">103 ms</span>
                                </div>
                            </div>

                            <hr>

                            <div class="navbar-network">
                                <a href="#" class="navbar-network-item">
                                    <i class="bi bi-person-circle"></i>
                                    <span class="navbar-network-item-text"><?= l("lang.navigation.network.account") ?></span>
                                </a>
                                <a href="#" class="navbar-network-item">
                                    <i class="bi bi-hdd-network"></i>
                                    <span class="navbar-network-item-text"><?= l("lang.navigation.network.infra") ?></span>
                                </a>
                                <a href="#" class="navbar-network-item">
                                    <i class="bi bi-lock"></i>
                                    <span class="navbar-network-item-text"><?= l("lang.navigation.network.security") ?></span>
                                </a>
                                <a href="#" class="navbar-network-item">
                                    <i class="bi bi-gitlab"></i>
                                    <span class="navbar-network-item-text">GitLab</span>
                                </a>
                                <a href="#" class="navbar-network-item">
                                    <i class="bi bi-bug"></i>
                                    <span class="navbar-network-item-text"><?= l("lang.navigation.network.bugs") ?></span>
                                </a>
                                <a href="#" class="navbar-network-item">
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
                            Hello, I am some content!
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
                                <a href="#" class="navbar-legal-item">
                                    <i class="bi bi-eye"></i>
                                    <span class="navbar-legal-item-text"><?= l("lang.navigation.legal.privacy") ?></span>
                                </a>
                                <a href="#" class="navbar-legal-item">
                                    <i class="bi bi-key"></i>
                                    <span class="navbar-legal-item-text"><?= l("lang.navigation.legal.terms.0") ?><span class="navbar-legal-item-text-large"> <?= l("lang.navigation.legal.terms.1") ?></span></span>
                                </a>
                                <a href="#" class="navbar-legal-item">
                                    <i class="bi bi-patch-check"></i>
                                    <span class="navbar-legal-item-text"><?= l("lang.navigation.legal.license") ?></span>
                                </a>
                                <a href="#" class="navbar-legal-item">
                                    <i class="bi bi-eyeglasses"></i>
                                    <span class="navbar-legal-item-text"><?= l("lang.navigation.legal.disclaimer") ?></span>
                                </a>
                                <a href="#" class="navbar-legal-item">
                                    <i class="bi bi-brush"></i>
                                    <span class="navbar-legal-item-text"><?= l("lang.navigation.legal.branding") ?></span>
                                </a>
                                <a href="#" class="navbar-legal-item">
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
    </nav>
</body>
</html>
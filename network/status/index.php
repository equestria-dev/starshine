<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/lang.php"; $title = l("lang.status.title"); require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/header.php"; $status = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/includes/data/status.json"), true); ?>

<div id="status-decoration" class="status-decoration-<?= match ($status["services"]["code"]) {
    0 => "ok",
    1 => "warn",
    default => "fail"
} ?>"></div>

<div class="container" id="status-container">
    <h1><?= l("lang.status.title") ?></h1>

    <div id="status-overview" class="status-overview-<?= match ($status["services"]["code"]) {
        0 => "ok",
        1 => "warn",
        default => "fail"
    } ?>">
        <div id="status-overview-icon">
            <i class="bi bi-<?= match ($status["services"]["code"]) {
                0 => "check2-circle",
                1 => "exclamation-triangle",
                default => "exclamation-octagon"
            } ?>" id="status-overview-icon-inner"></i>
        </div>
        <div id="status-overview-text">
            <h3 id="status-overview-text-title"><?= match ($status["services"]["code"]) {
                0 => l("lang.status.main.0"),
                1 => l("lang.status.main.1"),
                default => l("lang.status.main.2")
            } ?></h3>
            <div><?= match ($status["services"]["code"]) {
                0 => l("lang.status.description.0"),
                1 => l("lang.status.description.1"),
                default => l("lang.status.description.2")
            } ?></div>
        </div>
    </div>

    <?php if ($status["services"]["code"] !== 0): ?>
    <div id="status-affected" class="status-affected-<?= match ($status["services"]["code"]) {
        0 => "ok",
        1 => "warn",
        default => "fail"
    } ?>">
        <b><?= count($status["services"]["outages"]) === 1 ? l("lang.status.affected.0") : l("lang.status.affected.0") ?></b>
        <ul id="status-affected-list">
            <?php foreach ($status["services"]["outages"] as $service): ?>
            <li><?= $service[1] ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>

    <a href="https://status.equestria.dev" target="_blank" id="status-cta"><?= l("lang.status.page") ?></a>

    <hr class="status-separator">
    <h2><?= l("lang.status.stats.title") ?></h2>

    <div id="status-stats">
        <div class="status-stats-icon">
            <i class="status-stats-icon-inner bi bi-wifi"></i>
        </div>
        <div class="status-stats-text">
            <div>
                <div class="status-stats-text-label"><b><?= l("lang.status.stats.items.0") ?></b></div><div class="status-stats-mobile-separator"></div>
                <div class="status-stats-text-value"><?= round($status["services"]["ping"], 1) ?> ms</div>
            </div>
        </div>

        <div class="status-stats-icon">
            <i class="status-stats-icon-inner bi bi-memory"></i>
        </div>
        <div class="status-stats-text">
            <div>
                <div class="status-stats-text-label"><b><?= l("lang.status.stats.items.1") ?></b></div><div class="status-stats-mobile-separator"></div>
                <div class="status-stats-text-value"><?= size($status["servers"]["ram"], 2) ?>/<?= size($status["servers"]["ramTotal"], 2) ?></div>
            </div>
        </div>

        <div class="status-stats-icon">
            <i class="status-stats-icon-inner bi bi-hdd"></i>
        </div>
        <div class="status-stats-text">
            <div>
                <div class="status-stats-text-label"><b><?= l("lang.status.stats.items.2") ?></b></div><div class="status-stats-mobile-separator"></div>
                <div class="status-stats-text-value"><?= size($status["servers"]["disk"], 2) ?>/<?= size($status["servers"]["diskTotal"], 2) ?>,<div class="status-stats-mobile-separator"></div> <?= l("lang.status.stats.items.5") ?> <?= $status["servers"]["io"] ?> ms</div>
            </div>
        </div>

        <div class="status-stats-icon">
            <i class="status-stats-icon-inner bi bi-cpu"></i>
        </div>
        <div class="status-stats-text">
            <div>
                <div class="status-stats-text-label"><b><?= l("lang.status.stats.items.3") ?></b></div><div class="status-stats-mobile-separator"></div>
                <div class="status-stats-text-value"><?= round($status["servers"]["ghzMax"], 2) ?> GHz × <?= $status["servers"]["cores"] ?> <?= l("lang.status.stats.items.6") ?>,<div class="status-stats-mobile-separator"></div> <?= l("lang.status.stats.items.4") ?> <?= size($status["servers"]["cache"], 2) ?>, <?= round($status["servers"]["cpuLoad"], 2) ?>% <?= l("lang.status.stats.used") ?></div><br>
            </div>
        </div>

        <div class="status-stats-icon">
            <i class="status-stats-icon-inner bi bi-gear"></i>
        </div>
        <div class="status-stats-text">
            <div>
                <div class="status-stats-text-label"><b><?= l("lang.status.stats.items.7") ?></b></div><div class="status-stats-mobile-separator"></div>
                <div class="status-stats-text-value"><?php uasort($status["servers"]["kernel"], function ($a, $b) {
                    return version_compare($a, $b);
                }); $status["servers"]["kernel"] = array_values($status["servers"]["kernel"]); ?>Linux <?= $status["servers"]["kernel"][0] ?>-<?= $status["servers"]["kernel"][count($status["servers"]["kernel"]) - 1] ?>, <?= $status["servers"]["processes"] ?> <?= l("lang.status.stats.items.8") ?></div><br>
            </div>
        </div>
    </div>

    <hr class="status-separator">

    <div id="status-update"><?= l("lang.status.update") ?> <?= timeAgo($status["updated"]) ?></div>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.php"; ?>
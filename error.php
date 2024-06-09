<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/lang.php";
if (!isset($c)) $c = 404;
$title = l("lang.error.title") . " $c"; require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/header.php"; ?>

<div id="error-page">
    <div id="error-page-code"><?= $c ?></div>
    <div id="error-page-instructions">
        <div id="error-page-instructions-inner">
            <h1 id="error-page-description"><?= match ($c) {
                404 => l("lang.error.messages.404"),
                403 => l("lang.error.messages.403"),
                401 => l("lang.error.messages.401"),
                400 => l("lang.error.messages.400"),
                500 => l("lang.error.messages.500"),
                501 => l("lang.error.messages.501"),
                502 => l("lang.error.messages.502"),
                503 => l("lang.error.messages.503"),
                504 => l("lang.error.messages.504"),
                default => l("lang.error.messages.default"),
            } ?></h1>
            <p><?= match ($c) {
                404 => l("lang.error.descriptions.404"),
                403 => l("lang.error.descriptions.403"),
                401 => l("lang.error.descriptions.401"),
                400 => l("lang.error.descriptions.400"),
                500 => l("lang.error.descriptions.500"),
                501 => l("lang.error.descriptions.501"),
                502 => l("lang.error.descriptions.502"),
                503 => l("lang.error.descriptions.503"),
                504 => l("lang.error.descriptions.504"),
                default => l("lang.error.descriptions.default"),
            } ?></p>
            <div id="error-page-links">
                <a href="/" id="error-page-link-1" class="error-page-link"><i class="bi bi-house"></i>&nbsp;&nbsp;<?= l("lang.error.actions.home") ?></a>
                <a href="https://status.equestria.dev/" target="_blank" id="error-page-link-2" class="error-page-link"><i class="bi bi-gear"></i>&nbsp;&nbsp;<?= l("lang.error.actions.status") ?></a>
                <a href="mailto:hello@equestria.dev" target="_blank" id="error-page-link-3" class="error-page-link"><i class="bi bi-envelope"></i>&nbsp;&nbsp;<?= l("lang.error.actions.email") ?></a>
            </div>
        </div>
    </div>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.php"; ?>

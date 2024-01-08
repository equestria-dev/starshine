<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/lang.php"; $title = l("lang.legal.license.title"); require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/header.php"; $status = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/includes/data/status.json"), true); ?>

<div class="container" id="legal-container">
    <div id="legal-container-inner">
        <h1><?= l("lang.legal.license.bigtitle") ?></h1>
        <p><?= l("lang.legal.license.intro") ?></p>

        <h2><?= l("lang.legal.license.sections.0") ?></h2>
        <p><?= l("lang.legal.license.text.0.0") ?></p>

        <div id="legal-license">
            <p><?= l("lang.legal.license.text.0.1") ?></p>
            <p>Copyright © 2011-<?= date('Y') ?> Equestria.dev Developers</p>
            <p><?= l("lang.legal.license.text.0.2") ?></p>
            <p><?= l("lang.legal.license.text.0.3") ?></p>
            <p><?= l("lang.legal.license.text.0.4") ?></p>
        </div>

        <h2><?= l("lang.legal.license.sections.1") ?></h2>
        <p><?= l("lang.legal.license.text.1.0") ?></p>
        <p><?= l("lang.legal.license.text.1.1") ?></p>
        <p><?= l("lang.legal.license.text.1.2") ?></p>

        <ul>
            <li><?= l("lang.legal.license.text.1.3") ?></li>
            <li><?= l("lang.legal.license.text.1.4") ?></li>
            <li><?= l("lang.legal.license.text.1.5") ?></li>
            <li><?= l("lang.legal.license.text.1.6") ?></li>
            <li><?= l("lang.legal.license.text.1.7") ?></li>
        </ul>

        <p><?= l("lang.legal.license.text.1.8") ?></p>

        <?php if (lp() === "en"): ?>
        <hr>
        <p><i><b><?= l("lang.legal.license.translation.0") ?></b> <?= l("lang.legal.license.translation.1") ?></i></p>
        <?php endif; ?>
    </div>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.php"; ?>
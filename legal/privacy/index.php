<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/lang.php"; $title = l("lang.legal.privacy.title"); require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/header.php"; $status = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/includes/data/status.json"), true); ?>

<div class="container" id="legal-container">
    <div id="legal-container-inner">
        <h1><?= l("lang.legal.privacy.bigtitle") ?></h1>
        <p><?= l("lang.legal.privacy.intro") ?></p>

        <h2>1. <?= l("lang.legal.privacy.sections.0") ?></h2>
        <p><?= l("lang.legal.privacy.text.0.0") ?></p>
        <p><?= l("lang.legal.privacy.text.0.1") ?></p>
        <p><?= l("lang.legal.privacy.text.0.2") ?></p>

        <h2>2. <?= l("lang.legal.privacy.sections.1") ?></h2>
        <p><?= l("lang.legal.privacy.text.1.0") ?></p>
        <p><?= l("lang.legal.privacy.text.1.1") ?></p>
        <p><?= l("lang.legal.privacy.text.1.2") ?></p>

        <h2>3. <?= l("lang.legal.privacy.sections.2") ?></h2>
        <p><?= l("lang.legal.privacy.text.2.0") ?></p>
        <p><?= l("lang.legal.privacy.text.2.1") ?></p>
        <p><?= l("lang.legal.privacy.text.2.2") ?></p>

        <h2>4. <?= l("lang.legal.privacy.sections.3") ?></h2>
        <p><?= l("lang.legal.privacy.text.3.0") ?></p>
        <p><?= l("lang.legal.privacy.text.3.1") ?></p>
        <p><?= l("lang.legal.privacy.text.3.2") ?></p>

        <?php if (lp() !== "en"): ?>
        <hr>
        <p><i><b><?= l("lang.legal.privacy.translation.0") ?></b> <?= l("lang.legal.privacy.translation.1") ?></i></p>
        <?php endif; ?>
    </div>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.php"; ?>
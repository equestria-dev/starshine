<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/lang.php"; $title = l("lang.legal.terms.title"); require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/header.php"; $status = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/includes/data/status.json"), true); ?>

<div class="container" id="legal-container">
    <div id="legal-container-inner">
        <h1><?= l("lang.legal.terms.bigtitle") ?></h1>

        <h2><?= l("lang.legal.terms.sections.0") ?></h2>
        <p><?= l("lang.legal.terms.intro") ?></p>

        <h2>1. <?= l("lang.legal.terms.sections.1") ?></h2>
        <p><?= l("lang.legal.terms.text.0.0") ?></p>
        <p><?= l("lang.legal.terms.text.0.1") ?></p>
        <p><?= l("lang.legal.terms.text.0.2") ?></p>

        <h2>2. <?= l("lang.legal.terms.sections.2") ?></h2>
        <p><?= l("lang.legal.terms.text.1.0") ?></p>
        <p><?= l("lang.legal.terms.text.1.1") ?></p>

        <h2>3. <?= l("lang.legal.terms.sections.3") ?></h2>
        <p><?= l("lang.legal.terms.text.2.0") ?></p>
        <p><?= l("lang.legal.terms.text.2.1") ?></p>

        <h2>4. <?= l("lang.legal.terms.sections.4") ?></h2>
        <p><?= l("lang.legal.terms.text.3.0") ?></p>
        <p><?= l("lang.legal.terms.text.3.1") ?></p>
        <p><?= l("lang.legal.terms.text.3.2") ?></p>

        <h2>5. <?= l("lang.legal.terms.sections.5") ?></h2>
        <p><?= l("lang.legal.terms.text.4.0") ?></p>
        <p><?= l("lang.legal.terms.text.4.1") ?></p>
        <p><?= l("lang.legal.terms.text.4.2") ?></p>

        <?php if (lp() !== "en"): ?>
            <hr>
            <p><i><b><?= l("lang.legal.terms.translation.0") ?></b> <?= l("lang.legal.terms.translation.1") ?></i></p>
        <?php endif; ?>
    </div>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.php"; ?>
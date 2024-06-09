<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/lang.php"; $title = l("lang.legal.license.title"); require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/header.php"; $status = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/includes/data/status.json"), true); ?>

<div class="container" id="legal-container">
    <div id="legal-container-inner">
        <h1><?= l("lang.legal.license.bigtitle") ?></h1>
        <p><?= l("lang.legal.license.intro") ?></p>

        <h2><?= l("lang.legal.license.sections.0") ?></h2>
        <p><?= l("lang.legal.license.text.0.0") ?></p>

        <div id="legal-license">
            <p>Equestria.dev Free, Libre and Open-Source Software<br>
                Copyright (C) 2011-<?= date('Y') ?> Equestria.dev Developers</p>

            <p>This program is free software: you can redistribute it and/or modify
                it under the terms of the GNU Affero General Public License as published
                by the Free Software Foundation, either version 3 of the License, or
                (at your option) any later version.</p>

            <p>This program is distributed in the hope that it will be useful,
                but WITHOUT ANY WARRANTY; without even the implied warranty of
                MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
                GNU Affero General Public License for more details.</p>

            <p>You should have received a copy of the GNU Affero General Public License
                along with this program.  If not, see &lt;<a target="_blank" class="legal-link" href="https://www.gnu.org/licenses/">https://www.gnu.org/licenses/</a>&gt;.</p>
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

        <?php if (lp() !== "en"): ?>
        <hr>
        <p><i><b><?= l("lang.legal.license.translation.0") ?></b> <?= l("lang.legal.license.translation.1") ?></i></p>
        <?php endif; ?>
    </div>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.php"; ?>

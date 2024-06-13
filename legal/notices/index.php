<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/lang.php"; $title = l("lang.legal.notices.title"); require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/header.php"; $status = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/includes/data/status.json"), true); ?>

<div class="container" id="legal-container">
    <div id="legal-container-inner">
        <h1><?= l("lang.legal.notices.title") ?></h1>
        <p><i><?= l("lang.legal.notices.privacy") ?></i></p>

        <h3><?= l("lang.legal.notices.webmasters.0") ?></h3>
        <p><?= l("lang.legal.notices.webmasters.1") ?> Mia Starscouts (<a class="legal-link" href="mailto:raindrops@equestria.dev">raindrops@equestria.dev</a>). <?= l("lang.legal.notices.webmasters.2") ?></p>

        <h3><?= l("lang.legal.notices.servers") ?></h3>
        <p><?= l("lang.legal.notices.locations") ?></p>
        <ul>
            <li class="legal-location">
                <b><?= l("lang.legal.notices.property") ?></b> Mia Starscouts (<a class="legal-link" href="mailto:raindrops@equestria.dev">raindrops@equestria.dev</a>)<br>
                <b><?= l("lang.legal.notices.physical") ?></b> Loiret, Centre Val-de-Loire, France<br>
                <b><?= l("lang.legal.notices.isp") ?></b> <a class="legal-link" href="https://www.orange.fr/pages-juridiques/infos-legales.html" target="_blank">Orange SAS</a>
            </li>
            <li class="legal-location">
                <b><?= l("lang.legal.notices.property") ?></b> OVH SAS (<a class="legal-link" href="mailto:abuse@ovh.net">abuse@ovh.net</a>)<br>
                <b><?= l("lang.legal.notices.physical") ?></b> Frankfurt, Hessen, Deutschland<br>
                <b><?= l("lang.legal.notices.isp") ?></b> <a class="legal-link" href="https://www.ovhcloud.com/fr/terms-and-conditions/" target="_blank">OVH SAS</a>
            </li>
            <li class="legal-location">
                <b><?= l("lang.legal.notices.property") ?></b> -<br>
                <b><?= l("lang.legal.notices.physical") ?></b> Missouri, United States<br>
                <b><?= l("lang.legal.notices.isp") ?></b> <a class="legal-link" href="https://www.spectrum.com/policies/terms-of-service" target="_blank">Spectrum</a> (<a class="legal-link" href="https://www.spectrum.net" target="_blank"><?= l("lang.legal.notices.us") ?></a>)
            </li>
        </ul>

        <h3><?= l("lang.legal.notices.data") ?></h3>
        <p><?= l("lang.legal.notices.howto") ?> <a class="legal-link" href="mailto:starscouts@equestria.dev">starscouts@equestria.dev</a>. <?= l("lang.legal.notices.law") ?></p>

        <h3><?= l("lang.legal.notices.gov") ?></h3>
        <p><?= l("lang.legal.notices.pgp") ?><code>AEA7 73DB 0620 C57C FFB0 7A91 EFBD C684 35A5 74B7</code> (<a href="/pubkey" target="_blank" class="legal-link"><?= l("lang.legal.notices.key") ?></a>, <a href="https://github.com/starscouts.gpg" target="_blank" class="legal-link"><?= l("lang.legal.notices.alt") ?></a>).</p>
        <a class="legal-link" href="/warrant" target="_blank"><?= l("lang.legal.notices.plain") ?></a>
    </div>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.php"; ?>

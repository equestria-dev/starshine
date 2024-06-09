</main>

<footer class="container">
    <div id="footer-copyright">
        <div>
            Copyright © 2011-<?= date('Y') ?> Equestria.dev Developers. <?= l("lang.footer.copyright") ?>
        </div>
    </div>
    <div id="footer-links">
        <div>
            <a href="/legal/privacy"><?= l("lang.navigation.legal.privacy") ?></a> | <a href="/legal/terms"><?= l("lang.navigation.legal.terms.0") ?> <?= l("lang.navigation.legal.terms.1") ?></a> | <a href="/legal/branding"><?= l("lang.navigation.legal.branding") ?></a> | <a href="/legal/notices"><?= l("lang.navigation.legal.disclaimer") ?></a>
        </div>
    </div>
    <div id="footer-language">
        <a href="https://vercel.com/?utm_source=powered-by-vercel" target="_blank">
            <img alt="Powered by Vercel" src="/assets/img/powered-by-vercel.svg">
        </a>
    </div>
</footer>

<?php if (str_contains($_SERVER['SERVER_SOFTWARE'], "Development Server") && !str_contains($_SERVER['HTTP_USER_AGENT'], "Starshine/")): global $start; ?>
    <div style="pointer-events: none; position: fixed; background-color: rgba(0, 0, 0, .5); bottom: 0; left: 0; right: 0; color: white; text-align: center;"><b>Not for production</b> · Starshine <?= trim(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/version")) ?> · PHP <?= PHP_VERSION ?> · <?= php_uname('s') ?> <?= php_uname('r') ?> · <?= get_current_user() ?>@<?= gethostname() ?> (<?= getmypid() ?> +<?= count(get_included_files()) ?>) · ∆t = <?= round((microtime(true) - $start) * 1000, 2) ?>ms</div>
<?php endif; ?>

</body>
</html>

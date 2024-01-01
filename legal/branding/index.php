<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/lang.php"; $title = l("lang.legal.branding.page"); require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/header.php"; $status = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/includes/data/status.json"), true); ?>

<div class="container" id="legal-container">
    <h1><?= l("lang.legal.branding.title") ?></h1>
    <p><?= l("lang.legal.branding.intro") ?></p>
    <p><?= l("lang.legal.branding.copyright") ?></p>

    <h2 class="legal-branding-title"><?= l("lang.legal.branding.logo.title") ?></h2>
    <p><?= l("lang.legal.branding.logo.message") ?></p>

    <div class="legal-grid-3">
        <div class="legal-card legal-card-black">
            <div class="legal-card-body">
                <img alt="" src="/assets/brand/wordmark/dark/wordmarkdark.svg" class="legal-brand">
                <div class="asset-download asset-download-dark">
                    <a download href="/assets/brand/wordmark/dark/wordmarkdark.svg">.svg&nbsp;</a><a download href="/assets/brand/wordmark/dark/wordmarkdark.png">.png</a>
                </div>
            </div>
        </div>
        <div class="legal-card legal-card-white">
            <div class="legal-card-body">
                <img alt="" src="/assets/brand/wordmark/light/wordmarklight.svg" class="legal-brand">
                <div class="asset-download asset-download-light">
                    <a download href="/assets/brand/wordmark/light/wordmarklight.svg">.svg&nbsp;</a><a download href="/assets/brand/wordmark/light/wordmarklight.png">.png</a>
                </div>
            </div>
        </div>
        <div class="legal-card legal-card-colored">
            <div class="legal-card-body">
                <img alt="" src="/assets/brand/wordmark/colored/wordmarkcolored.svg" class="legal-brand">
                <div class="asset-download asset-download-dark">
                    <a download href="/assets/brand/wordmark/colored/wordmarkcolored.svg">.svg&nbsp;</a><a download href="/assets/brand/wordmark/colored/wordmarkcolored.png">.png</a>
                </div>
            </div>
        </div>
    </div>

    <h2 class="legal-branding-title"><?= l("lang.legal.branding.icon.title") ?></h2>
    <p><?= l("lang.legal.branding.icon.message") ?></p>

    <div class="legal-grid-3">
        <div class="legal-card legal-card-black">
            <div class="legal-card-body">
                <img alt="" src="/assets/brand/wing/dark/wingdark.svg" class="legal-brand">
                <div class="asset-download asset-download-dark">
                    <a download href="/assets/brand/wing/dark/wingdark.svg">.svg&nbsp;</a><a download href="/assets/brand/wing/dark/wingdark.png">.png</a>
                </div>
            </div>
        </div>
        <div class="legal-card legal-card-white">
            <div class="legal-card-body">
                <img alt="" src="/assets/brand/wing/light/winglight.svg" class="legal-brand">
                <div class="asset-download asset-download-light">
                    <a download href="/assets/brand/wing/light/winglight.svg">.svg&nbsp;</a><a download href="/assets/brand/wing/light/winglight.png">.png</a>
                </div>
            </div>
        </div>
        <div class="legal-card legal-card-colored">
            <div class="legal-card-body">
                <img alt="" src="/assets/brand/wing/colored/wingcolored.svg" class="legal-brand">
                <div class="asset-download asset-download-dark">
                    <a download href="/assets/brand/wing/colored/wingcolored.svg">.svg&nbsp;</a><a download href="/assets/brand/wing/colored/wingcolored.png">.png</a>
                </div>
            </div>
        </div>
    </div>

    <h2 class="legal-branding-title"><?= l("lang.legal.branding.spacing.title") ?></h2>
    <p><?= l("lang.legal.branding.spacing.message") ?><br><?= l("lang.legal.branding.spacing.scale") ?></p>
    <div class="legal-grid-2">
        <div>
            <img alt="" src="/assets/brand/spacing-full.svg" class="legal-branding-spacing">
        </div>
        <div>
            <img alt="" src="/assets/brand/spacing-icon.svg" class="legal-branding-spacing">
        </div>
    </div>
    <div class="legal-grid-2">
        <div>
            <img alt="" src="/assets/brand/size-full.svg" class="legal-branding-spacing">
        </div>
        <div>
            <img alt="" src="/assets/brand/size-icon.svg" class="legal-branding-spacing">
        </div>
    </div>
    <p><?= l("lang.legal.branding.spacing.notice") ?></p>

    <h2 class="legal-branding-title"><?= l("lang.legal.branding.dont.title") ?></h2>
    <div id="donts-desktop">
        <div class="legal-grid-4">
            <div>
                <img alt="" src="/assets/brand/dont-1.svg" class="legal-branding-instruction">
            </div>
            <div>
                <img alt="" src="/assets/brand/dont-2.svg" class="legal-branding-instruction">
            </div>
            <div>
                <img alt="" src="/assets/brand/dont-3.svg" class="legal-branding-instruction">
            </div>
            <div>
                <img alt="" src="/assets/brand/dont-4.svg" class="legal-branding-instruction">
            </div>
        </div>
        <div class="legal-grid-4">
            <div>
                <h5 class="legal-h5"><?= l("lang.legal.branding.dont.messages.0") ?></h5>
            </div>
            <div>
                <h5 class="legal-h5"><?= l("lang.legal.branding.dont.messages.1") ?></h5>
            </div>
            <div>
                <h5 class="legal-h5"><?= l("lang.legal.branding.dont.messages.2") ?></h5>
            </div>
            <div>
                <h5 class="legal-h5"><?= l("lang.legal.branding.dont.messages.3") ?></h5>
            </div>
        </div>
        <div class="legal-grid-4">
            <div>
                <p><?= l("lang.legal.branding.dont.descriptions.0") ?></p>
            </div>
            <div>
                <p><?= l("lang.legal.branding.dont.descriptions.1") ?></p>
            </div>
            <div>
                <p><?= l("lang.legal.branding.dont.descriptions.2") ?></p>
            </div>
            <div>
                <p><?= l("lang.legal.branding.dont.descriptions.3") ?></p>
            </div>
        </div>
    </div>
    <div id="donts-mobile">
        <div class="legal-grid-gapped">
            <div>
                <img alt="" src="/assets/brand/dont-1.svg" class="legal-branding-instruction">

                <h5 class="legal-h5"><?= l("lang.legal.branding.dont.messages.0") ?></h5>
                <p><?= l("lang.legal.branding.dont.descriptions.0") ?></p>
            </div>
            <div>
                <img alt="" src="/assets/brand/dont-2.svg" class="legal-branding-instruction">

                <h5 class="legal-h5"><?= l("lang.legal.branding.dont.messages.1") ?></h5>
                <p><?= l("lang.legal.branding.dont.descriptions.1") ?></p>
            </div>
            <div>
                <img alt="" src="/assets/brand/dont-3.svg" class="legal-branding-instruction">

                <h5 class="legal-h5"><?= l("lang.legal.branding.dont.messages.2") ?></h5>
                <p><?= l("lang.legal.branding.dont.descriptions.2") ?></p>
            </div>
            <div>
                <img alt="" src="/assets/brand/dont-4.svg" class="legal-branding-instruction">

                <h5 class="legal-h5"><?= l("lang.legal.branding.dont.messages.3") ?></h5>
                <p><?= l("lang.legal.branding.dont.descriptions.3") ?></p>
            </div>
        </div>
    </div>

    <div class="legal-grid-2">
        <div>
            <h4 class="legal-h4"><?= l("lang.legal.branding.dont.too.title") ?></h4>
            <p><?= l("lang.legal.branding.dont.too.text.0") ?></p>
            <p><?= l("lang.legal.branding.dont.too.text.1") ?></p>
        </div>
        <div>
            <h4 class="legal-h4"><?= l("lang.legal.branding.dont.attribution.title") ?></h4>
            <p><?= l("lang.legal.branding.dont.attribution.message") ?></p>
            <div class="legal-copyright"><?= l("lang.legal.branding.dont.attribution.copyright.global.0") ?> Copyright © <?= "2023-" . date('Y') ?> Equestria.dev, <?= l("lang.legal.branding.dont.attribution.copyright.global.1") ?>.</div>
            <div class="legal-copyright"><?= str_replace("lkjazkieza", '<span class="legal-copyright-placeholder">[' . l("lang.legal.branding.dont.attribution.copyright.product.1") . ']</span>', l("lang.legal.branding.dont.attribution.copyright.product.0")) ?> Copyright © <?= "2023-" . date('Y') ?> Equestria.dev, <?= l("lang.legal.branding.dont.attribution.copyright.global.1") ?>.</div>
        </div>
        <div>
            <h4 class="legal-h4"><?= l("lang.legal.branding.dont.impersonation.title") ?></h4>
            <p><?= l("lang.legal.branding.dont.impersonation.text.0") ?></p>
            <p><?= l("lang.legal.branding.dont.impersonation.text.1") ?></p>
        </div>
        <div>
            <h4 class="legal-h4"><?= l("lang.legal.branding.dont.endorsement.title") ?></h4>
            <p><?= l("lang.legal.branding.dont.endorsement.text.0") ?></p>
            <p><?= l("lang.legal.branding.dont.endorsement.text.1") ?></p>
        </div>
    </div>

    <h2 class="legal-branding-title"><?= l("lang.legal.branding.color.title") ?></h2>
    <p><?= l("lang.legal.branding.color.intro") ?></p>

    <p><?= l("lang.legal.branding.color.formats.title") ?> <a href="#" id="legal-color-switch-oklch" class="legal-color-switch-active legal-link"><?= l("lang.legal.branding.color.formats.oklch") ?></a> · <a href="#" id="legal-color-switch-rgb" class="legal-link"><?= l("lang.legal.branding.color.formats.rgb") ?></a> · <a href="#" id="legal-color-switch-cmyk" class="legal-link"><?= l("lang.legal.branding.color.formats.cmyk") ?></a></p>

    <div class="legal-color-box legal-color-format-oklch" id="legal-color-box">
        <div class="legal-color">
            <div class="legal-color-1 legal-color-inner legal-color-light" style="background-color: #d6acf9;">
                <div class="legal-color-inner-name"><?= l("lang.legal.branding.color.list.0") ?></div>
                <div class="legal-color-inner-codes"><span class="legal-color-inner-code-rgb">#D6ACF9</span><span class="legal-color-inner-code-cmyk">14, 31, 0, 2</span><span class="legal-color-inner-code-oklch">80.86%, 0.115, 308.9</span></div>
            </div>
            <div class="legal-color-2 legal-color-inner legal-color-dark" style="background-color: #836fba;">
                <div class="legal-color-inner-name"><?= l("lang.legal.branding.color.list.1") ?></div>
                <div class="legal-color-inner-codes"><span class="legal-color-inner-code-rgb">#836FBA</span><span class="legal-color-inner-code-cmyk">30, 40, 0, 27</span><span class="legal-color-inner-code-oklch">59.2%, 0.114, 294.97</span></div>
            </div>
        </div>
        <div class="legal-color">
            <div class="legal-color-1 legal-color-inner legal-color-light" style="background-color: #87e0d8;">
                <div class="legal-color-inner-name"><?= l("lang.legal.branding.color.list.2") ?></div>
                <div class="legal-color-inner-codes"><span class="legal-color-inner-code-rgb">#87E0D8</span><span class="legal-color-inner-code-cmyk">40, 0, 4, 12</span><span class="legal-color-inner-code-oklch">84.85%, 0.087, 188.81</span></div>
            </div>
            <div class="legal-color-2 legal-color-inner legal-color-dark" style="background-color: #618cc7;">
                <div class="legal-color-inner-name"><?= l("lang.legal.branding.color.list.3") ?></div>
                <div class="legal-color-inner-codes"><span class="legal-color-inner-code-rgb">#618CC7</span><span class="legal-color-inner-code-cmyk">51, 30, 0, 22</span><span class="legal-color-inner-code-oklch">63.67%, 0.101, 256.51</span></div>
            </div>
        </div>
        <div class="legal-color">
            <div class="legal-color-1 legal-color-inner legal-color-light legal-color-bordered" style="background-color: #ffffff;">
                <div class="legal-color-inner-name"><?= l("lang.legal.branding.color.list.4") ?></div>
                <div class="legal-color-inner-codes"><span class="legal-color-inner-code-rgb">#FFFFFF</span><span class="legal-color-inner-code-cmyk">0, 0, 0, 0</span><span class="legal-color-inner-code-oklch">100%, 0, 0</span></div>
            </div>
            <div class="legal-color-2 legal-color-inner legal-color-dark" style="background-color: #000000;">
                <div class="legal-color-inner-name"><?= l("lang.legal.branding.color.list.5") ?></div>
                <div class="legal-color-inner-codes"><span class="legal-color-inner-code-rgb">#000000</span><span class="legal-color-inner-code-cmyk">0, 0, 0, 100</span><span class="legal-color-inner-code-oklch">0%, 0, 0</span></div>
            </div>
        </div>

        <div class="legal-color">
            <div class="legal-color-1 legal-color-inner legal-color-dark" style="background-color: #420788;">
                <div class="legal-color-inner-name"><?= l("lang.legal.branding.color.list.6") ?></div>
                <div class="legal-color-inner-codes"><span class="legal-color-inner-code-rgb">#420788</span><span class="legal-color-inner-code-cmyk">51, 95, 0, 47</span><span class="legal-color-inner-code-oklch">33.76%, 0.18, 293.93</span></div>
            </div>
            <div class="legal-color-2 legal-color-inner legal-color-dark" style="background-color: #420788;">
                <div class="legal-color-inner-name"><?= l("lang.legal.branding.color.list.7") ?></div>
                <div class="legal-color-inner-codes"><span class="legal-color-inner-code-rgb">#420788</span><span class="legal-color-inner-code-cmyk">51, 95, 0, 47</span><span class="legal-color-inner-code-oklch">33.76%, 0.18, 293.93</span></div>
            </div>
        </div>
        <div class="legal-color">
            <div class="legal-color-1 legal-color-inner legal-color-light" style="background-color: #ff7477;">
                <div class="legal-color-inner-name"><?= l("lang.legal.branding.color.list.8") ?></div>
                <div class="legal-color-inner-codes"><span class="legal-color-inner-code-rgb">#FF7477</span><span class="legal-color-inner-code-cmyk">0, 55, 53, 0</span><span class="legal-color-inner-code-oklch">72.58%, 0.169, 20.96</span></div>
            </div>
            <div class="legal-color-2 legal-color-inner legal-color-dark" style="background-color: #994546;">
                <div class="legal-color-inner-name"><?= l("lang.legal.branding.color.list.9") ?></div>
                <div class="legal-color-inner-codes"><span class="legal-color-inner-code-rgb">#994546</span><span class="legal-color-inner-code-cmyk">0, 55, 54, 40</span><span class="legal-color-inner-code-oklch">49.94%, 0.113, 21.3</span></div>
            </div>
        </div>
        <div class="legal-color">
            <div class="legal-color-1 legal-color-inner legal-color-dark" style="background-color: #c100a7;">
                <div class="legal-color-inner-name"><?= l("lang.legal.branding.color.list.10") ?></div>
                <div class="legal-color-inner-codes"><span class="legal-color-inner-code-rgb">#C100A7</span><span class="legal-color-inner-code-cmyk">0, 100, 13, 24</span><span class="legal-color-inner-code-oklch">55.39%, 0.245, 336.05</span></div>
            </div>
            <div class="legal-color-2 legal-color-inner legal-color-dark" style="background-color: #870075;">
                <div class="legal-color-inner-name"><?= l("lang.legal.branding.color.list.11") ?></div>
                <div class="legal-color-inner-codes"><span class="legal-color-inner-code-rgb">#870075</span><span class="legal-color-inner-code-cmyk">0, 100, 13, 47</span><span class="legal-color-inner-code-oklch">42.62%, 0.1888, 335.7</span></div>
            </div>
        </div>
        <div class="legal-color">
            <div class="legal-color-1 legal-color-inner legal-color-light" style="background-color: #eeeeee;">
                <div class="legal-color-inner-name"><?= l("lang.legal.branding.color.list.12") ?></div>
                <div class="legal-color-inner-codes"><span class="legal-color-inner-code-rgb">#EEEEEE</span><span class="legal-color-inner-code-cmyk">0, 0, 0, 7</span><span class="legal-color-inner-code-oklch">94.91%, 0, 0</span></div>
            </div>
            <div class="legal-color-2 legal-color-inner legal-color-dark" style="background-color: #3c3c3c;">
                <div class="legal-color-inner-name"><?= l("lang.legal.branding.color.list.13") ?></div>
                <div class="legal-color-inner-codes"><span class="legal-color-inner-code-rgb">#3C3C3C</span><span class="legal-color-inner-code-cmyk">0, 0, 0, 76</span><span class="legal-color-inner-code-oklch">35.62%, 0, 0</span></div>
            </div>
        </div>
    </div>

    <h2 class="legal-branding-title"><?= l("lang.legal.branding.more.title") ?></h2>
    <p><?= l("lang.legal.branding.more.text") ?></p>
    <a href="/assets/brand/brandkit3.zip" id="legal-branding-cta"><?= l("lang.legal.branding.more.cta") ?></a> * <?= l("lang.legal.branding.more.notice") ?>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.php"; ?>
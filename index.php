<?php $title = null; require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/header.php"; ?>

<div id="hero">
    <div id="hero-inner">
        <div id="hero-tagline" class="container">
            <div id="hero-tagline-inner">
                <div id="hero-tagline-text"><?= l("lang.home.hero.title.0") ?><br><?= l("lang.home.hero.title.1") ?> <span id="hero-tagline-underline"><?= l("lang.home.hero.title.2") ?></span></div>
                <div id="hero-tagline-cta" onclick="Starshine.Home.heroCta();"><?= l("lang.home.hero.cta") ?> <i class="bi bi-chevron-down"></i></div>
            </div>
        </div>
        <div id="hero-logo" class="container">
            <video id="hero-logo-img" src="/assets/img/intro.webm" autoplay></video>
        </div>
    </div>
</div>

<div id="hero-transition"></div>

<div id="home">
    <div id="home-inner">
        <div class="container" id="home-container">
            <div class="home-category">
                <div class="home-category-icon">
                    <i class="bi bi-journal-code"></i>
                </div>
                <div class="home-category-title"><?= l("lang.home.categories.dev.title") ?></div>
                <div class="home-category-description"><?= l("lang.home.categories.dev.description") ?></div>
                <div class="home-category-cta" onclick="Starshine.Navbar.item('projects');"><?= l("lang.home.categories.dev.cta") ?></div>
            </div>
            <div class="home-category">
                <div class="home-category-icon">
                    <i class="bi bi-hdd-network"></i>
                </div>
                <div class="home-category-title"><?= l("lang.home.categories.network.title") ?></div>
                <div class="home-category-description"><?= l("lang.home.categories.network.description") ?></div>
                <div class="home-category-cta" onclick="Starshine.Navbar.item('network');"><?= l("lang.home.categories.network.cta") ?></div>
            </div>
            <div class="home-category">
                <div class="home-category-icon">
                    <i class="bi bi-shield-check"></i>
                </div>
                <div class="home-category-title"><?= l("lang.home.categories.privacy.title") ?></div>
                <div class="home-category-description"><?= l("lang.home.categories.privacy.description") ?></div>
                <div class="home-category-cta" onclick="Starshine.Navbar.item('legal');"><?= l("lang.home.categories.privacy.cta") ?></div>
            </div>
        </div>

        <hr id="home-separator" class="container-margin">

        <div class="container" id="home-contact-desktop">
            <div class="home-contact-icon">
                <i class="bi bi-envelope"></i>
            </div>
            <div id="home-contact-desktop-text">
                <div id="home-contact-desktop-title"><?= l("lang.home.contact.title") ?></div>
                <div id="home-contact-desktop-description"><?= l("lang.home.contact.description") ?></div>
                <div class="home-contact-cta" onclick="Starshine.Navbar.item('contact');"><?= l("lang.home.contact.cta") ?></div>
            </div>
        </div>

        <div class="container" id="home-contact-mobile">
            <div class="home-contact-icon">
                <i class="bi bi-envelope"></i>
            </div>
            <div id="home-contact-mobile-text">
                <div id="home-contact-mobile-title"><?= l("lang.home.contact.title") ?></div>
                <div id="home-contact-mobile-description"><?= l("lang.home.contact.description") ?></div>
                <div class="home-contact-cta" onclick="Starshine.Navbar.item('contact');"><?= l("lang.home.contact.cta") ?></div>
            </div>
        </div>
    </div>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.php"; ?>
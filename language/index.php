<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/lang.php"; $title = l("lang.language"); require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/header.php"; ?>

<div class="container" id="language-container">
    <h1 id="language-icon">
        <i class="bi bi-globe2"></i>
    </h1>
    <div id="language-grid">
        <?php $list = scandir($_SERVER['DOCUMENT_ROOT'] . "/includes/lang"); foreach ($list as $item): if (!str_starts_with($item, ".") && (!str_contains($item, "-pseudo-") && !isset($_COOKIE["dev"])) && str_ends_with($item, ".json") && $item !== "package.json" && $item !== "package-lock.json"): ?>
        <div>
            <a href="/<?= substr($item, 0, -5) ?>" class="language-item"><?= json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/includes/lang/" . $item), true)["_name"] ?></a>
        </div>
        <?php endif; endforeach; ?>
    </div>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.php"; ?>
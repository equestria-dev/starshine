<?php

global $parts;
$projects = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/includes/data/projects.json"), true);
$project = null;

if (count($parts) > 1) {
    $id = $parts[2];

    foreach ($projects as $prj) {
        if ($prj["name"] === $id || $prj["id"] === $id) {
            $project = $prj;
        }
    }

    if (!isset($project)) {
        header("Location: /");
        die();
    }
} else {
    header("Location: /");
    die();
}

$_p = $project;
$title = $project["display_name"] ?? $project["name"]; require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/header.php"; $project = $_p; ?>

<div id="project-box" <?php if (isset($project["icon"])): ?>style="background-image: url('/assets/projects/<?= $project['id'] ?>.png');"<?php endif; ?>>
    <div id="project-box-inner">
        <div id="project-box-intro">
            <div id="project-box-intro-inner">
                <?php if (isset($project["icon"])): ?><img id="project-box-icon" src="/assets/projects/<?= $project['id'] ?>.png" alt="Project icon"><?php endif; ?>
                <h1><?= $project["display_name"] ?? $project["name"] ?></h1>
                <p id="project-box-owner"><?= $project["owner"] ?>/<?= $project["name"] ?></p>
                <p><?= $project["description"] ?></p>

                <?php if (isset($project["website"]) && $project["website"] !== $project["source"]): ?>
                    <div id="project-box-links" class="project-box-links-dual">
                        <a href="<?= $project["website"] ?>" target="_blank" id="project-box-link-1" class="project-box-link"><i class="bi bi-globe"></i>&nbsp;&nbsp;<?= l("lang.project.actions.website") ?></a>
                        <a href="<?= $project["source"] ?>" target="_blank" id="project-box-link-2" class="project-box-link"><i class="bi bi-code"></i>&nbsp;&nbsp;<?= l("lang.project.actions.source") ?></a>
                    </div>
                <?php else: ?>
                    <div id="project-box-links" class="project-box-links-solo">
                        <a href="<?= $project["source"] ?>" target="_blank" id="project-box-link-1" class="project-box-link"><i class="bi bi-code"></i>&nbsp;&nbsp;<?= l("lang.project.actions.source") ?></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div id="project-details">
            <?php

            $newLanguages = [];

            foreach ($project["languages"] as $name => $value) {
                if ($name === "Hack") $name = "PHP";
                if (!isset($newLanguages[$name])) $newLanguages[$name] = 0;
                $newLanguages[$name] += $value;
            }

            $project["languages"] = $newLanguages;

            ?>
            <div id="project-details-inner">
                <div id="project-details-languages">
                    <div id="project-details-languages-1" class="project-details-languages-item"><?php $i = 0; ?>
                        <div class="project-details-languages-item-title">
                            <span class="project-details-languages-item-title-language"><?= array_keys($project["languages"])[$i] ?? "&nbsp;" ?></span>
                            <span class="project-details-languages-item-title-percentage"><?= isset(array_values($project["languages"])[$i]) ? number_format(array_values($project["languages"])[$i], 2) . "%" : "&nbsp;" ?></span>
                        </div>
                        <div class="project-details-languages-item-bar">
                            <div class="project-details-languages-item-bar-fill" style="width: <?= array_values($project["languages"])[$i] ?? "0" ?>%;"></div>
                        </div>
                    </div>
                    <div id="project-details-languages-2" class="project-details-languages-item"><?php $i = 1; ?>
                        <div class="project-details-languages-item-title">
                            <span class="project-details-languages-item-title-language"><?= array_keys($project["languages"])[$i] ?? "&nbsp;" ?></span>
                            <span class="project-details-languages-item-title-percentage"><?= isset(array_values($project["languages"])[$i]) ? number_format(array_values($project["languages"])[$i], 2) . "%" : "&nbsp;" ?></span>
                        </div>
                        <div class="project-details-languages-item-bar">
                            <div class="project-details-languages-item-bar-fill" style="width: <?= array_values($project["languages"])[$i] ?? "0" ?>%;"></div>
                        </div>
                    </div>
                    <div id="project-details-languages-3" class="project-details-languages-item"><?php $i = 2; ?>
                        <div class="project-details-languages-item-title">
                            <span class="project-details-languages-item-title-language"><?= array_keys($project["languages"])[$i] ?? "&nbsp;" ?></span>
                            <span class="project-details-languages-item-title-percentage"><?= isset(array_values($project["languages"])[$i]) ? number_format(array_values($project["languages"])[$i], 2) . "%" : "&nbsp;" ?></span>
                        </div>
                        <div class="project-details-languages-item-bar">
                            <div class="project-details-languages-item-bar-fill" style="width: <?= array_values($project["languages"])[$i] ?? "0" ?>%;"></div>
                        </div>
                    </div>
                    <div id="project-details-languages-4" class="project-details-languages-item"><?php $i = 3; ?>
                        <div class="project-details-languages-item-title">
                            <span class="project-details-languages-item-title-language"><?= array_keys($project["languages"])[$i] ?? "&nbsp;" ?></span>
                            <span class="project-details-languages-item-title-percentage"><?= isset(array_values($project["languages"])[$i]) ? number_format(array_values($project["languages"])[$i], 2) . "%" : "&nbsp;" ?></span>
                        </div>
                        <div class="project-details-languages-item-bar">
                            <div class="project-details-languages-item-bar-fill" style="width: <?= array_values($project["languages"])[$i] ?? "0" ?>%;"></div>
                        </div>
                    </div>
                    <div id="project-details-languages-5" class="project-details-languages-item"><?php $i = 4; ?>
                        <div class="project-details-languages-item-title">
                            <span class="project-details-languages-item-title-language"><?= array_keys($project["languages"])[$i] ?? "&nbsp;" ?></span>
                            <span class="project-details-languages-item-title-percentage"><?= isset(array_values($project["languages"])[$i]) ? number_format(array_values($project["languages"])[$i], 2) . "%" : "&nbsp;" ?></span>
                        </div>
                        <div class="project-details-languages-item-bar">
                            <div class="project-details-languages-item-bar-fill" style="width: <?= array_values($project["languages"])[$i] ?? "0" ?>%;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.php"; ?>

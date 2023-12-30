<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/lang.php"; $title = l("lang.archive.title"); require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/header.php"; ?>

<div id="archive-decoration"></div>

<div class="container" id="archive-container">
    <h1><?= l("lang.archive.title") ?></h1>
    <table id="archive-table">
        <?php $lastYear = null; $lastMonth = null; $projects = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/includes/data/projects.json"), true); uasort($projects, function ($a, $b) {
            return $b["commit"] - $a["commit"];
        }); foreach ($projects as $project): if ($project["archive"]): ?>
        <tr>
            <td class="archive-table-year"><?php

                $year = date('Y', $project["commit"]);

                if ($year !== $lastYear) {
                    $lastYear = $year;
                    $lastMonth = null;
                    echo("<b>$year</b>");
                }

                ?></td>
            <td class="archive-table-month"><?php

                $month = date('F', $project["commit"]);

                if ($month !== $lastMonth) {
                    $lastMonth = $month;
                    echo("<b>$month</b>");
                }

                ?></td>
            <td>
                <a class="archive-table-link" href="/<?= lp() ?>/projects/<?= $project["name"] ?? $project["id"] ?>">
                    <?php if (isset($project["icon"])): ?><img class="archive-table-icon" src="/assets/projects/<?= $project["id"] ?>.png" alt="Project icon"><?php else: ?><i class="archive-table-icon bi bi-journal-code"></i><?php endif; ?>
                    <span class="archive-table-title"><?= $project["display_name"] ?? $project["name"] ?></span>
                </a>
            </td>
        </tr>
        <?php endif; endforeach; ?>
    </table>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.php"; ?>
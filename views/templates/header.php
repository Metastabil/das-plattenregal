<?php
/**
 * @var string $title
 * @var string $error
 */
?>

<!DOCTYPE HTML>
<html lang="de">
    <head>
        <title><?= esc($title . ' | ' . LANG['project_name']) ?></title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" type="image/png" href="<?= base_url() . 'assets/images/favicon.png' ?>" />
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
        <link rel="stylesheet" href="<?= base_url() . 'assets/css/application.css' ?>" />
        <script src="<?= base_url() . 'assets/js/libraries/jquery-3.7.1.min.js' ?>"></script>
        <script src="<?= base_url() . 'assets/js/libraries/font-awesome.min.js' ?>"></script>
        <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
        <script src="<?= base_url() . 'assets/js/ui-library.js' ?>"></script>
        <script>
            const lang = <?= array_to_json(LANG) ?>;
            const baseURL = '<?= base_url() ?>';
        </script>
    </head>
    <body>
        <aside class="left-aside">
            <div class="logo-container">
                <i class="fa-solid fa-record-vinyl"></i>
                <h1>Das<br />Plattenregal</h1>
            </div>

            <nav>
                <a href="javascript:void(0)" title="<?= esc(LANG['navigation']['dashboard']) ?>">
                    <span class="nav-icon">
                        <i class="fa-solid fa-house"></i>
                    </span>
                    <?= esc(LANG['navigation']['dashboard']) ?>
                </a>

                <a href="javascript:void(0)" title="<?= esc(LANG['navigation']['shelves']) ?>">
                    <span class="nav-icon">
                        <i class="fa-solid fa-table-cells"></i>
                    </span>
                    <?= esc(LANG['navigation']['shelves']) ?>
                </a>

                <a href="javascript:void(0)" title="<?= esc(LANG['navigation']['records']) ?>">
                    <span class="nav-icon">
                        <i class="fa-solid fa-record-vinyl"></i>
                    </span>
                    <?= esc(LANG['navigation']['records']) ?>
                </a>

                <a href="javascript:void(0)" title="<?= esc(LANG['navigation']['formats']) ?>">
                    <span class="nav-icon">
                        <i class="fa-solid fa-list"></i>
                    </span>
                    <?= esc(LANG['navigation']['formats']) ?>
                </a>

                <a href="javascript:void(0)" title="<?= esc(LANG['navigation']['conditions']) ?>">
                    <span class="nav-icon">
                        <i class="fa-solid fa-list"></i>
                    </span>
                    <?= esc(LANG['navigation']['conditions']) ?>
                </a>

                <a href="javascript:void(0)" title="<?= esc(LANG['navigation']['users']) ?>">
                    <span class="nav-icon">
                        <i class="fa-solid fa-users"></i>
                    </span>
                    <?= esc(LANG['navigation']['users']) ?>
                </a>
            </nav>
        </aside>
        <main>
            <h1 class="title">
                <?= $title ?>
            </h1>
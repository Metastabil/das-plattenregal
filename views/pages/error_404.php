<?php
/**
 * @var string $title
 */
?>

<!DOCTYPE HTML>
<html lang="de">
    <head>
        <title><?= esc($title . ' | ' . LANG['project_name']) ?></title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" type="image/png" href="<?= base_url() . 'assets/images/favicon.png' ?>" />
        <link rel="stylesheet" href="<?= base_url() . 'assets/css/application.css' ?>" />
    </head>
    <body>
        <h1 class="error-404">
            <?= $title ?>
        </h1>
    </body>
</html>
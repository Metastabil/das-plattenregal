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
        <link rel="stylesheet" href="<?= base_url() . 'assets/css/login.css' ?>" />
        <script src="<?= base_url() . 'assets/js/libraries/jquery-3.7.1.min.js' ?>"></script>
        <script src="<?= base_url() . 'assets/js/libraries/font-awesome.min.js' ?>"></script>
        <script src="<?= base_url() . 'assets/js/ui-library.js' ?>"></script>
    </head>
    <body>
        <?php if (!empty($error)) : ?>
            <script>
                $(() => {
                    console.log('<?= $error ?>');
                    displayNotification({
                        text: '<?= $error ?>',
                        displayTime: 2500,
                        type: 'error',
                    });
                });
            </script>
        <?php endif ?>
        <aside class="left-aside">
            <div class="logo-container">
                <i class="fa-solid fa-record-vinyl"></i>
                <h1>Das<br />Plattenregal</h1>
            </div>

            <form action="<?= base_url('login') ?>" method="post" class="login-form">
                <div class="input-wrapper">
                    <label for="email">
                        <?= esc(LANG['users']['attributes']['email']) ?>
                        <span class="required" title="<?= esc(LANG['undefined']['required']) ?>">*</span>
                    </label>
                    <?= form_input([
                        'type' => 'email',
                        'name' => 'email',
                        'id' => 'email',
                        'title' => esc(LANG['users']['attributes']['email']),
                        'placeholder' => esc(LANG['users']['attributes']['email']),
                        'autocomplete' => 'off'
                    ]) ?>
                </div>
                <div class="input-wrapper">
                    <label for="password">
                        <?= esc(LANG['users']['attributes']['password']) ?>
                        <span class="required" title="<?= esc(LANG['undefined']['required']) ?>">*</span>
                    </label>
                    <?= form_input([
                        'type' => 'password',
                        'name' => 'password',
                        'id' => 'password',
                        'title' => esc(LANG['users']['attributes']['password']),
                        'placeholder' => esc(LANG['users']['attributes']['password']),
                        'autocomplete' => 'off'
                    ]) ?>
                </div>

                <button title="<?= esc(LANG['actions']['login']) ?>" class="btn btn-blue btn-centered">
                    <span>
                        <?= esc(LANG['actions']['login']) ?>
                    </span>
                </button>
            </form>
        </aside>

        <main>

        </main>
    </body>
</html>

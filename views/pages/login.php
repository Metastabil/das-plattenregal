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
        <link rel="stylesheet" href="<?= base_url() . 'assets/css/login.css' ?>" />
        <script src="<?= base_url() . 'assets/js/libraries/jquery-3.7.1.min.js' ?>"></script>
        <script src="<?= base_url() . 'assets/js/libraries/font-awesome.min.js' ?>"></script>
        <script src="<?= base_url() . 'assets/js/ui-library.js' ?>"></script>
    </head>
    <body>
        <?php if (!empty($_SESSION['message'])) : ?>
            <script>
                $(() => {
                    const message = <?= array_to_json($_SESSION['message']) ?>;
                    displayNotification({
                        type: message['type'],
                        text: message['text'],
                        displayTime: 2500
                    });
                });
            </script>

            <?php unset_message() ?>
        <?php endif ?>

        <main>
            <div class="login-container">
                <div class="logo-container">
                    <i class="fa-solid fa-record-vinyl"></i>
                    <h1><?= split_by_space(LANG['project_name'])[0] ?><br /><?= split_by_space(LANG['project_name'])[1] ?></h1>
                </div>

                <form action="<?= base_url('login') ?>" method="post" class="login-form">
                    <div class="input-wrapper">
                        <label for="email">
                            <?= esc(LANG['users']['attributes']['email']) ?>
                        </label>
                        <?= form_input([
                            'type' => 'email',
                            'name' => 'email',
                            'id' => 'email',
                            'placeholder' => esc(LANG['users']['attributes']['email']),
                            'title' => esc(LANG['users']['attributes']['email']),
                            'autocomplete' => 'off',
                            'maxlength' => 255
                        ]) ?>
                    </div>

                    <div class="input-wrapper">
                        <label for="password">
                            <?= esc(LANG['users']['attributes']['password']) ?>
                        </label>
                        <?= form_input([
                            'type' => 'password',
                            'name' => 'password',
                            'id' => 'password',
                            'placeholder' => esc(LANG['users']['attributes']['password']),
                            'title' => esc(LANG['users']['attributes']['password']),
                            'autocomplete' => 'off',
                            'maxlength' => 255
                        ]) ?>
                    </div>

                    <button title="<?= esc(LANG['actions']['login']) ?>" class="btn btn-dark-grey btn-centered">
                        <?= esc(LANG['actions']['login']) ?>
                    </button>
                </form>

                <div class="action-wrapper">
                    <a href="javascript:void(0)" title="<?= esc(LANG['undefined']['new_here'] . LANG['actions']['register']) ?>">
                        <?= esc(LANG['undefined']['new_here'] . LANG['actions']['register']) ?>
                    </a>

                    <a href="javascript:void(0)" title="<?= esc(LANG['undefined']['forgot_password']) ?>">
                        <?= esc(LANG['undefined']['forgot_password']) ?>
                    </a>
                </div>
            </div>
        </main>
    </body>
</html>

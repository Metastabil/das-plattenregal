<?php
/**
 * @var string $title
 */
?>

<!DOCTYPE HTML>
<html lang="de">
    <head>
        <title><?= $title . ' | ' . LANG['project_name'] ?></title>
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
                        <i class="fa-solid fa-envelope"></i>
                        <?= form_input([
                            'type' => 'email',
                            'name' => 'email',
                            'id' => 'email',
                            'placeholder' => LANG['users']['attributes']['email'],
                            'title' => LANG['users']['attributes']['email'],
                            'autocomplete' => 'off'
                        ]) ?>
                    </div>

                    <div class="input-wrapper">
                        <i class="fa-solid fa-key"></i>
                        <?= form_input([
                            'type' => 'password',
                            'name' => 'password',
                            'id' => 'password',
                            'placeholder' => LANG['users']['attributes']['password'],
                            'title' => LANG['users']['attributes']['password']
                        ]) ?>
                    </div>



                    <button title="<?= LANG['actions']['login'] ?>" class="btn btn-blue btn-centered">
                        <?= LANG['actions']['login'] ?>
                    </button>
                </form>

                <a href="javascript:void(0)" title="<?= LANG['undefined']['forgot_password'] ?>">
                    <?= LANG['undefined']['forgot_password'] ?>
                </a>

                <a href="javascript:void(0)" title="<?= LANG['undefined']['new_here'] . LANG['actions']['register'] ?>">
                    <?= LANG['undefined']['new_here'] . LANG['actions']['register'] ?>
                </a>
            </div>
        </main>
    </body>
</html>

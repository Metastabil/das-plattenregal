<?php
/**
 * @var array $element
 */
?>

<form action="<?= base_url('edit-user/' . $element['id']) ?>" method="post" class="default-form">
    <div class="input-wrapper">
        <label for="username">
            <?= esc(LANG['users']['attributes']['username']) ?>
            <span class="required" title="<?= LANG['undefined']['required'] ?>">*</span>
        </label>
        <?= form_input([
            'type' => 'text',
            'name' => 'username',
            'id' => 'username',
            'title' => esc(LANG['users']['attributes']['username']),
            'placeholder' => esc(LANG['users']['attributes']['username']),
            'autocomplete' => 'off'
        ], $element['username']) ?>
    </div>

    <div class="input-wrapper">
        <label for="email">
            <?= esc(LANG['users']['attributes']['email']) ?>
            <span class="required" title="<?= LANG['undefined']['required'] ?>">*</span>
        </label>
        <?= form_input([
            'type' => 'email',
            'name' => 'email',
            'id' => 'email',
            'title' => esc(LANG['users']['attributes']['email']),
            'placeholder' => esc(LANG['users']['attributes']['email']),
            'autocomplete' => 'off'
        ], $element['email']) ?>
    </div>

    <div class="input-wrapper">
        <label for="email">
            <?= esc(LANG['users']['attributes']['password']) ?>
            <span class="required" title="<?= LANG['undefined']['required'] ?>">*</span>
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

    <div class="form-action-wrapper">
        <button title="<?= esc(LANG['actions']['save']) ?>" class="btn btn-blue">
            <span>
                <?= esc(LANG['actions']['save']) ?>
            </span>
        </button>

        <a href="<?= base_url('users') ?>" title="<?= esc(LANG['actions']['cancel']) ?>" class="btn btn-red">
            <span>
                <?= esc(LANG['actions']['cancel']) ?>
            </span>
        </a>
    </div>
</form>

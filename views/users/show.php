<?php
/**
 * @var array $element
 */
?>

<form action="<?= base_url('create-user') ?>" method="post" class="default-form">
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
            'autocomplete' => 'off',
            'disabled' => 'disabled'
        ], esc($element['username'])) ?>
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
            'autocomplete' => 'off',
            'disabled' => 'disabled'
        ], esc($element['email'])) ?>
    </div>

    <div class="form-action-wrapper">
        <a href="<?= base_url('users') ?>" title="<?= esc(LANG['actions']['back']) ?>" class="btn btn-blue">
            <span>
                <?= esc(LANG['actions']['back']) ?>
            </span>
        </a>
    </div>
</form>
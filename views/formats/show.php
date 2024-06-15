<?php
/**
 * @var array $element
 */
?>

<form action="javascript:void(0)" method="post" class="default-form">
    <div class="input-wrapper">
        <label for="username">
            <?= esc(LANG['formats']['attributes']['name']) ?>
            <span class="required" title="<?= LANG['undefined']['required'] ?>">*</span>
        </label>
        <?= form_input([
            'type' => 'text',
            'name' => 'name',
            'id' => 'name',
            'title' => esc(LANG['formats']['attributes']['name']),
            'placeholder' => esc(LANG['formats']['attributes']['name']),
            'autocomplete' => 'off',
            'disabled' => 'disabled'
        ], $element['name']) ?>
    </div>

    <div class="input-wrapper">
        <label for="description">
            <?= esc(LANG['formats']['attributes']['description']) ?>
        </label>
        <textarea name="description"
                  id="description"
                  placeholder="<?= esc(LANG['formats']['attributes']['description']) ?>"
                  title="<?= esc(LANG['formats']['attributes']['description']) ?>"
                  autocomplete="off"
                  disabled="disabled"><?= $element['description'] ?></textarea>
    </div>

    <div class="form-action-wrapper">
        <a href="<?= base_url('formats') ?>" title="<?= esc(LANG['actions']['back']) ?>" class="btn btn-blue">
            <span>
                <?= esc(LANG['actions']['back']) ?>
            </span>
        </a>
    </div>
</form>
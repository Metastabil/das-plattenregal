<?php
/**
 * @var array $element
 */
?>

<form action="javascript:void(0)" method="post" class="default-form">
    <div class="input-wrapper">
        <label for="name">
            <?= LANG['conditions']['attributes']['name'] ?>
            <span class="required" title="<?= LANG['undefined']['required'] ?>">*</span>
        </label>
        <?= form_input([
            'type' => 'text',
            'name' => 'name',
            'id' => 'name',
            'title' => LANG['conditions']['attributes']['name'],
            'placeholder' => LANG['conditions']['attributes']['name'],
            'autocomplete' => 'off',
            'disabled' => 'disabled'
        ], $element['name']) ?>
    </div>

    <div class="input-wrapper">
        <label for="description">
            <?= LANG['conditions']['attributes']['description'] ?>
        </label>
        <textarea name="description"
                  id="description"
                  placeholder="<?= LANG['conditions']['attributes']['description'] ?>"
                  title="<?= LANG['conditions']['attributes']['description'] ?>"
                  autocomplete="off"
                  disabled="disabled"><?= $element['description'] ?></textarea>
    </div>

    <div class="form-action-wrapper">
        <a href="<?= base_url('conditions') ?>" title="<?= LANG['actions']['back'] ?>" class="btn btn-blue">
            <span>
                <?= LANG['actions']['back'] ?>
            </span>
        </a>
    </div>
</form>
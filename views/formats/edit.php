<?php
/**
 * @var array $element
 */
?>

<form action="<?= base_url('edit-format/' . $element['id'] ) ?>" method="post" class="default-form">
    <div class="input-wrapper">
        <label for="name">
            <?= esc(LANG['formats']['attributes']['name']) ?>
            <span class="required" title="<?= LANG['undefined']['required'] ?>">*</span>
        </label>
        <?= form_input([
            'type' => 'text',
            'name' => 'name',
            'id' => 'name',
            'title' => esc(LANG['formats']['attributes']['name']),
            'placeholder' => esc(LANG['formats']['attributes']['name']),
            'autocomplete' => 'off'
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
                  autocomplete="off"><?= $element['description'] ?></textarea>
    </div>

    <div class="form-action-wrapper">
        <button title="<?= esc(LANG['actions']['save']) ?>" class="btn btn-blue">
            <span>
                <?= esc(LANG['actions']['save']) ?>
            </span>
        </button>

        <a href="<?= base_url('formats') ?>" title="<?= esc(LANG['actions']['cancel']) ?>" class="btn btn-red">
            <span>
                <?= esc(LANG['actions']['cancel']) ?>
            </span>
        </a>
    </div>
</form>
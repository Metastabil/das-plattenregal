<form action="<?= base_url('create-shelf') ?>" method="post" class="default-form">
    <div class="input-wrapper">
        <label for="name">
            <?= esc(LANG['shelves']['attributes']['name']) ?>
            <span class="required" title="<?= LANG['undefined']['required'] ?>">*</span>
        </label>
        <?= form_input([
            'type' => 'text',
            'name' => 'name',
            'id' => 'name',
            'title' => esc(LANG['shelves']['attributes']['name']),
            'placeholder' => esc(LANG['shelves']['attributes']['name']),
            'autocomplete' => 'off'
        ]) ?>
    </div>

    <div class="input-wrapper">
        <label for="annotation">
            <?= esc(LANG['shelves']['attributes']['annotation']) ?>
        </label>
        <textarea name="annotation"
                  id="annotation"
                  placeholder="<?= esc(LANG['shelves']['attributes']['annotation']) ?>"
                  title="<?= esc(LANG['shelves']['attributes']['annotation']) ?>"
                  autocomplete="off"></textarea>
    </div>

    <div class="input-wrapper">
        <label for="width">
            <?= esc(LANG['shelves']['attributes']['width']) ?>
            <span class="required" title="<?= LANG['undefined']['required'] ?>">*</span>
        </label>
        <?= form_input([
            'type' => 'number',
            'name' => 'width',
            'id' => 'width',
            'title' => esc(LANG['shelves']['attributes']['width']),
            'placeholder' => esc(LANG['shelves']['attributes']['width']),
            'autocomplete' => 'off',
            'min' => 1
        ]) ?>
    </div>

    <div class="input-wrapper">
        <label for="height">
            <?= esc(LANG['shelves']['attributes']['height']) ?>
            <span class="required" title="<?= LANG['undefined']['required'] ?>">*</span>
        </label>
        <?= form_input([
            'type' => 'number',
            'name' => 'height',
            'id' => 'height',
            'title' => esc(LANG['shelves']['attributes']['height']),
            'placeholder' => esc(LANG['shelves']['attributes']['height']),
            'autocomplete' => 'off',
            'min' => 1
        ]) ?>
    </div>

    <div class="form-action-wrapper">
        <button title="<?= esc(LANG['actions']['save']) ?>" class="btn btn-blue">
            <span>
                <?= esc(LANG['actions']['save']) ?>
            </span>
        </button>

        <a href="<?= base_url('shelves') ?>" title="<?= esc(LANG['actions']['cancel']) ?>" class="btn btn-red">
            <span>
                <?= esc(LANG['actions']['cancel']) ?>
            </span>
        </a>
    </div>
</form>
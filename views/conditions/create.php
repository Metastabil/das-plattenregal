<form action="<?= base_url('create-condition') ?>" method="post" class="default-form">
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
            'autocomplete' => 'off'
        ]) ?>
    </div>

    <div class="input-wrapper">
        <label for="description">
            <?= LANG['conditions']['attributes']['description'] ?>
        </label>
        <textarea name="description"
                  id="description"
                  placeholder="<?= LANG['conditions']['attributes']['description'] ?>"
                  title="<?= LANG['conditions']['attributes']['description'] ?>"
                  autocomplete="off"></textarea>
    </div>

    <div class="form-action-wrapper">
        <button title="<?= LANG['actions']['save'] ?>" class="btn btn-blue">
            <span>
                <?= LANG['actions']['save'] ?>
            </span>
        </button>

        <a href="<?= base_url('conditions') ?>" title="<?= LANG['actions']['cancel'] ?>" class="btn btn-red">
            <span>
                <?= LANG['actions']['cancel'] ?>
            </span>
        </a>
    </div>
</form>
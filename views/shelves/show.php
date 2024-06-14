<?php
/**
 * @var array $element
 * @var array $shelf_compartments
 */
?>

<form action="javascript:void(0)" method="post" class="default-form">
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
            'autocomplete' => 'off',
            'disabled' => 'disabled'
        ], $element['name']  ) ?>
    </div>

    <div class="input-wrapper">
        <label for="annotation">
            <?= esc(LANG['shelves']['attributes']['annotation']) ?>
        </label>
        <textarea name="annotation"
                  id="annotation"
                  placeholder="<?= esc(LANG['shelves']['attributes']['annotation']) ?>"
                  title="<?= esc(LANG['shelves']['attributes']['annotation']) ?>"
                  autocomplete="off"
                  disabled="disabled"><?= $element['annotation'] ?></textarea>
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
            'min' => 1,
            'disabled' => 'disabled'
        ], $element['width']) ?>
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
            'min' => 1,
            'disabled' => 'disabled'
        ], $element['height']) ?>
    </div>
</form>

<h2 class="table-title">
    <?= esc(LANG['shelves']['table_titles']['shelf_compartments']) ?>
</h2>

<div class="shelf-compartments-actions-wrapper">
    <a href="javascript:switchShelfCompartmentsContainer('graphics')" class="btn graphics-switch">
        <?= esc(LANG['undefined']['graphics']) ?>
    </a>
    <a href="javascript:switchShelfCompartmentsContainer('table')" class="btn table-switch">
        <?= esc(LANG['undefined']['table']) ?>
    </a>
</div>

<div class="graphics-container shelf-compartments-container">
    <table class="graphics">
        <?php $index = 0 ?>
        <?php for ($i = 0; $i < (int)$element['height']; $i++) : ?>
            <tr>
                <?php for ($j = 0; $j < (int)$element['width']; $j++ ) : ?>
                    <td><?= $shelf_compartments[$index]['name'] ?></td>
                    <?php $index++ ?>
                <?php endfor ?>
            </tr>
        <?php endfor ?>
    </table>
</div>

<div class="table-container shelf-compartments-container">
    <table class="default-table" id="shelves-show-table">
        <thead>
        <tr>
            <th><?= esc(LANG['shelf_compartments']['attributes']['name']) ?></th>
            <th><?= esc(LANG['shelf_compartments']['attributes']['row']) ?></th>
            <th><?= esc(LANG['shelf_compartments']['attributes']['position']) ?></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($shelf_compartments as $shelf_compartment) : ?>
            <tr onclick="showShelfCompartmentAsPopup(<?= $element['id'] ?>)" title="<?= esc(LANG['actions']['show']) ?>">
                <td><?= esc($shelf_compartment['name']) ?></td>
                <td><?= esc(LANG['shelf_compartments']['attributes']['row'] . ' ' . $shelf_compartment['row']) ?></td>
                <td><?= esc(LANG['shelf_compartments']['attributes']['position'] . ' ' . $shelf_compartment['position']) ?></td>
                <td></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>

<script>
    $(() => {
        $('#shelves-show-table').DataTable({
            lengthChange: false,
            ordering: false,
            info: false,
            language: {
                emptyTable: lang['data_tables']['empty_table'],
                search: lang['actions']['search']
            }
        });

        switchShelfCompartmentsContainer('graphics');
    });

    function switchShelfCompartmentsContainer(container) {
        const graphicsContainer = $('.graphics-container');
        const tableContainer = $('.table-container');
        const graphicsSwitch = $('.graphics-switch');
        const tableSwitch = $('.table-switch');

        if (container === 'table') {
            graphicsContainer.hide();
            tableContainer.show();
            graphicsSwitch.removeClass('active');
            tableSwitch.addClass('active')

            return;
        }

        if (container === 'graphics') {
            graphicsContainer.show();
            tableContainer.hide();
            graphicsSwitch.addClass('active');
            tableSwitch.removeClass('active')
        }
    }

    function showShelfCompartmentAsPopup(id) {

    }
</script>
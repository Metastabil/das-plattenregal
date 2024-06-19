<?php
/**
 * @var array $elements
 */
?>

<a href="<?= base_url('create-condition') ?>" title="<?= LANG['actions']['create'] ?>" class="btn btn-blue">
    <i class="fas fa-plus"></i>
    <?= LANG['actions']['create'] ?>
</a>

<table class="default-table" id="conditions-index-table">
    <thead>
        <tr>
            <th><?= LANG['conditions']['attributes']['name'] ?></th>
            <th><?= LANG['conditions']['attributes']['description'] ?></th>
            <th><?= LANG['conditions']['attributes']['created'] ?></th>
            <th><?= LANG['conditions']['attributes']['updated'] ?></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($elements as $element) : ?>
            <tr onclick="showCondition(<?= $element['id'] ?>)" title="<?= LANG['actions']['show'] ?>">
                <td><?= $element['name'] ?></td>
                <td><?= $element['description'] ?></td>
                <td><?= format_timestamp($element['created']) ?></td>
                <td><?= format_timestamp($element['updated']) ?></td>
                <td class="table-actions">
                    <a href="<?= base_url('edit-condition/' . $element['id']) ?>" title="<?= LANG['actions']['edit'] ?>">
                        <i class="fas fa-pen-to-square ico-edit"></i>
                    </a>

                    <a href="javascript:confirmConditionDelete(<?= $element['id'] ?>)" title="<?= esc(LANG['actions']['delete']) ?>">
                        <i class="fa-solid fa-trash-can ico-delete"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<script>
    $(() => {
        $('#conditions-index-table').DataTable({
            pagingType: 'simple_numbers',
            lengthChange: false,
            info: false,
            language: {
                emptyTable: lang['data_tables']['empty_table'],
                search: lang['actions']['search']
            },
            columnDefs: [{
                target: 4,
                orderable: false
            }],
        });
    });

    function showCondition(id) {
        window.location.href = `${baseURL}show-condition/${id}`;
    }

    function confirmConditionDelete(id) {
        const confirmation = confirm(lang['confirmations']['conditions']['delete']);

        if (confirmation) {
            window.location.href = `${baseURL}delete-condition/${id}`;
        }
    }
</script>
<?php
/**
 * @var array $elements
 */
?>

<a href="<?= base_url('create-format') ?>" title="<?= esc(LANG['actions']['create']) ?>" class="btn btn-blue">
    <span>
        <i class="fas fa-plus"></i>
        <?= esc(LANG['actions']['create']) ?>
    </span>
</a>

<table class="default-table" id="formats-index-table">
    <thead>
        <tr>
            <th><?= esc(LANG['formats']['attributes']['name']) ?></th>
            <th><?= esc(LANG['formats']['attributes']['description']) ?></th>
            <th><?= esc(LANG['formats']['attributes']['created']) ?></th>
            <th><?= esc(LANG['formats']['attributes']['updated']) ?></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($elements as $element) : ?>
            <tr onclick="showFormat(<?= $element['id'] ?>)" title="<?= esc(LANG['actions']['show']) ?>">
                <td><?= $element['name'] ?></td>
                <td><?= $element['description'] ?></td>
                <td><?= format_timestamp($element['created']) ?></td>
                <td><?= format_timestamp($element['updated']) ?></td>
                <td class="table-actions">
                    <a href="<?= base_url('edit-format/' . $element['id']) ?>" title="<?= esc(LANG['actions']['edit']) ?>">
                        <i class="fas fa-pen-to-square ico-edit"></i>
                    </a>

                    <a href="javascript:confirmFormatDelete(<?= $element['id'] ?>)" title="<?= esc(LANG['actions']['delete']) ?>">
                        <i class="fa-solid fa-trash-can ico-delete"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<script>
    $(() => {
        $('#formats-index-table').DataTable({
            lengthChange: false,
            info: false,
            language: {
                emptyTable: lang['data_tables']['empty_table'],
                search: lang['actions']['search']
            },
            columnDefs: [{
                target: 4,
                orderable: false
            }]
        });
    });

    /**
     * @param {Number} id
     */
    function showFormat(id) {
        window.location.href = `${baseURL}show-format/${id}`;
    }

    /**
     * @param {Number} id
     */
    function confirmFormatDelete(id) {
        const confirmation = confirm(lang['confirmations']['formats']['delete']);

        if (confirmation) {
            window.location.href = `${baseURL}delete-format/${id}`;
        }
    }
</script>
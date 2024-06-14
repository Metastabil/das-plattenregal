<?php
/**
 * @var array $elements
 */
?>

<a href="<?= base_url('create-shelf') ?>" title="<?= esc(LANG['actions']['create']) ?>" class="btn btn-blue">
    <span>
        <i class="fas fa-plus"></i>
        <?= esc(LANG['actions']['create']) ?>
    </span>
</a>

<table class="default-table" id="shelves-index-table">
    <thead>
        <tr>
            <th><?= esc(LANG['shelves']['attributes']['name']) ?></th>
            <th><?= esc(LANG['shelves']['attributes']['created']) ?></th>
            <th><?= esc(LANG['shelves']['attributes']['updated']) ?></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($elements as $element) : ?>
            <tr onclick="showShelf(<?= $element['id'] ?>)" title="<?= esc(LANG['actions']['show']) ?>">
                <td><?= esc($element['name']) ?></td>
                <td><?= esc(format_timestamp($element['created'])) ?></td>
                <td><?= esc(format_timestamp($element['updated'])) ?></td>
                <td class="table-actions">
                    <a href="<?= base_url('edit-shelf/' . $element['id']) ?>" title="<?= esc(LANG['actions']['edit']) ?>">
                        <i class="fas fa-pen-to-square ico-edit"></i>
                    </a>

                    <a href="javascript:confirmShelfDelete(<?= $element['id'] ?>)" title="<?= esc(LANG['actions']['delete']) ?>">
                        <i class="fa-solid fa-trash-can ico-delete"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<script>
    $(() => {
        $('#shelves-index-table').DataTable({
            lengthChange: false,
            info: false,
            language: {
                emptyTable: lang['data_tables']['empty_table'],
                search: lang['actions']['search']
            }
        });
    });

    /**
     * @param {Number} id
     */
    function showShelf(id) {
        window.location.href = `${baseURL}show-shelf/${id}`;
    }

    /**
     * @param {Number} id
     */
    function confirmShelfDelete(id) {
        const confirmation = confirm(lang['confirmations']['shelves']['delete']);

        if (confirmation) {
            window.location.href = `${baseURL}delete-shelf/${id}`;
        }
    }
</script>
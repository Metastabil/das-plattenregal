<?php
/**
 * @var array $elements
 */
?>

<a href="<?= base_url('create-user') ?>" title="<?= esc(LANG['actions']['create']) ?>" class="btn btn-blue">
    <span>
        <i class="fas fa-plus"></i>
        <?= esc(LANG['actions']['create']) ?>
    </span>
</a>

<table class="default-table" id="users-index-table">
    <thead>
        <tr>
            <th><?= esc(LANG['users']['attributes']['username']) ?></th>
            <th><?= esc(LANG['users']['attributes']['email']) ?></th>
            <th><?= esc(LANG['users']['attributes']['active']) ?></th>
            <th><?= esc(LANG['users']['attributes']['administrator']) ?></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($elements as $element) : ?>
            <tr onclick="showUser(<?= $element['id'] ?>)" title="<?= esc(LANG['actions']['show']) ?>">
                <td><?= esc($element['username']) ?></td>
                <td><?= esc($element['email']) ?></td>
                <td><?= $element['active'] ? esc(LANG['undefined']['yes']) : esc(LANG['undefined']['no']) ?></td>
                <td><?= $element['administrator'] ? esc(LANG['undefined']['yes']) : esc(LANG['undefined']['no']) ?></td>
                <td class="table-actions">
                    <a href="<?= base_url('edit-user/' . $element['id']) ?>" title="<?= esc(LANG['actions']['edit']) ?>">
                        <i class="fas fa-pen-to-square ico-edit"></i>
                    </a>

                    <a href="<?= base_url('change-user-status/' . $element['id']) ?>" title="<?= esc(LANG['actions']['change_status']) ?>">
                        <?php if ($element['active']) : ?>
                            <i class="fa-solid fa-thumbs-down ico-deactivate"></i>
                        <?php else : ?>
                            <i class="fa-solid fa-thumbs-up ico-activate"></i>
                        <?php endif ?>
                    </a>

                    <a href="javascript:confirmUserDelete(<?= $element['id'] ?>)" title="<?= esc(LANG['actions']['delete']) ?>">
                        <i class="fa-solid fa-trash-can ico-delete"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<script>
    $(() => {
        $('#users-index-table').DataTable({
            lengthChange: false,
            info: false,
            language: {
                search: lang['actions']['search']
            }
        });
    });

    /**
     * @param {Number} id
     */
    function showUser(id) {
        window.location.href = `${baseURL}show-user/${id}`;
    }

    /**
     * @param {Number} id
     */
    function confirmUserDelete(id) {
        const confirmation = confirm(lang['confirmations']['users']['delete']);

        if (confirmation) {
            window.location.href = `${baseURL}delete-user/${id}`;
        }
    }
</script>
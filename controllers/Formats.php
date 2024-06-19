<?php
namespace KPO\Controllers;

use KPO\Models\FormatModel;

/**
 * @author Julius Derigs <info@das-plattenregal.de>
 * @version 1.0
 */

class Formats extends Controller {
    private FormatModel $formatModel;

    public function __construct() {
        parent::__construct();

        redirect_if_not_authenticated();
        redirect_if_not_administrator();

        $this->formatModel = new FormatModel();
    }

    /**
     * @return void
     */
    public function index() :void {
        $data = [
            'title' => esc(LANG['titles']['formats']['index']),
            'elements' => $this->formatModel->get()
        ];

        $this->view->render('templates/header', $data)
                   ->render('formats/index', $data)
                   ->render('templates/footer');
    }

    /**
     * @return void
     */
    public function create() :void {
        $data = [
            'title' => esc(LANG['titles']['formats']['create'])
        ];

        $required = ['name'];

        if (is_get()) {
            $this->view->render('templates/header', $data)
                       ->render('formats/create', $data)
                       ->render('templates/footer');

            return;
        }

        if (is_post() && check_for_required_fields($required)) {
            $form_data = [
                'name' => esc(get_input('name')),
                'description' => esc(get_input('description'))
            ];

            if ($this->formatModel->create($form_data)) {
                set_message('success', esc(LANG['messages']['successfully_created']));
            }
            else {
                set_message('error', esc(LANG['errors']['error']));
            }

            redirect(base_url('formats'));

        }
        else {
            set_message('error', esc(LANG['errors']['required_error']));
        }

        $this->view->render('templates/header', $data)
                   ->render('formats/create', $data)
                   ->render('templates/footer');
    }

    /**
     * @param int $id
     * @return void
     */
    public function show(int $id) :void {
        $data = [
            'title' => esc(LANG['titles']['formats']['show']),
            'element' => $this->formatModel->get($id)
        ];

        $this->view->render('templates/header', $data)
                   ->render('formats/show', $data)
                   ->render('templates/footer');
    }

    /**
     * @param int $id
     * @return void
     */
    public function edit(int $id) :void {
        $data = [
            'title' => esc(LANG['titles']['formats']['create']),
            'element' => $this->formatModel->get($id)
        ];

        $required = ['name'];

        if (is_get()) {
            $this->view->render('templates/header', $data)
                       ->render('formats/edit', $data)
                       ->render('templates/footer');

            return;
        }

        if (is_post() && check_for_required_fields($required)) {
            $form_data = [
                'name' => esc(get_input('name')),
                'description' => esc(get_input('description'))
            ];

            if ($this->formatModel->update($id, $form_data)) {
                set_message('success', esc(LANG['messages']['successfully_updated']));
            }
            else {
                set_message('error', esc(LANG['errors']['error']));
            }

            redirect(base_url('formats'));

        }
        else {
            set_message('error', esc(LANG['errors']['required_error']));
        }

        $this->view->render('templates/header', $data)
                   ->render('formats/edit', $data)
                   ->render('templates/footer');
    }

    public function delete(int $id) :void {
        if ($this->formatModel->delete($id)) {
            set_message('success', LANG['messages']['successfully_deleted']);
        }
        else {
            set_message('error', esc(LANG['errors']['error']));
        }

        redirect(base_url('formats'));
    }
}
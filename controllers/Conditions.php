<?php
namespace KPO\Controllers;

use KPO\Models\ConditionModel;

/**
 * @author Julius Derigs <info@das-plattenregal.de>
 * @version 1.0
 */

class Conditions extends Controller {
    private ConditionModel $conditionModel;

    public function __construct() {
        parent::__construct();

        redirect_if_not_authenticated();
        redirect_if_not_administrator();

        $this->conditionModel = new ConditionModel();
    }

    /**
     * @return void
     */
    public function index() :void {
        $data = [
            'title' => LANG['titles']['conditions']['index'],
            'elements' => $this->conditionModel->get()
        ];

        $this->view->render('templates/header', $data)
                   ->render('conditions/index', $data)
                   ->render('templates/footer');
    }

    /**
     * @return void
     */
    public function create() :void {
        $data = [
            'title' => LANG['titles']['conditions']['create']
        ];

        $required = [
            'name'
        ];

        if (is_get()) {
            $this->view->render('templates/header', $data)
                       ->render('conditions/create', $data)
                       ->render('templates/footer');

            return;
        }

        if (is_post() && check_for_required_fields($required)) {
            $form_data = [
                'name' => esc(get_input('name')),
                'description' => esc(get_input('description'))
            ];

            if ($this->conditionModel->create($form_data)) {
                set_message('success', LANG['messages']['successfully_created']);
            }
            else {
                set_message('error', LANG['errors']['error']);
            }

            redirect(base_url('conditions'));
        }
        else {
            set_message('error', LANG['errors']['required_error']);
        }

        $this->view->render('templates/header', $data)
                   ->render('conditions/create', $data)
                   ->render('templates/footer');
    }

    /**
     * @param int $id
     * @return void
     */
    public function show(int $id) :void {
        $data = [
            'title' => LANG['titles']['conditions']['show'],
            'element' => $this->conditionModel->get($id)
        ];

        $this->view->render('templates/header', $data)
                   ->render('conditions/show', $data)
                   ->render('templates/footer');
    }
}
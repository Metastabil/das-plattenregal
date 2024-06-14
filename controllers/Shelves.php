<?php
namespace KPO\Controllers;

use KPO\Models\ShelfCompartmentModel;
use KPO\Models\ShelfModel;

/**
 * @author Julius Derigs <info@das-plattenregal.de>
 * @version 1.0
 */

class Shelves extends Controller {
    private ShelfModel $shelfModel;
    private ShelfCompartmentModel $shelfCompartmentModel;
    private int $user_id;

    public function __construct() {
        parent::__construct();

        redirect_if_not_authenticated();

        $this->user_id = (int)$_SESSION['user']['id'];
        $this->shelfModel = new ShelfModel();
        $this->shelfCompartmentModel = new ShelfCompartmentModel();
    }

    /**
     * @return void
     */
    public function index() :void {
        $data = [
            'title' => esc(LANG['titles']['shelves']['index']),
            'elements' => $this->shelfModel->get(0, $this->user_id)
        ];

        $this->view->render('templates/header', $data)
                   ->render('shelves/index', $data)
                   ->render('templates/footer');
    }

    public function create() :void {
        $data = [
            'title' => esc(LANG['titles']['shelves']['create'])
        ];

        $required = [
            'name',
            'width',
            'height'
        ];

        if (is_get()) {
            $this->view->render('templates/header', $data)
                       ->render('shelves/create', $data)
                       ->render('templates/footer');

            return;
        }

        if (is_post() && check_for_required_fields($required)) {
            $form_data = [
                'name' => esc(get_input('name')),
                'annotation' => esc(get_input('annotation')),
                'width' => (int)get_input('width'),
                'height' => (int)get_input('height'),
                'user_id' => $this->user_id
            ];

            if ($this->shelfModel->create($form_data)) {
                $shelf_id = $this->shelfModel->get_last_inserted_id();
                $amount_of_shelf_compartments = $form_data['width'] * $form_data['height'];
                $shelf_compartment_row = 1;
                $shelf_compartment_position = 0;

                for ($i = 1; $i <= $amount_of_shelf_compartments; $i++) {
                    if ($shelf_compartment_position < (int)$form_data['width']) {
                        $shelf_compartment_position++;
                    }
                    else {
                        $shelf_compartment_position = 1;
                        $shelf_compartment_row++;
                    }

                    $shelf_compartment_data = [
                        'name' => 'Regalfach ' . $i,
                        'row' => $shelf_compartment_row,
                        'position' => $shelf_compartment_position,
                        'shelf_id' => $shelf_id,
                        'user_id' => $this->user_id
                    ];

                    $this->shelfCompartmentModel->create($shelf_compartment_data);
                }

                set_message('success', esc(LANG['messages']['successfully_created']));
            }
            else {
                set_message('error', esc(LANG['errors']['error']));
            }

            redirect('shelves');
        }
        else {
            set_message('error', esc(LANG['errors']['required_error']));
        }

        $this->view->render('templates/header', $data)
                   ->render('shelves/create', $data)
                   ->render('templates/footer');
    }

    /**
     * @param int $id
     * @return void
     */
    public function show(int $id) :void {
        $data = [
            'title' => esc(LANG['titles']['shelves']['show']),
            'element' => $this->shelfModel->get($id),
            'shelf_compartments' => $this->shelfCompartmentModel->get(0, 0, $id)
        ];

        $this->view->render('templates/header', $data)
                   ->render('shelves/show', $data)
                   ->render('templates/footer');
    }

    public function edit(int $id) :void {

    }

    public function delete(int $id) :void {

    }
}
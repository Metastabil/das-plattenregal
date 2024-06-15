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

    public function create() :void {

    }

    public function show(int $id) :void {

    }

    public function edit(int $id) :void {

    }

    public function delete(int $id) :void {

    }
}